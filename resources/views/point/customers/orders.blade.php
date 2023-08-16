@extends('layouts.app')
@section('title', __('Purchase orders'))
@push('style')
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-one">
            <div class="card-header">
                <h4 class="mb-0">{{ __('Purchase Orders Statistics') }}</h4>
            </div>
            <div class="row match-height">
                <div class="col-lg-12 col-12">
                    <div class="row match-height">
                        <!-- Earnings Card -->
                        <div class="col-lg-4 col-md-3 col-4">
                            <div class="card earnings-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="card-title mb-1">New Status Count</h4>
                                            <div class="font-large-4">{{ $order_status_statistics->new_status_count }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Earnings Card -->
                        <!-- Earnings Card -->
                        <div class="col-lg-4 col-md-3 col-4">
                            <div class="card earnings-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="card-title mb-1">Prepairing Status Count</h4>
                                            <div class="font-large-4">{{ $order_status_statistics->preparing_status_count }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-4">
                            <div class="card earnings-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="card-title mb-1">Hanging Status Count</h4>
                                            <div class="font-large-4">{{ $order_status_statistics->hanging_status_count }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Earnings Card -->
                    </div>
                </div>
            </div>
            <div class="row match-height">
                <div class="col-lg-12 col-12">
                    <div class="row match-height">
                        <!-- Earnings Card -->
                        <div class="col-lg-4 col-md-3 col-4">
                            <div class="card earnings-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="card-title mb-1">Supplier Canceling Status Count</h4>
                                            <div class="font-large-4">{{ $order_status_statistics->supplier_canceled_status_count }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Earnings Card -->
                        <!-- Earnings Card -->
                        <div class="col-lg-4 col-md-3 col-4">
                            <div class="card earnings-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="card-title mb-1">Completed Status Count</h4>
                                            <div class="font-large-4">{{ $order_status_statistics->complete_status_count }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-4">
                            <div class="card earnings-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="card-title mb-1">Shipping Receipt Status Count</h4>
                                            <div class="font-large-4">{{ $order_status_statistics->shipping_receipt_status_count }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Earnings Card -->
                    </div>
                </div>
            </div>
            <div class="row match-height">
                <div class="col-lg-12 col-12">
                    <div class="row match-height">
                        <!-- Earnings Card -->
                        <div class="col-lg-4 col-md-3 col-4">
                            <div class="card earnings-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="card-title mb-1">Customer Canceling Status Count</h4>
                                            <div class="font-large-4">{{ $order_status_statistics->me_canceled_status_count }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Earnings Card -->
                        <!-- Earnings Card -->
                        <div class="col-lg-4 col-md-3 col-4">
                            <div class="card earnings-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="card-title mb-1">Waiting Supplier Status Count</h4>
                                            <div class="font-large-4">{{ $order_status_statistics->waiting_supplier_status_count }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-4">
                            <div class="card earnings-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="card-title mb-1">Refund Receipt Status Count</h4>
                                            <div class="font-large-4">{{ $order_status_statistics->refund_status_count }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Earnings Card -->
                    </div>
                </div>
            </div>
            <div class="row match-height">
                <div class="col-lg-12 col-12">
                    <div class="row match-height">
                        <!-- Earnings Card -->
                        <div class="col-lg-4 col-md-3 col-4">
                            <div class="card earnings-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="card-title mb-1">Average Time of Closing Order</h4>
                                            <div class="font-large-4">{{ $period_average }} HR</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Earnings Card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @include('QVM.purchase_orders.search.search')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('purchase_orders_purchase_orders') }}</h4>
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
                                    <th>{{ __('purchase_orders_id') }}</th>
                                    <th>{{ __('purchase_orders_subscriber_id') }}</th>
                                    <th>{{ __('purchase_orders_purchase_order_status_id') }}</th>
                                    <th>{{ __('purchase_orders_company_id') }}</th>
                                    <th>{{ __('purchase_orders_payment_type_id') }}</th>
                                    <th>{{ __('purchase_orders_payment_status_id') }}</th>
                                    <th>{{ __('purchase_orders_payment_method_id') }}</th>
                                    <th>{{ __('Closing Time') }}</th>
                                    <th>{{ __('purchase_orders_shipping_type_id') }}</th>
                                    <th>{{ __('purchase_orders_shipping_method_id') }}</th>
                                    <th>{{ __('purchase_orders_total_price') }}</th>
                                    <th>{{ __('purchase_orders_created_at') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $purchase_order)
                                    <tr>
                                        <td>{{ $purchase_order->firstItem + $key + 1 }}</td>
                                        <td>{{ $purchase_order->id }}</td>
                                        <td>{{ $purchase_order->subscriber_name }}
                                        </td>
                                        <td>{{ $purchase_order->purchase_order_status ? $purchase_order->purchase_order_status->en_name : '-' }}
                                        </td>
                                        <td>{{ $purchase_order->company['company_name'] }}</td>
                                        <td>{{ $purchase_order->payment_type ? $purchase_order->payment_type->en_name : '-' }}
                                        </td>
                                        <td>
                                            
                                            @if ($purchase_order['payment_status_id'] == 1)
                                            <span
                                                class="font-weight-bold text-danger">{{ isset($purchase_order['payment_status']) ? $purchase_order['payment_status']['en_name'] : '-' }}</span>
                                        @elseif($purchase_order['payment_status_id'] == 2)
                                            <span
                                                class="font-weight-bold text-success">{{ isset($purchase_order['payment_status']) ? $purchase_order['payment_status']['en_name'] : '-' }}</span>
                                        @else
                                            <span
                                                class="font-weight-bold text-info">{{ isset($purchase_order['payment_status']) ? $purchase_order['payment_status']['en_name'] : '-' }}</span>
                                        @endif


                                    </td>
                                        <td>{{ $purchase_order->payment_method ? $purchase_order->payment_method->en_name : '-' }}
                                        </td>
                                        <td>{{ isset($complete_period[$purchase_order->id]) ? $complete_period[$purchase_order->id] . " HR" : "-" }}
                                        </td>
                                        <td>{{ $purchase_order->shipping_type ? $purchase_order->shipping_type->en_name : '-' }}
                                        </td>
                                        <td>{{ $purchase_order->shipping_method ? $purchase_order->shipping_method->en_name : '-' }}
                                        </td>
                                        <td>{{ $purchase_order->total_price }}</td>
                                        <td>{{ $purchase_order->created_at }}</td>
                                        <td>
                                            <a href="{{ route('purchase_orders.show', $purchase_order->id) }}"
                                                class="btn btn-success mr-1 mb-1 btn-sm"><i class="fa fa-eye"></i></a>
                                            {{-- <button value="{{ $purchase_order->id }}"
                                                class="btn btn-danger mr-1 mb-1 btn-sm delete-this"><i
                                                    class="fa fa-trash"></i></button>
                                            <form id="destroy-purchase_order_{{ $purchase_order->id }}"
                                                action="{{ route('purchase_orders.destroy', $purchase_order->id) }}"
                                                method="POST" style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            <!--/form--> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td dir="rtl" colspan="21">
                                        {{ $orders->links('pagination::bootstrap-5') }} </td>
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
                        document.getElementById('destroy-purchase_order_' + id).submit();
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
