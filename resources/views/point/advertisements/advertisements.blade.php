@extends('layouts.app')
@section('title', __('Advertisements'))
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
@endsection
@section('content')
    @unless(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('Ads'))
        <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless
@include('QVM.advertisements.search.search')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">{{ __('advertisements_advertisements') }}</h4>
                <a class="btn btn-outline-info" href="{{ route('ads.create') }}">
                    <i class="fa fa-plus" aria-hidden="true"></i> {{ __('Add New') }}
                </a>
            </div>
            <div class="card-content">
                <div class="table-responsive mt-1">
                    <table class="table table-hover-animation mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('advertisements_image') }}</th>
                                <th>{{ __('advertisements_position') }}</th>
                                <th>{{ __('advertisements_is_active') }}</th>
                                <th>{{ __('advertisements_sorting') }}</th>
                                <th>{{ __('advertisements_created_at') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($advertisements as $key => $advertisement)
                                <tr>
                                    <td>{{ $advertisement->firstItem + $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset($advertisement->image) }}" higth="100" width="100">
                                    </td>
                                    <td>{{ $advertisement->position }}</td>
                                    <td>{{ $advertisement->is_active == 1 ? __('YES') : __('NO') }}</td>
                                    <td>{{ $advertisement->sorting }}</td>
                                    <td>{{ $advertisement->created_at }}</td>
                                    <td>
                                        <a href="{{ route('ads.show', $advertisement->id) }}"
                                            class="btn btn-success mr-1 mb-1 btn-sm">
                                            <i data-feather='edit'></i>
                                        </a>
                                        <button value="{{ $advertisement->id }}"
                                            class="btn btn-danger mr-1 mb-1 btn-sm delete-this">
                                            <i data-feather='trash-2'></i>
                                        </button>
                                        <form id="destroy-advertisement_{{ $advertisement->id }}"
                                            action="{{ route('ads.destroy', $advertisement->id) }}"
                                            method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        {{ __('No data found') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td dir="rtl" colspan="8">
                                    {{ $advertisements->links('pagination::bootstrap-4') }} </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@endsection
@section('page-script')
    <script src="{{ asset(mix('js/scripts/extensions/ext-component-sweet-alerts.js')) }}"></script>
    <script>
        $(document).ready(function() {
            $('.delete-this').on('click', function() {
                var id = ($(this).val());
                Swal.fire({
                    title: "{{ __('Are you sure?') }}",
                    text: "{{ __('You wont be able to revert this!') }}",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "{{ __('Yes, delete it!') }}",
                    confirmButtonClass: 'btn btn-primary',
                    cancelButtonClass: 'btn btn-danger ml-1',
                    cancelButtonText: "{{ __('Cancel') }}",
                    buttonsStyling: false,
                }).then(function(result) {
                    if (result.value) {
                        Swal.fire({
                            type: "success",
                            title: 'Deleted!',
                            text: 'Your file has been deleted.',
                            confirmButtonClass: 'btn btn-success',
                        })
                        document.getElementById('destroy-advertisement_' + id).submit();
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            title: "{{ __('Cancelled') }}",
                            text: "{{ __('Your data is safe :)') }}",
                            type: 'error',
                            confirmButtonClass: 'btn btn-success',
                        })
                    }
                })
            });
        });
    </script>
    @if (Session::has('message'))
        <script>
            Swal.fire({
                position: 'top-end',
                type: 'success',
                html: '{!! session('message') !!}',
                showConfirmButton: false,
                timer: 3000,
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
        </script>
    @endif
@endsection


@extends('layouts.app')
@section('title', __('Advertisements'))
@section('content-header')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{ __('advertisements_advertisements') }}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">
                            {{ __('advertisements_advertisements') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <div class="form-group breadcrum-right">
            <a title="{{ __('Add new') }}" class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle"
                href="{{ route('ads.create') }}">
                <i class="feather icon-plus"></i></a>
        </div>
    </div>
@endsection
@section('breadcrumb-right')
