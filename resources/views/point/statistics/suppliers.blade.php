@extends('layouts.app')

@section('title', __('Suppliers Statistics'))
@push('style')
@endpush

@section('content')
    @unless(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('Suppliers'))
  <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless
    @include('QVM.statistics.search.suppliers')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h4 class="mb-0">{{ __('purchase_orders_purchase_orders') }}</h4>
                </div>

                <div class="card-content">

                    @if (Session::has('message'))
                        {!! session('message') !!}
                    @endif

                    <div class="table-responsive mt-1">
                        <table class="table table-hover-animation mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Company ID') }}</th>
                                <th>{{ __('Company Name') }}</th>
                                <th>{{ __('Company Email') }}</th>
                                <th>{{ __('Orders Count') }}</th>
                                <th>{{ __('Total Price') }}</th>
                                <th>{{ __('Percentage Of Orders') }}</th>
                                <th>{{ __('Average of Orders') }}</th>
                                <th>{{ __('View Orders') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $key => $purchase_order)
                                <tr>
                                    <td>{{  $key + 1 }}</td>
                                    <td>{{ $purchase_order['company_id'] }}</td>
                                    <td>{{ $purchase_order['company_name'] }}</td>
                                    <td>{{ $purchase_order['company_email'] }}</td>
                                    <td>{{ $purchase_order['orders_count'] }}</td>
                                    <td>{{ $purchase_order['total_price'] }}</td>
                                    <td>{{ $purchase_order['percentage_of_orders'] }} %</td>
                                    <td>{{ $purchase_order['average_price'] }}</td>


                                    <td>
                                        <a href="{{ route('purchase_orders.index', ['purchase_order_status_id' => $order_status,'company_id' => $purchase_order['company_id']]) }}"
                                           class="btn btn-success mr-1 mb-1 btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        <a href="{{ route('supplier_bank_accounts.show',$purchase_order['company_id'] ) }}"
                                           class="btn btn-info mr-1 mb-1 btn-sm">
                                            <i class="fa fa-info"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td dir="rtl" colspan="21">
{{--                                    {{ $purchase_orders->links('pagination::bootstrap-4') }}--}}
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
