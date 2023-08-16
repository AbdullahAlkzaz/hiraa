@extends('layouts.app')
@section('content-header')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{ __('order_items_order_items') }}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">
                            {{ __('order_items_order_items') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <div class="form-group breadcrum-right">
            <a title="{{ __('Add new') }}" class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle"
                href="{{ route('order_items.create') }}">
                <i class="feather icon-plus"></i></a>
        </div>
    </div>
@endsection
@push('style')
@endpush
@section('content')
    @include('QVM.order_items.search.search')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('order_items_order_items') }}</h4>
                </div>
                <div class="card-content">
                    @if (Session::has('message'))
                        <!--div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                <p class="mb-0">
                                                    {!! session('message') !!}
                                                </p>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div-->
                    @endif
                    <div class="table-responsive mt-1">
                        <table class="table table-hover-animation mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('order_items_id') }}</th>
                                    <th>{{ __('order_items_branch_id') }}</th>
                                    <th>{{ __('order_items_order_id') }}</th>
                                    <th>{{ __('order_items_product_id') }}</th>
                                    <th>{{ __('order_items_order_max_quantity') }}</th>
                                    <th>{{ __('order_items_order_min_quantity') }}</th>
                                    <th>{{ __('order_items_price') }}</th>
                                    <th>{{ __('order_items_offer_detail_id') }}</th>
                                    <th>{{ __('order_items_quantity') }}</th>
                                    <th>{{ __('order_items_total_price') }}</th>
                                    <th>{{ __('order_items_order_items_availability_id') }}</th>
                                    <th>{{ __('order_items_created_at') }}</th>
                                    <th>{{ __('order_items_updated_at') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order_items as $key => $order_item)
                                    <tr>
                                        <td>{{ $order_item->firstItem + $key + 1 }}</td>
                                        <td>{{ $order_item->id }}</td>
                                        <td>{{ $order_item->branch_id }}</td>
                                        <td>{{ $order_item->order_id }}</td>
                                        <td>{{ $order_item->product_id }}</td>
                                        <td>{{ $order_item->order_max_quantity }}</td>
                                        <td>{{ $order_item->order_min_quantity }}</td>
                                        <td>{{ $order_item->price }}</td>
                                        <td>{{ $order_item->offer_detail_id }}</td>
                                        <td>{{ $order_item->quantity }}</td>
                                        <td>{{ $order_item->total_price }}</td>
                                        <td>{{ $order_item->order_items_availability_id }}</td>
                                        <td>{{ $order_item->created_at }}</td>
                                        <td>{{ $order_item->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('order_items.show', $order_item->id) }}"
                                                class="btn btn-success mr-1 mb-1 btn-sm"><i class="fa fa-edit"></i></a>
                                            <button value="{{ $order_item->id }}"
                                                class="btn btn-danger mr-1 mb-1 btn-sm delete-this"><i
                                                    class="fa fa-trash"></i></button>
                                            <form id="destroy-order_item_{{ $order_item->id }}"
                                                action="{{ route('order_items.destroy', $order_item->id) }}" method="POST"
                                                style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td dir="rtl" colspan="14">{{ $order_items->links('pagination::bootstrap-4') }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <!-- END: Page Vendor JS-->
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
                        document.getElementById('destroy-order_item_' + id).submit();
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
@endpush
