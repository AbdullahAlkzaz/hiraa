@extends('layouts.app')

@section('title', __('Orders'))

@push('style')
@endpush
@section('content')
    @unless(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('Orders'))
  <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless
    @include('QVM.orders.search.search')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('orders_orders') }}</h4>
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
                                    <th>{{ __('orders_id') }}</th>
                                    <th>{{ __('orders_subscriber_id') }}</th>
                                    <th>{{ __('orders_order_status_id') }}</th>
                                    <th>{{ __('orders_company_id') }}</th>

                                    <th>{{ __('orders_payment_type_id') }}</th>
                                    <th>{{ __('orders_payment_method_id') }}</th>
                                    <th>{{ __('orders_order_items_availability_id') }}</th>
                                    <th>{{ __('orders_shipping_type_id') }}</th>
                                    <th>{{ __('orders_shipping_method_id') }}</th>
                                    <th>{{ __('orders_shipping_price') }}</th>
                                    <th>{{ __('orders_tax') }}</th>
                                    <th>{{ __('orders_default_sales_tax') }}</th>
                                    <th>{{ __('orders_price') }}</th>
                                    <th>{{ __('orders_total_price') }}</th>

                                    <th>{{ __('orders_created_at') }}</th>
                                    <th>{{ __('orders_updated_at') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                    <tr>
                                        <td>{{ $order->firstItem + $key + 1 }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->subscriber_name }}</td>
                                        <td>{{ ($order->order_status) ? $order->order_status->en_name : '-' }}</td>
                                        <td>{{ $order->company['company_name'] }}</td>

                                        <td>


                                            {{ ($order->payment_type) ? $order->payment_type->en_name : '-' }}</td>
                                        <td>{{ ($order->payment_method) ? $order->payment_method->en_name : '-' }}</td>
                                        <td>
                                            <span class="@if($order->order_items_availability_id > 1)  text-danger @endif" >
                                                {{ ($order->order_items_availability) ? $order->order_items_availability->en_name : '-' }}
                                            </span>
                                            </td>
                                        <td>{{ ($order->shipping_type) ? $order->shipping_type->en_name : '-' }}</td>
                                        <td>{{ ($order->shipping_method) ? $order->shipping_method->en_name : '-' }}</td>


                                        <td>{{ $order->shipping_price }}</td>
                                        <td>{{ $order->tax }}</td>
                                        <td>{{ $order->default_sales_tax }}</td>
                                        <td>{{ $order->price }}</td>
                                        <td>{{ $order->total_price }}</td>

                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ $order->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('orders.show', $order->id) }}"
                                                class="btn btn-success mr-1 mb-1 btn-sm"><i data-feather='eye'></i></a>
                                            <button value="{{ $order->id }}"
                                                class="btn btn-danger mr-1 mb-1 btn-sm delete-this">
                                                <i data-feather='trash-2'></i>
                                                </button>
                                            <form id="destroy-order_{{ $order->id }}"
                                                action="{{ route('orders.destroy', $order->id) }}" method="POST"
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
                                    <td dir="rtl" colspan="22">{{ $orders->links('pagination::bootstrap-4') }} </td>
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
                        document.getElementById('destroy-order_' + id).submit();
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
    <script type="text/javascript">
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
@endpush
