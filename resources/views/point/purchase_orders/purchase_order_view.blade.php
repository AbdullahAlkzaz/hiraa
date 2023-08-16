@extends('layouts/contentLayoutMaster')
@section('title', 'Purchase Order Preview')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{ asset('css/base/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base/pages/app-invoice.css') }}">
@endsection
@section('content')
    @unless(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Purchase orders'))
  <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless
    <section class="invoice-preview-wrapper">
        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-9 col-md-8 col-12">
                <div class="card invoice-preview-card">
                    <div class="card-body invoice-padding pb-0">
                        <!-- Header starts -->
                        <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                            <div>
                                <div class="logo-wrapper">
                                    <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                        <defs>
                                            <linearGradient id="invoice-linearGradient-1" x1="100%" y1="10.5120544%"
                                                x2="50%" y2="89.4879456%">
                                                <stop stop-color="#000000" offset="0%"></stop>
                                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                                            </linearGradient>
                                            <linearGradient id="invoice-linearGradient-2" x1="64.0437835%" y1="46.3276743%"
                                                x2="37.373316%" y2="100%">
                                                <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                                            </linearGradient>
                                        </defs>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-400.000000, -178.000000)">
                                                <g transform="translate(400.000000, 178.000000)">
                                                    <path class="text-primary"
                                                        d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                                        style="fill: currentColor"></path>
                                                    <path
                                                        d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                                        fill="url(#invoice-linearGradient-1)" opacity="0.2"></path>
                                                    <polygon fill="#000000" opacity="0.049999997"
                                                        points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                                    </polygon>
                                                    <polygon fill="#000000" opacity="0.099999994"
                                                        points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                                    </polygon>
                                                    <polygon fill="url(#invoice-linearGradient-2)" opacity="0.099999994"
                                                        points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288">
                                                    </polygon>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <h3 class="text-primary invoice-logo">QVM</h3>
                                </div>
                                <!-- https://maps.google.com/?q=38.6531004,-90.243462&ll=38.6531004,-90.243462&z=3 -->


                                <a target="_blank"  href = "https://maps.google.com?q={{$purchase_order['cities']->order_latitude}},{{$purchase_order['cities']->order_longitude}}&ll={{$purchase_order['cities']->order_latitude}},{{$purchase_order['cities']->order_longitude}}&z=7">
                                <p class="card-text mb-25 ">Kingdom of Saudi Arabia</p>
                                <p class="card-text mb-25 ">10th Street, al-Waha Dist. Dammam, </p>
                                <p class="card-text mb-0  "> + (966) 582702017 </p>
                                <p class="card-text mb-0  "> info@qetaa.parts </p><a>

                            </div>
                            <div class="mt-md-0 mt-2">
                                <h4 class="invoice-title">
                                    Order NO.
                                    <span class="invoice-number">#{{ $purchase_order["cities"]->id }}</span>
                                </h4>
                                <div class="invoice-date-wrapper">
                                    <p class="invoice-date-title">Date Issued:</p>
                                    <p class="invoice-date">
                                        {{ $purchase_order["cities"]->created_at }}
                                    </p>
                                </div>
                                <div class="invoice-date-wrapper  ">
                                    <p class="invoice-date-title">Due Date:</p>
                                    <p class="invoice-date">{{ $purchase_order["cities"]->created_at }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Header ends -->
                    </div>
                    <hr class="invoice-spacing" />
                    <!-- Address and Contact starts -->
                    <div class="card-body invoice-padding pt-0">
                        <div class="row invoice-spacing">
                            <div class="col-xl-8 p-0">
                                <?php $subscriber = $purchase_order['subscriber'];
                                ?>
                                <h6 class="mb-2">Customer:</h6>
                                <h6 class="mb-25">{{ $subscriber['subscriber_name'] }}</h6>
                                <p class="card-text mb-25  ">Shelby Company Limited</p>
                                <p class="card-text mb-25  ">Small Heath, B10 0HF, UK</p>
                                <p class="card-text mb-25">{{ $subscriber['subscriber_mobile'] }}</p>
                                <p class="card-text mb-0">{{ $subscriber['subscriber_email'] }}</p>
                            </div>
                            <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                <h6 class="mb-2  ">Payment Details:</h6>
                                <table class=" " >
                                    <tbody>
                                        <tr>
                                            <td class="pe-1">Total Due:</td>
                                            <td><span class="fw-bold">{{ $purchase_order['cities']->total_price }}</span></td>
                                        </tr>
                                        @if ($purchase_order['cities']->payment_method_id == 1)

                                        <tr>
                                            <td class="pe-1">Wallet ID:</td>
                                            <td>12345</td>
                                        </tr>

                                        <tr>
                                            <td class="pe-1">Transaction ID:</td>
                                            <td>12345</td>
                                        </tr>

                                        @else

                                        <tr>
                                            <td class="pe-1">Bank name:</td>
                                            <td>American Bank</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-1">Country:</td>
                                            <td>United States</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-1">IBAN:</td>
                                            <td>ETD95476213874685</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-1">SWIFT code:</td>
                                            <td>BR91905</td>
                                        </tr>

                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Address and Contact ends -->
                    <!-- Invoice Description starts -->
                    @if(request("group") == "cities")
                    <div class="table-responsive">
                        <?php
                            $subtotal = 0;
                            $cities = [];
                            $cities = $purchase_order['cities']->items;
                        ?>
                        @foreach ($cities as $key => $city)
                        <h3 style="text-align:center;"> {{$city["city_name"]}} </h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="py-1">Product</th>
                                    <th class="py-1">Unit Price</th>
                                    <th class="py-1">Qty Requested</th>
                                    <th class="py-1">Qty Approved</th>
                                    <th class="py-1">Qty Shortage</th>
                                    <th class="py-1">Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                    @foreach ($city["city_items"] as $key1 => $purchase_order_item)
                                        <?php
                                        $subtotal += $purchase_order_item->total_price;
                                        ?>
                                        <tr>
                                            <td class="py-1">
                                                <p class="card-text fw-bold mb-25">Name: {{ isset($products_data[$purchase_order_item->product_id]) ? $products_data[$purchase_order_item->product_id]['name'] ?? "-" : '-' }}</p>
                                                <p class="card-text text-nowrap">
                                                    Brand: {{ isset($products_data[$purchase_order_item->product_id]) ? $products_data[$purchase_order_item->product_id]['brand_name'] : '-' }}
                                                </p>
                                                <p class="card-text text-nowrap">
                                                    Number: {{ isset($products_data[$purchase_order_item->product_id]) ? $products_data[$purchase_order_item->product_id]['product_number'] : '-' }}
                                                </p>
                                                <p class="card-text text-nowrap">
                                                    type: {{ isset($products_data[$purchase_order_item->product_id]) ? $products_data[$purchase_order_item->product_id]['brand_class_en_name'] : '-' }}
                                                </p>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $purchase_order_item->price }}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $purchase_order_item->quantity }}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $purchase_order_item->approved_quantity }}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $purchase_order_item->quantity - $purchase_order_item->approved_quantity }}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $purchase_order_item->total_price }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Invoice Actions -->
                            <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                                <div class=" d-flex align-items-center justify-content-center card">
                                    <div class="card-body">
                                        <button class="btn btn-primary w-100 mb-75 d-none" data-bs-toggle="modal"
                                            data-bs-target="#send-invoice-sidebar">
                                            Send Invoice
                                        </button>
                                        <button class="btn btn-outline-secondary w-100 btn-download-invoice mb-75 d-none">Download</button>
                                        <a class="btn btn-outline-secondary w-100 mb-75 d-none" href="{{ url('app/invoice/print') }}"
                                            target="_blank"> Print </a>
                                        <a class="btn btn-outline-secondary w-100 mb-75 d-none" href="{{ url('app/invoice/edit') }}"> Edit </a>
                                            <label class="label" >
                                                Current {{$city["city_name"]}} status:
                                            </label>

                                            <form class="form-horizontal" role="form" method="POST"
                                            action="{{ route('purchase_orders.city_change_status' , ['id' => $purchase_order['cities']->id , 'city_id' => $city['city_id']] ) }}" >

                                            {!! csrf_field() !!}
                                            {{ method_field('PUT') }}

                                        <select
                                        class="form-control  {{ $errors->has('order_status_id') ? 'is-invalid' : '' }} "
                                        name="order_status_id" id="order-status-select">
                                        @foreach ($purchase_order_statuses as $purchase_order_status)
                                            <option <?php echo $city["status"] == $purchase_order_status->id ? 'selected="selected"' : ''; ?>
                                                value="{{ $purchase_order_status->id }}">
                                                {{ $purchase_order_status->en_name }}</option>
                                        @endforeach
                                    </select>

                                    <button class="btn btn-success w-100 mt-1"  type="submit" >
                                            Change status
                                        </button>
                                    </form>


                                        <!--button class="btn btn-success w-100 mt-1" data-bs-toggle="modal"
                                            data-bs-target="#add-payment-sidebar">
                                            Change status
                                        </button-->
                                    </div>
                                </div>
                            </div>
                            <hr>
            <!-- /Invoice Actions -->
                            @endforeach
                    </div>
                    @elseif(request("group") == "sellers")
                    <div class="table-responsive">
                        <?php
                            $subtotal = 0;
                            $sellers = [];
                            $sellers = $purchase_order['sellers']->items;
                        ?>
                        @foreach ($sellers as $key => $seller)
                        <h3 style="text-align:center;"> {{$seller["seller_name"]}} </h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="py-1">Product</th>
                                    <th class="py-1">Unit Price</th>
                                    <th class="py-1">Qty Requested</th>
                                    <th class="py-1">Qty approved</th>
                                    <th class="py-1">Qty Shortage</th>
                                    <th class="py-1">Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                    @foreach ($seller["seller_items"] as $key1 => $purchase_order_item)
                                        <?php
                                        $subtotal += $purchase_order_item->total_price;
                                        ?>
                                        <tr>
                                            <td class="py-1">
                                                <p class="card-text fw-bold mb-25">Name: {{ isset($products_data[$purchase_order_item->product_id]) ? $products_data[$purchase_order_item->product_id]['name'] : '-' }}</p>
                                                <p class="card-text text-nowrap">
                                                    Brand: {{ isset($products_data[$purchase_order_item->product_id]) ? $products_data[$purchase_order_item->product_id]['brand_name'] : '-' }}
                                                </p>
                                                <p class="card-text text-nowrap">
                                                    Number: {{ isset($products_data[$purchase_order_item->product_id]) ? $products_data[$purchase_order_item->product_id]['product_number'] : '-' }}
                                                </p>
                                                <p class="card-text text-nowrap">
                                                    type: {{ isset($products_data[$purchase_order_item->product_id]) ? $products_data[$purchase_order_item->product_id]['brand_class_en_name'] : '-' }}
                                                </p>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $purchase_order_item->price }}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $purchase_order_item->quantity }}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $purchase_order_item->approved_quantity }}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $purchase_order_item->quantity - $purchase_order_item->approved_quantity }}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $purchase_order_item->total_price }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Invoice Actions -->
                            <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                                <div class=" d-flex align-items-center justify-content-center card">
                                    <div class="card-body">
                                        <button class="btn btn-primary w-100 mb-75 d-none" data-bs-toggle="modal"
                                            data-bs-target="#send-invoice-sidebar">
                                            Send Invoice
                                        </button>
                                        <button class="btn btn-outline-secondary w-100 btn-download-invoice mb-75 d-none">Download</button>
                                        <a class="btn btn-outline-secondary w-100 mb-75 d-none" href="{{ url('app/invoice/print') }}"
                                            target="_blank"> Print </a>
                                        <a class="btn btn-outline-secondary w-100 mb-75 d-none" href="{{ url('app/invoice/edit') }}"> Edit </a>
                                            <label class="label" >
                                                Current {{$seller["seller_name"]}} status:
                                            </label>
                                            <form class="form-horizontal" role="form" method="POST"
                                            action="{{ route('purchase_orders.seller_change_status' ,['id' => $purchase_order['sellers']->id, 'seller_id' => $seller['seller_id']] ) }}" >

                                            {!! csrf_field() !!}
                                            {{ method_field('PUT') }}

                                        <select
                                        class="form-control  {{ $errors->has('order_status_id') ? 'is-invalid' : '' }} "
                                        name="order_status_id">
                                        @foreach ($purchase_order_statuses as $purchase_order_status)
                                            <option <?php echo $seller["status"] == $purchase_order_status->id ? 'selected="selected"' : ''; ?>
                                                value="{{ $purchase_order_status->id }}">
                                                {{ $purchase_order_status->en_name }}</option>
                                        @endforeach
                                    </select>

                                    <button class="btn btn-success w-100 mt-1"  type="submit" >
                                            Change status
                                        </button>
                                    </form>


                                        <!--button class="btn btn-success w-100 mt-1" data-bs-toggle="modal"
                                            data-bs-target="#add-payment-sidebar">
                                            Change status
                                        </button-->
                                    </div>
                                </div>
                            </div>
                            <hr>
            <!-- /Invoice Actions -->
                            @endforeach
                    </div>
                    @endif
                    <div class="card-body invoice-padding pb-0">
                        <div class="row invoice-sales-total-wrapper">
                            <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                <p class="card-text mb-0">
                                    <span class="fw-bold  ">User:</span> <span
                                        class="ms-75">{{ Auth::user()->name }}</span>
                                </p>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                                <div class="invoice-total-wrapper">
                                    <div class="invoice-total-item">
                                        <p class="invoice-total-title">Subtotal:</p>
                                        <p class="invoice-total-amount">{{ $subtotal }}</p>
                                    </div>
                                    <div class="invoice-total-item ">
                                        <p class="invoice-total-title">Shipping price:</p>
                                        <p class="invoice-total-amount">{{ $purchase_order["cities"]->shipping_price }}</p>
                                    </div>
                                    <div class="invoice-total-item">
                                        <p class="invoice-total-title">Tax:</p>
                                        <p class="invoice-total-amount">{{ $purchase_order["cities"]->tax }}</p>
                                    </div>
                                    <hr class="my-50" />
                                    <div class="invoice-total-item">
                                        <p class="invoice-total-title">Total:</p>
                                        <p class="invoice-total-amount">{{ $purchase_order["cities"]->total_price}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Invoice Description ends -->
                    <hr class="invoice-spacing" />
                    <!-- Invoice Note starts -->
                    <div class="card-body invoice-padding pt-0 ">
                        <div class="row">
                            <div class="col-12">
                                <span class="fw-bold">Note:</span>
                                <span>{{ $purchase_order["cities"]->notes }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- Invoice Note ends -->
                </div>
            </div>
            <!-- /Invoice -->

        </div>
    </section>

@endsection
@section('vendor-script')
    <script src="{{ asset('vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection
@section('page-script')
    <script src="{{ asset('js/scripts/pages/app-invoice.js') }}"></script>
@endsection
