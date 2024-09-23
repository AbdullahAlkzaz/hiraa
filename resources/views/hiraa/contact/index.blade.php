@extends('layouts.app')
@section('title', 'Contact Us')

@section('content')
<style>
    .contact-card {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #fff;
        margin-bottom: 20px;
    }

    .contact-body {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .contact-icon {
        font-size: 24px;
        color: #333;
    }

    .contact-value {
        font-size: 16px;
        margin: 0;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        right: 0;
        top: 100%;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        z-index: 1000;
    }

    .dropdown-menu.show {
        display: block;
    }

    .dropdown-toggle {
        border: none;
        background: transparent;
        font-size: 24px;
        color: #333;
        cursor: pointer;
    }

    .dropdown-item.disabled {
        pointer-events: none;
        opacity: 0.6;
        cursor: not-allowed;
    }

</style>

<div class="container">
    <div class="btn-group floating-btn mt-3">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-cogs"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li>
                @if($isEmpty)
                    <a class="dropdown-item" href="{{ route('contact.create') }}" id="add-new">
                        <i class="fas fa-plus"></i> {{ __('Add New') }}
                    </a>
                @else
                    <a class="dropdown-item disabled" href="#" id="add-new" aria-disabled="true">
                        <i class="fas fa-plus"></i> {{ __('Add New') }}
                    </a>
                @endif
            </li>
        </ul>
    </div>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div class="row">
            @foreach($contactIcons as $contactIcon)
                @php
                    $contactValue = $contactMethods->first()->{$contactIcon['fieldName']} ?? 'غير متوفر';
                    $contactId = $contactMethods->first()->id ?? null;
                @endphp
                <div class="col-md-4 mb-3">
                    <div class="card contact-card">
                        <div class="contact-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="{{ $contactIcon['icon'] }} contact-icon"></i>
                                <div class="ms-3">
                                    <p class="contact-value">{{ $contactValue }}</p>
                                </div>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-link dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <!-- Edit Action -->
                                    <li>
                                        <a class="dropdown-item edit-btn" href="#" data-id="{{ $contactId }}"
                                            data-field="{{ $contactIcon['fieldName'] }}"
                                            data-value="{{ $contactValue }}">
                                            <i class="fas fa-edit"></i> {{ __('Edit') }}
                                        </a>
                                    </li>

                                    <!-- Delete Action -->
                                    <li>
                                        <a class="dropdown-item delete-btn" href="#" data-id="{{ $contactId }}"
                                            data-field="{{ $contactIcon['fieldName'] }}">
                                            <i class="fas fa-trash"></i> {{ __('Delete') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <form id="destroy-user_{{ $contactId }}"
                    action="{{ route('contact.delete', $contactId) }}" method="POST"
                    style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            @endforeach
        </div>
    </div>
</div>

@endsection

@section('page-script')
<!-- BEGIN: Page Vendor JS -->
<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
<!-- END: Page Vendor JS -->

<script>
    $(document).ready(function () {
        // Handle edit button click
        $('.edit-btn').on('click', function () {
            var id = $(this).data('id');
            var field = $(this).data('field');
            var value = $(this).data('value');

            Swal.fire({
                title: 'Edit Contact Method',
                input: 'text',
                inputLabel: 'Enter the new value',
                inputValue: value,
                showCancelButton: true,
                confirmButtonText: 'Save',
                cancelButtonText: 'Cancel',
                inputValidator: (value) => {
                    if (!value) {
                        return 'Please enter a valid value';
                    }
                },
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-secondary ml-1',
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route("contact.updateItem") }}', // Your update route
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,
                            field: field,
                            value: result.value
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Updated!',
                                    text: 'The contact method has been updated successfully.',
                                    confirmButtonClass: 'btn btn-success',
                                }).then(function () {
                                    location
                                        .reload(); // Reload the page to reflect changes
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: response.message,
                                    confirmButtonClass: 'btn btn-danger',
                                });
                            }
                        },
                        error: function (err) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An error occurred while trying to update.',
                                confirmButtonClass: 'btn btn-danger',
                            });
                        }
                    });
                }
            });
        });

        // Handle delete button click
        $('.delete-btn').on('click', function () {
            var id = $(this).data('id');
            var field = $(this).data('field');

            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this item after deletion!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-danger ml-1',
                }
            }).then(function (result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route("contact.deleteItem") }}', // Your delete route
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,
                            field: field
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'The contact method has been deleted successfully.',
                                    confirmButtonClass: 'btn btn-success',
                                }).then(function () {
                                    location
                                        .reload(); // Reload the page to reflect changes
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: response.message,
                                    confirmButtonClass: 'btn btn-danger',
                                });
                            }
                        },
                        error: function (err) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An error occurred while trying to delete.',
                                confirmButtonClass: 'btn btn-danger',
                            });
                        }
                    });
                }
            });
        });
    });

</script>
@endsection
