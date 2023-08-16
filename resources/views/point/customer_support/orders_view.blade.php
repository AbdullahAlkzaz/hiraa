@extends('layouts.app')
@section('title', __('Purchase orders'))
<style>
    .modal-lg,
    .modal-xl {
        max-width: 90% !important;
    }
</style>
@push('style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('purchase_orders_purchase_orders') }}</h4>
                </div>
                {{-- @include('QVM.customer_support.search.filter') --}}
                <div class="card-content">
                    <div class="table-responsive mt-1">
                        <table class="table table-hover-animation mb-2">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>{{ __('purchase_orders_id') }}</th>
                                    <th>{{ __('purchase_orders_subscriber_id') }}</th>
                                    <th>{{ __('Subscriber City') }}</th>
                                    <th>{{ __('Purchase Order Status') }}</th>
                                    <th>{{ __('purchase_orders_payment_type_id') }}</th>
                                    <th>{{ __('purchase_orders_payment_status_id') }}</th>
                                    <th>{{ __('purchase_orders_payment_method_id') }}</th>
                                    <th>{{ __('purchase_orders_shipping_type_id') }}</th>
                                    <th>{{ __('purchase_orders_total_price') }}</th>
                                    <th>{{ __('Shortage') }}</th>
                                    <th>{{ __('purchase_orders_created_at') }}</th>
                                    <th>Show Order</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchase_orders as $key => $purchase_order)
                                    <tr>
                                        <td> <a class="show-childs btn btn-danger shown" href="#"><i
                                                    class='fa-solid fa-arrow-up'></i></a> </td>
                                        {{-- <td>{{ $purchase_order->firstItem + $key + 1 }}</td> --}}
                                        <td>{{ $purchase_order->id }}</td>
                                        <td>{{ $purchase_order->subscriber_name }}</td>
                                        <td>{{ $purchase_order->subscriber_city_name }}</td>
                                        <td>
                                            {{ $purchase_order->purchase_order_status ? $purchase_order->purchase_order_status->en_name : '-' }}
                                        </td>
                                        </td>
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
                                        <td>{{ $purchase_order->total_price }}</td>
                                        @if ($purchase_order->purchase_order_status_id > 3 && $purchase_order->shortage)
                                            <td><button class="btn btn-danger"> Shortage </button></td>
                                        @else
                                            <td><button class="btn btn-success"> No Shortage </button></td>
                                        @endif
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
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr class="child-row" id="childs-{{ $purchase_order->id }}"
                                        style="color:#7367f0 !important; background-color: #f3f2f7;">
                                        <td></td>
                                        <td>Item ID</td>
                                        <td>Item Name</td>
                                        <td>Item Number</td>
                                        <td>Item Type</td>
                                        <td>Seller Name</td>
                                        <td>Required Quantity</td>
                                        <td>Assigned Quantity</td>
                                        <td>price</td>
                                        <td>Original Price</td>
                                        <td>Item Status</td>
                                        <td>Shortage</td>
                                        <td>Item brand</td>
                                        <td>Alternatives</td>
                                    </tr>
                                    @foreach ($purchase_order->seller_items as $item)
                                        @php $product_number =  $products[$item->product_id]['productNumber'] ?? 0; @endphp
                                        <tr class="child-row" style="background-color: #f3f2f7;">
                                            <td><span style="color: red"> Alternative </span></td>
                                            <td>{{ $item->item_id }}</td>
                                            <td>{{ isset($products[$item->product_id]) && $products[$item->product_id]['name'] != '' ? $products[$item->product_id]['name'] != '' : $products[$item->product_id]['nameAr'] ?? '-' }}
                                            </td>
                                            <td>{{ $products[$item->product_id]['productNumber'] ?? '-' }}</td>
                                            <td>{{ $products[$item->product_id]['brandClassName'] ?? '-' }}</td>
                                            <td>{{ isset($companies[$item->company_id]) && $companies[$item->company_id]['company_en_name'] != '' ? $companies[$item->company_id]['company_en_name'] : $companies[$item->company_id]['company_name'] ?? '-' }}
                                            </td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->approved_quantity ? $item->approved_quantity : '-' }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->original_price }}</td>
                                            <td>{{ $item->seller_item_status ? $item->seller_item_status->en_name : '-' }}
                                            </td>
                                            @if ($item->item_status > 3 && $item->shortage)
                                                <td><button class="btn btn-danger"> Shortage </button></td>
                                            @else
                                                <td><button class="btn btn-success"> No Shortage </button></td>
                                            @endif
                                            <td>{{ $products[$item->product_id]['brandName'] ?? '-' }}</td>
                                            <td><a class="btn btn-success" href="#"
                                                    onclick='showAlternativeProducts("{{ $product_number }}", "{{ $purchase_order->id }}", "{{ $item->id }}")'>Alteratives</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach ($purchase_order->purchase_order_items as $item)
                                        @php $product_number =  $products[$item->product_id]['productNumber'] ?? 0; @endphp
                                        <tr class="child-row" style="background-color: #f3f2f7;">
                                            <td></td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ isset($products[$item->product_id]) && $products[$item->product_id]['name'] != '' ? $products[$item->product_id]['name'] != '' : $products[$item->product_id]['nameAr'] ?? '-' }}
                                            </td>
                                            <td>{{ $products[$item->product_id]['productNumber'] ?? '-' }}</td>
                                            <td>{{ $products[$item->product_id]['brandClassName'] ?? '-' }}</td>
                                            <td>{{ isset($companies[$item->company_id]) && $companies[$item->company_id]['company_en_name'] != '' ? $companies[$item->company_id]['company_en_name'] : $companies[$item->company_id]['company_name'] ?? '-' }}
                                            </td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->approved_quantity ? $item->approved_quantity : '-' }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->original_price }}</td>
                                            <td>{{ $item->purchase_order_item_status ? $item->purchase_order_item_status->en_name : '-' }}
                                            </td>
                                            @if ($item->item_status > 3 && $item->shortage)
                                                <td><button class="btn btn-danger"> Shortage </button></td>
                                            @else
                                                <td><button class="btn btn-success"> No Shortage </button></td>
                                            @endif
                                            <td>{{ $products[$item->product_id]['brandName'] ?? '-' }}</td>
                                            <td><a class="btn btn-success" href="#"
                                                    onclick='showAlternativeProducts("{{ $product_number }}", "{{ $purchase_order->id }}", "{{ $item->id }}")'>Alteratives</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                            @if ($purchase_orders->links('pagination::bootstrap-4'))
                                <tfoot>
                                    <tr>
                                        <td dir="rtl" colspan="21">
                                            {{ $purchase_orders->links('pagination::bootstrap-4') }} </td>
                                    </tr>
                                </tfoot>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal to show alternative products  -->
    <div class="modal fade" id="alternativeProducts" tabindex="-1" aria-labelledby="alternativeProductsTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-sm-5 mx-50 pb-5">
                    <h1 class="text-center mb-1" id="alternativeProductsTitle">Alternative Products</h1>
                    <p class="text-center">Showing alternative Products</p>
                    <input name="search-number" value="" style="width: 20%; display:inline;" class="form-control" id="search-platform"
                        placeholder="{{ __('search in the platform ') }}">
                    <button class="btn btn-primary" id="search-platform-button">Get Alternatives</button>
                    <div id="alternatives"></div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Modal to show alternative products  -->


