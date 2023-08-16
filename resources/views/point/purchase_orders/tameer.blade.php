@extends('layouts.app')
@section('title', __('Purchase orders'))
@push('style')
@endpush
@section('content')
    @unless(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('Tameed orders'))
  <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ __('Filters') }}</h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                    <li><a data-action=""><i class="feather icon-rotate-cw users-data-filter"></i></a></li>
                    <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-content collapse show">
            <div class="card-body">
                <div class="users-list-filter">
                    @php $currenturl = url()->current(); @endphp
                    <form action="{{ $currenturl }}" method="GET">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-3">
                                <label for="purchase_orders-list-id">{{ __('purchase_orders_id') }}</label>
                                <fieldset class="form-group">
                                    <input class="form-control" name="id" type="number"
                                           value="@if (isset($_GET['id'])) {{ $_GET['id'] }} @endif"
                                           placeholder="{{ __('purchase_orders_id') }}" />
                                </fieldset>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-3">
                                <label
                                    for="purchase_orders-list-created_at">{{ __('From') }}</label>
                                <fieldset class="form-group">
                                    @empty($_GET['from'])
                                        <input class="form-control" name="from" type="date" value="" />
                                    @else
                                        <input class="form-control" name="from" type="date" value="{{ $_GET['from'] }}" />
                                    @endempty

                                </fieldset>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-3">
                                <label
                                    for="purchase_orders-list-created_at">{{ __('To') }}</label>
                                <fieldset class="form-group">
                                    @empty($_GET['from'])
                                        <input class="form-control" name="to" type="date" value="" />
                                    @else
                                        <input class="form-control" name="to" type="date" value="{{ $_GET['to'] }}" />
                                    @endempty

                                </fieldset>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-3">
                                <label
                                    for="purchase_orders-list-shipping_type_id">{{ __('Subscribers') }}</label>
                                <fieldset class="form-group">
                                    <select name="subscriber_id" class="form-control"
                                            id="purchase_orders-list-shipping_type_id">
                                        <option value="">{{ __('All') }}</option>
                                        @foreach ($subscribers_arr as $subscriber)
                                            @empty($_GET['subscriber_id'])
                                                <option value="{{ $subscriber['subscriber_id'] }}">{{ $subscriber['subscriber_name'] }}</option>
                                            @else
                                                <option
                                                    @if($_GET['subscriber_id'] == $subscriber['subscriber_id'] ){{ 'selected' }} @endif
                                                    value="{{ $subscriber['subscriber_id'] }}"
                                                >
                                                    {{ $subscriber['subscriber_name'] }}
                                                </option>
                                            @endempty
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>

                            <div class="col-12 ">
                                <button type="submit" class="btn btn-info">{{ __('Find') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                        <table class="table table-hover-animation mb-2">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('purchase_orders_id') }}</th>
                                <th>{{ __('purchase_orders_subscriber_id') }}</th>
                                <th colspan="10" >{{ __('Purchase Order Status') }}</th>
{{--                                <th>{{ __('purchase_orders_payment_status_id') }}</th>--}}
                                <th>{{ __('purchase_orders_total_price') }}</th>
                                <th>{{ __('purchase_orders_created_at') }}</th>

                                <th>{{ __('wallets_current_balance') }}</th>
                                <th>{{ __('wallets_pending_balance') }}</th>
                                <th>{{ __('wallets_transferable_balance') }}</th>
                               <th>{{ __('Payment Status') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($purchase_orders as $key => $purchase_order)
                                <tr>
                                    <td>{{ $purchase_order->firstItem + $key + 1 }}</td>
                                    <td>{{ $purchase_order->id }}</td>
                                    <td>{{ $purchase_order->subscriber_name }}
                                    </td>
                                    <td colspan="10" >
                                        <select class="form-control order_status_id {{ $errors->has('order_status_id') ? 'is-invalid' : '' }} "
                                            name="order_status_id"  data-order_id = "{{$purchase_order->id}}">
                                                <option value="1">{{ 'New Order' }}</option>
                                                <option {{ $purchase_order->purchase_order_status_id == 9 ? 'selected="selected"' : '' }} value="9">{{ 'Under Payment' }}</option>
                                        </select>
                                    </td>

{{--                                    <td>--}}
{{--                                        @if ($purchase_order['payment_status_id'] == 1)--}}
{{--                                            <span--}}
{{--                                                class="font-weight-bold text-danger">{{ isset($purchase_order['payment_status']) ? $purchase_order['payment_status']['en_name'] : '-' }}</span>--}}
{{--                                        @elseif($purchase_order['payment_status_id'] == 2)--}}
{{--                                            <span--}}
{{--                                                class="font-weight-bold text-success">{{ isset($purchase_order['payment_status']) ? $purchase_order['payment_status']['en_name'] : '-' }}</span>--}}
{{--                                        @else--}}
{{--                                            <span--}}
{{--                                                class="font-weight-bold text-info">{{ isset($purchase_order['payment_status']) ? $purchase_order['payment_status']['en_name'] : '-' }}</span>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}

                                    <td>{{ $purchase_order->total_price }}</td>
                                    <td>{{ $purchase_order->created_at }}</td>

                                    <td>{{ $purchase_order->current_balance }}</td>
                                    <td>{{ $purchase_order->pending_balance }}</td>
                                    <td>{{ $purchase_order->transferable_balance }}</td>
                                    <td><button class="btn btn-primary" onclick='getPaymentRequestStatus("{{$purchase_order->payment_request_id}}")'>Payment Status</button></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td dir="rtl" colspan="21">
                                    {{ $purchase_orders->links('pagination::bootstrap-4') }} </td>
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
@section('page-script')
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script>
        $('.order_status_id').on('change', function() {
            var orderId =  $(this).attr("data-order_id");
            var url = 'purchase_orders/' + orderId + '/change_order_status/' + $(this).val();
            url = "{{url('')}}"+ "/" + url
            $.ajax({
                type: 'post',
                url: url,
                data: {
                    _token : "{{csrf_token()}}",
                },
                dataType: 'html',
                success: function (data) {
                    // Swal.fire({
                    //     type: "success",
                    //     title: 'status updated',
                    //     text: 'the order has been updated.',
                    //     confirmButtonClass: 'btn btn-success',
                    // })
                    toastr['info']('👋 '+ 'the order has been updated.' +' .', "status updated", {
                        closeButton: true,
                        tapToDismiss: false,
                        rtl: false
                    });

                    location.reload()
                },
                error: function (err){
                    console.log(err);
                }
            });
        });

        function getPaymentRequestStatus(requestId){
            var url = 'payment-request-status/' + requestId;
            url = "{{url('')}}"+ "/" + url
            $.ajax({
                type: 'get',
                url: url,
                dataType: 'html',
                success: function (data) {
                    Swal.fire({
                        type: "success",
                        title: 'Status Retrieved',
                        text: 'The payment status is: ' + data,
                        confirmButtonClass: 'btn btn-success',
                    })
                },
                error: function (err){
                    console.log(err);
                }
            });
        }
    </script>
@endsection
