@extends('layouts.app')
@section('title', __('Purchase orders'))
@push('style')
@endpush
@section('content')
    @unless(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('Purchase orders'))
  <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless
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
                        <table class="table table-hover-animation mb-2">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-check">
                                            <input class="form-check-input select-all-orders"
                                                   type="checkbox" value="" id="select-all-orders" />
                                            <label class="form-check-label" for=select-all-orders></label>
                                        </div>
                                    </th>
                                    <th>#</th>
                                    <th>{{ __('purchase_orders_id') }}</th>
                                    <th>{{ __('purchase_orders_subscriber_id') }}</th>
                                    <th colspan="10" >{{ __('Purchase Order Status') }}</th>
                                    <th>{{ __('purchase_orders_company_id') }}</th>
                                    <th>{{ __('purchase_orders_payment_type_id') }}</th>
                                    <th>{{ __('purchase_orders_payment_status_id') }}</th>
                                    <th>{{ __('purchase_orders_payment_method_id') }}</th>
                                    <th>{{ __('purchase_orders_shipping_type_id') }}</th>
                                    <th>{{ __('purchase_orders_shipping_method_id') }}</th>
                                    <th>{{ __('purchase_orders_total_price') }}</th>
                                    <th>{{ __('purchase_orders_created_at') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchase_orders as $key => $purchase_order)
                                    <tr>
                                        <td>

                                            <div class="form-check">
                                                <input class="form-check-input select_order" data-orderid="{{ $purchase_order->id }}" type="checkbox" value="" id="select-order-{{ $purchase_order->id }}" />
                                                <label class="form-check-label" for="select-order-{{ $purchase_order->id }}"></label>
                                            </div>
                                        </td>
                                        <td>{{ $purchase_order->firstItem + $key + 1 }}</td>
                                        <td>{{ $purchase_order->id }}</td>
                                        <td>{{ $purchase_order->subscriber_name }}
                                        </td>
                                        <td colspan="10" ><select
                                                class="form-control order_status_id {{ $errors->has('order_status_id') ? 'is-invalid' : '' }} "
                                                name="order_status_id"  data-order_id = "{{$purchase_order->id}}">
                                                @foreach ($purchase_order_statuses as $purchase_order_status)
                                                    <option <?php echo $purchase_order->purchase_order_status_id == $purchase_order_status->id ? 'selected="selected"' : ''; ?>
                                                        value="{{ $purchase_order_status->id }}">
                                                        {{ $purchase_order_status->en_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <!-- <td colspan=4>{{ $purchase_order->purchase_order_status ? $purchase_order->purchase_order_status->en_name : '-' }} -->
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
                                        <td>{{ $purchase_order->shipping_type ? $purchase_order->shipping_type->en_name : '-' }}
                                        </td>
                                        <td>{{ $purchase_order->shipping_method ? $purchase_order->shipping_method->en_name : '-' }}
                                        </td>
                                        <td>{{ $purchase_order->total_price  }}</td>
                                        <td>{{ $purchase_order->created_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button
                                                    class="btn btn-primary dropdown-toggle"
                                                    type="button"
                                                    id="dropdownMenuButton"
                                                    data-bs-toggle="dropdown"
                                                    aria-expanded="false"
                                                >
                                                    Show
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{ url('purchase_orders' . '/' . $purchase_order->id . '?group=cities') }}">Cities Orders</a>
                                                    <a class="dropdown-item" href="{{ url('purchase_orders' . '/' . $purchase_order->id . '?group=sellers') }}">Sellers Orders</a>
                                                </div>
                                            </div>
                                        </td>
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
    <script src="{{asset('vendors/js/extensions/sweetalert2.all.min.js')}}"></script>

    <script>
        let orderIDs = [];

        $('.select_order').on('click',function (){
            const orderId = $(this).data('orderid')

            let alreadyExist = orderIDs.find(function (id) {
                return id === orderId
            })

            if(alreadyExist){
                orderIDs = orderIDs.filter(function (id) {
                    return id !== orderId
                })

                $('.select-all-orders').prop('checked', false)
            }else{
                orderIDs.push(orderId)
            }

            $('#runsheet-ids').val(orderIDs)
        });

        $('.select-all-orders').on('click', function (){
            const select = $('.select_order')

            let checked = $(this).is(':checked')

            if(checked === true){
                orderIDs = [];
                select.prop('checked', true)
                for(let i = 0; i < select.length; i ++){
                    let elem = $(select[i])
                    orderIDs.push(elem.data('orderid'))
                }
            }else {
                orderIDs = [];
                select.prop('checked', false)
            }

            $('#runsheet-ids').val(orderIDs)
            console.log(orderIDs)
        })

        $('#runsheet-button').on('click',function (e){
            e.preventDefault()
            if(orderIDs.length === 0){
                Swal.fire({
                    icon: 'error',
                    title: "Select Some Orders",
                    text: "Please select orders to generate run sheet",
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                })

                return
            }

            $('#runsheet-form').submit()
        })

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
                },
                error: function (err){
                    console.log(err);
                    Swal.fire({
                        icon: 'error',
                        title: "Can not change order status",
                        text: JSON.parse(err.responseText).message,
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    })
                }
            });
        });
    </script>
@endsection