@stop
@section('page-script')
    <script src="{{ asset('vendors/js/extensions/sweetalert2.all.min.js') }}"></script>

    {{-- show child rows --}}
    <script>
        $(".show-childs").click(function() {
            if ($(this).attr("class") ==
                "show-childs btn waves-effect waves-float waves-light btn-primary not-shown") {
                $(this).html("<i class='fa-solid fa-arrow-up'></i>");
                $(this).removeClass("btn-primary not-shown");
                $(this).addClass("btn-danger shown");
            } else {
                $(this).removeClass("btn-danger shown");
                $(this).addClass("btn-primary not-shown");
                $(this).html("<i class='fa-solid fa-arrow-down'></i>");
            }
            $(this).closest('tr').nextUntil("tr:has(.show-childs)").toggle("fast", function() {});
        });


        function showAlternativeProducts(number, orderId, itemId) {
            let url = "{{ route('get-product-alternatives') }}"

            const settings = {
                "url": url,
                "method": "GET",
                "data": {
                    number: number,
                    order_id: orderId,
                    item_id: itemId,
                    _token: "{{ csrf_token() }}",
                },
            };

            $.ajax(settings)
                .done(function(response) {
                    $("#alternatives").html(response);
                    $("#alternativeProducts").modal('show');
                })
                .catch(function(err) {
                    console.log(err)
                    errorAlert("Error Happened While Integrating Products", err.responseJSON.message)
                })
        }

        $("#search-platform-button").click(function() {
            $("#search-platform-button").prop('disabled', true);
            let url = "{{ route('get-platform-product-alternatives') }}"
            let number = $("#search-platform").val();
            let orderId = $("#purchase-order-id").val();
            let itemId = $("#item-id").val();
            const settings = {
                "url": url,
                "method": "GET",
                "data": {
                    number: number,
                    order_id: orderId,
                    item_id: itemId,
                    _token: "{{ csrf_token() }}",
                },
            };

            $.ajax(settings)
                .done(function(response) {
                    $("#alternatives").html(response);
                    $("#search-platform-button").prop('disabled', false);
                })
                .catch(function(err) {
                    $("#search-platform-button").prop('disabled', false);
                    console.log(err)
                    errorAlert("Error Happened While Integrating Products", err.responseJSON.message)
                })

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
