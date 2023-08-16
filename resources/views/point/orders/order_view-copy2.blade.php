@extends('layouts/contentLayoutMaster')

@section('title', 'Order Preview')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
@endsection
@section('page-style')
<link rel="stylesheet" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" href="{{asset('css/base/pages/app-invoice.css')}}">
@endsection

@section('content')
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
                <svg
                  viewBox="0 0 139 95"
                  version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                  height="24"
                >
                  <defs>
                    <linearGradient id="invoice-linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                      <stop stop-color="#000000" offset="0%"></stop>
                      <stop stop-color="#FFFFFF" offset="100%"></stop>
                    </linearGradient>
                    <linearGradient
                      id="invoice-linearGradient-2"
                      x1="64.0437835%"
                      y1="46.3276743%"
                      x2="37.373316%"
                      y2="100%"
                    >
                      <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                      <stop stop-color="#FFFFFF" offset="100%"></stop>
                    </linearGradient>
                  </defs>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-400.000000, -178.000000)">
                      <g transform="translate(400.000000, 178.000000)">
                        <path
                          class="text-primary"
                          d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                          style="fill: currentColor"
                        ></path>
                        <path
                          d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                          fill="url(#invoice-linearGradient-1)"
                          opacity="0.2"
                        ></path>
                        <polygon
                          fill="#000000"
                          opacity="0.049999997"
                          points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"
                        ></polygon>
                        <polygon
                          fill="#000000"
                          opacity="0.099999994"
                          points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"
                        ></polygon>
                        <polygon
                          fill="url(#invoice-linearGradient-2)"
                          opacity="0.099999994"
                          points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"
                        ></polygon>
                      </g>
                    </g>
                  </g>
                </svg>
                <h3 class="text-primary invoice-logo">Vuexy</h3>
              </div>
              <p class="card-text mb-25">Office 149, 450 South Brand Brooklyn</p>
              <p class="card-text mb-25">San Diego County, CA 91905, USA</p>
              <p class="card-text mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
            </div>
            <div class="mt-md-0 mt-2">
              <h4 class="invoice-title">
                Order NO.
                <span class="invoice-number">#{{ $order->id }}</span>
              </h4>
              <div class="invoice-date-wrapper">
                <p class="invoice-date-title">Date Issued:</p>
                <p class="invoice-date">25/08/2020</p>
              </div>
              <div class="invoice-date-wrapper">
                <p class="invoice-date-title">Due Date:</p>
                <p class="invoice-date">29/08/2020</p>
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
              <h6 class="mb-2">Invoice To:</h6>
              <h6 class="mb-25">Thomas shelby</h6>
              <p class="card-text mb-25">Shelby Company Limited</p>
              <p class="card-text mb-25">Small Heath, B10 0HF, UK</p>
              <p class="card-text mb-25">718-986-6062</p>
              <p class="card-text mb-0">peakyFBlinders@gmail.com</p>
            </div>
            <div class="col-xl-4 p-0 mt-xl-0 mt-2">
              <h6 class="mb-2">Payment Details:</h6>
              <table>
                <tbody>
                  <tr>
                    <td class="pe-1">Total Due:</td>
                    <td><span class="fw-bold">$12,110.55</span></td>
                  </tr>
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
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- Address and Contact ends -->

        <!-- Invoice Description starts -->
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th class="py-1">Product</th>
                <th class="py-1">Unit Price</th>
                <th class="py-1">Qty</th>
                <th class="py-1">Total</th>
              </tr>
            </thead>
            <tbody>

                                    <?php 

$subtotal = 0;
?>
      
                                    @foreach ($order->order_items as $key => $order_item)
                                    <?php
                                    $subtotal = $order_item->total_price;
                                    ?>
                                         <tr>

                                            <td class="py-1">
                                                <p class="card-text fw-bold mb-25">{{ $order_item->product_id }}</p>
                                                <p class="card-text text-nowrap">
                                                    {{ $order_item->branch_id }}
                                                    ({{ ($order_item->order_items_availability) ? $order_item->order_items_availability->en_name : '-' }})
                                                </p>
                                              </td>

 
                                              <td class="py-1">
                                                <span class="fw-bold">{{ $order_item->price }}</span>
                                              </td>
                                              <td class="py-1">
                                                <span class="fw-bold">{{ $order_item->quantity }}</span>
                                              </td>
                                              <td class="py-1">
                                                <span class="fw-bold">{{ $order_item->total_price }}</span>
                                              </td>

                                      
                                        
                                        </tr>
                                    @endforeach
                            



             
        
            </tbody>
          </table>
        </div>

        <div class="card-body invoice-padding pb-0">
          <div class="row invoice-sales-total-wrapper">
            <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
              <p class="card-text mb-0">
                <span class="fw-bold">User:</span> <span class="ms-75">{{ Auth::user()->name }}</span>
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
                  <p class="invoice-total-amount">{{ $order->shipping_price }}</p>
                </div>
                <div class="invoice-total-item">
                  <p class="invoice-total-title">Tax:</p>
                  <p class="invoice-total-amount">{{ $order->tax }}</p>
                </div>
                <hr class="my-50" />
                <div class="invoice-total-item">
                  <p class="invoice-total-title">Total:</p>
                  <p class="invoice-total-amount">{{ $order->total_price }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Invoice Description ends -->

        <hr class="invoice-spacing" />

        <!-- Invoice Note starts -->
        <div class="card-body invoice-padding pt-0 d-none">
          <div class="row">
            <div class="col-12">
              <span class="fw-bold">Note:</span>
              <span
                >It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance
                projects. Thank You!</span
              >
            </div>
          </div>
        </div>
        <!-- Invoice Note ends -->
      </div>
    </div>
    <!-- /Invoice -->

    <!-- Invoice Actions -->
    <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
      <div class="card">
        <div class="card-body">
          <button class="btn btn-primary w-100 mb-75" data-bs-toggle="modal" data-bs-target="#send-invoice-sidebar">
            Send Invoice
          </button>
          <button class="btn btn-outline-secondary w-100 btn-download-invoice mb-75">Download</button>
          <a class="btn btn-outline-secondary w-100 mb-75" href="{{url('app/invoice/print')}}" target="_blank"> Print </a>
          <a class="btn btn-outline-secondary w-100 mb-75" href="{{url('app/invoice/edit')}}"> Edit </a>
          <button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#add-payment-sidebar">
            Add Payment
          </button>
        </div>
      </div>
    </div>
    <!-- /Invoice Actions -->
  </div>
</section>

<!-- Send Invoice Sidebar -->
<div class="modal modal-slide-in fade" id="send-invoice-sidebar" aria-hidden="true">
  <div class="modal-dialog sidebar-lg">
    <div class="modal-content p-0">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
      <div class="modal-header mb-1">
        <h5 class="modal-title">
          <span class="align-middle">Send Invoice</span>
        </h5>
      </div>
      <div class="modal-body flex-grow-1">
        <form>
          <div class="mb-1">
            <label for="invoice-from" class="form-label">From</label>
            <input
              type="text"
              class="form-control"
              id="invoice-from"
              value="shelbyComapny@email.com"
              placeholder="company@email.com"
            />
          </div>
          <div class="mb-1">
            <label for="invoice-to" class="form-label">To</label>
            <input
              type="text"
              class="form-control"
              id="invoice-to"
              value="qConsolidated@email.com"
              placeholder="company@email.com"
            />
          </div>
          <div class="mb-1">
            <label for="invoice-subject" class="form-label">Subject</label>
            <input
              type="text"
              class="form-control"
              id="invoice-subject"
              value="Invoice of purchased Admin Templates"
              placeholder="Invoice regarding goods"
            />
          </div>
          <div class="mb-1">
            <label for="invoice-message" class="form-label">Message</label>
            <textarea
              class="form-control"
              name="invoice-message"
              id="invoice-message"
              cols="3"
              rows="11"
              placeholder="Message..."
            >
Dear Queen Consolidated,

Thank you for your business, always a pleasure to work with you!

We have generated a new invoice in the amount of $95.59

We would appreciate payment of this invoice by 05/11/2019</textarea
            >
          </div>
          <div class="mb-1">
            <span class="badge badge-light-primary">
              <i data-feather="link" class="me-25"></i>
              <span class="align-middle">Invoice Attached</span>
            </span>
          </div>
          <div class="mb-1 d-flex flex-wrap mt-2">
            <button type="button" class="btn btn-primary me-1" data-bs-dismiss="modal">Send</button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /Send Invoice Sidebar -->

<!-- Add Payment Sidebar -->
<div class="modal modal-slide-in fade" id="add-payment-sidebar" aria-hidden="true">
  <div class="modal-dialog sidebar-lg">
    <div class="modal-content p-0">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
      <div class="modal-header mb-1">
        <h5 class="modal-title">
          <span class="align-middle">Add Payment</span>
        </h5>
      </div>
      <div class="modal-body flex-grow-1">
        <form>
          <div class="mb-1">
            <input id="balance" class="form-control" type="text" value="Invoice Balance: 5000.00" disabled />
          </div>
          <div class="mb-1">
            <label class="form-label" for="amount">Payment Amount</label>
            <input id="amount" class="form-control" type="number" placeholder="$1000" />
          </div>
          <div class="mb-1">
            <label class="form-label" for="payment-date">Payment Date</label>
            <input id="payment-date" class="form-control date-picker" type="text" />
          </div>
          <div class="mb-1">
            <label class="form-label" for="payment-method">Payment Method</label>
            <select class="form-select" id="payment-method">
              <option value="" selected disabled>Select payment method</option>
              <option value="Cash">Cash</option>
              <option value="Bank Transfer">Bank Transfer</option>
              <option value="Debit">Debit</option>
              <option value="Credit">Credit</option>
              <option value="Paypal">Paypal</option>
            </select>
          </div>
          <div class="mb-1">
            <label class="form-label" for="payment-note">Internal Payment Note</label>
            <textarea class="form-control" id="payment-note" rows="5" placeholder="Internal Payment Note"></textarea>
          </div>
          <div class="d-flex flex-wrap mb-0">
            <button type="button" class="btn btn-primary me-1" data-bs-dismiss="modal">Send</button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /Add Payment Sidebar -->
@endsection

@section('vendor-script')
<script src="{{asset('vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
<script src="{{asset('vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>
@endsection

@section('content')


<style>
    #map_canvas {
      width: 100%;
      height: 500px;
  }
  #current {
      padding-top: 25px;
  }
    </style>


    <section class="simple-validation">
        <div class="row">
            
               
                <div class="col-md-8 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
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
                                <form class="form-horizontal" role="form" method="POST"
                                    action="/orders/{{ $order->id }}" enctype="multipart/form-data" novalidate>
                                    {!! csrf_field() !!}
                                    {{ method_field('PUT') }}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('orders_subscriber_id') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <input readonly data-toggle="popover" value="{{ $order->subscriber_name }}"
                                                                data-placement="left"
                                                                data-content="{{ __('orders_subscriber_id_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('orders_subscriber_id_data-original-title') }}"
                                                                type="text"
                                                                class="form-control {{ $errors->has('subscriber_id') ? 'is-invalid' : '' }}"
                                                                name="subscriber_id"
                                                                placeholder="{{ __('orders_subscriber_id') }}">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-file-minus"></i>
                                                            </div>
                                                            @if ($errors->has('subscriber_id'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('subscriber_id') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('orders_order_status_id') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <select data-toggle="popover" data-placement="left"
                                                                data-content="{{ __('orders_order_status_id_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('orders_order_status_id_data-original-title') }}"
                                                                class="form-control  {{ $errors->has('order_status_id') ? 'is-invalid' : '' }} "
                                                                name="order_status_id">
                                                                @foreach ($order_statuses as $order_status)
                                                                    <option <?php echo $order->order_status_id == $order_status->id ? 'selected="selected"' : ''; ?>
                                                                        value="{{ $order_status->id }}">
                                                                        {{ $order_status->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="form-control-position">
                                                                <i class="feather icon-file-minus"></i>
                                                            </div>
                                                            @if ($errors->has('order_status_id'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('order_status_id') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('orders_company_id') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <input data-toggle="popover" value="{{ $order->company_id }}"
                                                                data-placement="left"
                                                                data-content="{{ __('orders_company_id_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('orders_company_id_data-original-title') }}"
                                                                type="number"
                                                                class="form-control {{ $errors->has('company_id') ? 'is-invalid' : '' }}"
                                                                name="company_id"
                                                                placeholder="{{ __('orders_company_id') }}">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-file-minus"></i>
                                                            </div>
                                                            @if ($errors->has('company_id'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('company_id') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('orders_company_distance') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <input data-toggle="popover"
                                                                value="{{ $order->company_distance }}"
                                                                data-placement="left"
                                                                data-content="{{ __('orders_company_distance_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('orders_company_distance_data-original-title') }}"
                                                                type="number"
                                                                class="form-control {{ $errors->has('company_distance') ? 'is-invalid' : '' }}"
                                                                name="company_distance"
                                                                placeholder="{{ __('orders_company_distance') }}">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-file-minus"></i>
                                                            </div>
                                                            @if ($errors->has('company_distance'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('company_distance') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('orders_distance_unit_id') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <select data-toggle="popover" data-placement="left"
                                                                data-content="{{ __('orders_distance_unit_id_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('orders_distance_unit_id_data-original-title') }}"
                                                                class="form-control  {{ $errors->has('distance_unit_id') ? 'is-invalid' : '' }} "
                                                                name="distance_unit_id">
                                                                @foreach ($distance_units as $distance_unit)
                                                                    <option <?php echo $order->distance_unit_id == $distance_unit->id ? 'selected="selected"' : ''; ?>
                                                                        value="{{ $distance_unit->id }}">
                                                                        {{ $distance_unit->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="form-control-position">
                                                                <i class="feather icon-file-minus"></i>
                                                            </div>
                                                            @if ($errors->has('distance_unit_id'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('distance_unit_id') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('orders_payment_type_id') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <select data-toggle="popover" data-placement="left"
                                                                data-content="{{ __('orders_payment_type_id_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('orders_payment_type_id_data-original-title') }}"
                                                                class="form-control  {{ $errors->has('payment_type_id') ? 'is-invalid' : '' }} "
                                                                name="payment_type_id">
                                                                @foreach ($payment_types as $payment_type)
                                                                    <option <?php echo $order->payment_type_id == $payment_type->id ? 'selected="selected"' : ''; ?>
                                                                        value="{{ $payment_type->id }}">
                                                                        {{ $payment_type->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="form-control-position">
                                                                <i class="feather icon-file-minus"></i>
                                                            </div>
                                                            @if ($errors->has('payment_type_id'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('payment_type_id') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('orders_payment_method_id') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <select data-toggle="popover" data-placement="left"
                                                                data-content="{{ __('orders_payment_method_id_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('orders_payment_method_id_data-original-title') }}"
                                                                class="form-control  {{ $errors->has('payment_method_id') ? 'is-invalid' : '' }} "
                                                                name="payment_method_id">
                                                                @foreach ($payment_methods as $payment_method)
                                                                    <option <?php echo $order->payment_method_id == $payment_method->id ? 'selected="selected"' : ''; ?>
                                                                        value="{{ $payment_method->id }}">
                                                                        {{ $payment_method->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="form-control-position">
                                                                <i class="feather icon-file-minus"></i>
                                                            </div>
                                                            @if ($errors->has('payment_method_id'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('payment_method_id') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('orders_order_items_availability_id') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <select data-toggle="popover" data-placement="left"
                                                                data-content="{{ __('orders_order_items_availability_id_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('orders_order_items_availability_id_data-original-title') }}"
                                                                class="form-control  {{ $errors->has('order_items_availability_id') ? 'is-invalid' : '' }} "
                                                                name="order_items_availability_id">
                                                                @foreach ($order_items_availabilities as $order_items_availability)
                                                                    <option <?php echo $order->order_items_availability_id == $order_items_availability->id ? 'selected="selected"' : ''; ?>
                                                                        value="{{ $order_items_availability->id }}">
                                                                        {{ $order_items_availability->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="form-control-position">
                                                                <i class="feather icon-file-minus"></i>
                                                            </div>
                                                            @if ($errors->has('order_items_availability_id'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('order_items_availability_id') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('orders_shipping_type_id') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <select data-toggle="popover" data-placement="left"
                                                                data-content="{{ __('orders_shipping_type_id_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('orders_shipping_type_id_data-original-title') }}"
                                                                class="form-control  {{ $errors->has('shipping_type_id') ? 'is-invalid' : '' }} "
                                                                name="shipping_type_id">
                                                                @foreach ($shipping_types as $shipping_type)
                                                                    <option <?php echo $order->shipping_type_id == $shipping_type->id ? 'selected="selected"' : ''; ?>
                                                                        value="{{ $shipping_type->id }}">
                                                                        {{ $shipping_type->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="form-control-position">
                                                                <i class="feather icon-file-minus"></i>
                                                            </div>
                                                            @if ($errors->has('shipping_type_id'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('shipping_type_id') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('orders_shipping_method_id') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <input data-toggle="popover"
                                                                value="{{ $order->shipping_method_id }}"
                                                                data-placement="left"
                                                                data-content="{{ __('orders_shipping_method_id_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('orders_shipping_method_id_data-original-title') }}"
                                                                type="number"
                                                                class="form-control {{ $errors->has('shipping_method_id') ? 'is-invalid' : '' }}"
                                                                name="shipping_method_id"
                                                                placeholder="{{ __('orders_shipping_method_id') }}">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-file-minus"></i>
                                                            </div>
                                                            @if ($errors->has('shipping_method_id'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('shipping_method_id') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('orders_shipping_price') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <input data-toggle="popover"
                                                                value="{{ $order->shipping_price }}"
                                                                data-placement="left"
                                                                data-content="{{ __('orders_shipping_price_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('orders_shipping_price_data-original-title') }}"
                                                                type="number"
                                                                class="form-control {{ $errors->has('shipping_price') ? 'is-invalid' : '' }}"
                                                                name="shipping_price"
                                                                placeholder="{{ __('orders_shipping_price') }}">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-file-minus"></i>
                                                            </div>
                                                            @if ($errors->has('shipping_price'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('shipping_price') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('orders_tax') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <input data-toggle="popover" value="{{ $order->tax }}"
                                                                data-placement="left"
                                                                data-content="{{ __('orders_tax_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('orders_tax_data-original-title') }}"
                                                                type="number"
                                                                class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}"
                                                                name="tax" placeholder="{{ __('orders_tax') }}">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-file-minus"></i>
                                                            </div>
                                                            @if ($errors->has('tax'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('tax') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('orders_default_sales_tax') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <input data-toggle="popover"
                                                                value="{{ $order->default_sales_tax }}"
                                                                data-placement="left"
                                                                data-content="{{ __('orders_default_sales_tax_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('orders_default_sales_tax_data-original-title') }}"
                                                                type="number"
                                                                class="form-control {{ $errors->has('default_sales_tax') ? 'is-invalid' : '' }}"
                                                                name="default_sales_tax"
                                                                placeholder="{{ __('orders_default_sales_tax') }}">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-file-minus"></i>
                                                            </div>
                                                            @if ($errors->has('default_sales_tax'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('default_sales_tax') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('orders_price') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <input data-toggle="popover" value="{{ $order->price }}"
                                                                data-placement="left"
                                                                data-content="{{ __('orders_price_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('orders_price_data-original-title') }}"
                                                                type="number"
                                                                class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                                                name="price" placeholder="{{ __('orders_price') }}">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-file-minus"></i>
                                                            </div>
                                                            @if ($errors->has('price'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('price') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('orders_total_price') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <input data-toggle="popover"
                                                                value="{{ $order->total_price }}" data-placement="left"
                                                                data-content="{{ __('orders_total_price_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('orders_total_price_data-original-title') }}"
                                                                type="number"
                                                                class="form-control {{ $errors->has('total_price') ? 'is-invalid' : '' }}"
                                                                name="total_price"
                                                                placeholder="{{ __('orders_total_price') }}">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-file-minus"></i>
                                                            </div>
                                                            @if ($errors->has('total_price'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('total_price') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>@lang('orders_notes')</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <textarea data-toggle="popover" data-placement="left" data-content="{{ __('orders_notes_data-content') }}"
                                                                data-trigger="hover" data-original-title="{{ __('orders_notes_data-original-title') }}"
                                                                class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes"
                                                                placeholder="@lang('orders_notes')">{{ $order->notes }}</textarea>
                                                            <div class="form-control-position">
                                                                <i class="feather icon-file-text"></i>
                                                            </div>
                                                            @if ($errors->has('notes'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('notes') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('Order Location') }}</span>
                                                    </div>
                                                    <div class="col-md-8">

 

                                                        <div class="position-relative has-icon-left">
                                                            <input data-toggle="popover"
                                                                value="{{ $order->order_longitude }}"
                                                                data-placement="left"
                                                                data-content="{{ __('orders_order_longitude_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('orders_order_longitude_data-original-title') }}"
                                                                type="text" readonly
                                                                class="form-control {{ $errors->has('order_longitude') ? 'is-invalid' : '' }}"
                                                                name="order_longitude" id="order_longitude"
                                                                placeholder="{{ __('orders_order_longitude') }}">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-file-minus"></i>
                                                            </div>
                                                            @if ($errors->has('order_longitude'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('order_longitude') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('orders_order_latitude') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <input data-toggle="popover"
                                                                value="{{ $order->order_latitude }}"
                                                                data-placement="left"
                                                                data-content="{{ __('orders_order_latitude_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('orders_order_latitude_data-original-title') }}"
                                                                type="text" readonly
                                                                class="form-control {{ $errors->has('order_latitude') ? 'is-invalid' : '' }}"
                                                                name="order_latitude" id="order_latitude"
                                                                placeholder="{{ __('orders_order_latitude') }}">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-file-minus"></i>
                                                            </div>
                                                            @if ($errors->has('order_latitude'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('order_latitude') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('Order Location') }}</span>
                                                    </div>
                                                    <div class="col-md-8">


                                                        <section>
                                                            <div id='map_canvas'></div>
                                                            <div id="current">Nothing yet...</div>
                                                        </section>


                                                  
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit"
                                                    class="btn btn-primary mr-1 mb-1 waves-effect waves-light ">{{ __('Submit') }}</button>
                                                <button type="reset"
                                                    class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">{{ __('Reset') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive mt-1">
                          
                            <table class="table table-hover-animation mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('order_items_id') }}</th>
                                        <th>{{ __('order_items_branch_id') }}</th>

                                        <th>{{ __('order_items_product_id') }}</th>
                                        <th>{{ __('order_items_order_max_quantity') }}</th>
                                        <th>{{ __('order_items_order_min_quantity') }}</th>
                                        <th>{{ __('order_items_price') }}</th>

                                        <th>{{ __('order_items_quantity') }}</th>
                                        <th>{{ __('order_items_total_price') }}</th>
                                        <th>{{ __('order_items_order_items_availability_id') }}</th>
                               
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->order_items as $key => $order_item)
                                        <tr>
                                            <td>{{ $order_item->firstItem + $key + 1 }}</td>
                                            <td>{{ $order_item->id }}</td>
                                            <td>{{ $order_item->branch_id }}</td>

                                            <td>{{ $order_item->product_id }}</td>
                                            <td>{{ $order_item->order_max_quantity }}</td>
                                            <td>{{ $order_item->order_min_quantity }}</td>
                                            <td>{{ $order_item->price }}</td>

                                            <td>{{ $order_item->quantity }}</td>
                                            <td>{{ $order_item->total_price }}</td>
                                            <td>{{ ($order_item->order_items_availability) ? $order_item->order_items_availability->en_name : '-' }}</td>
                                       
                                        </tr>
                                    @endforeach
                                </tbody>
                            
                            </table>


                        </div>
                    </div>
                    </div>
                    </div>
                </div>
        </div>
    </section>
    <!--ul class="pager">
                     @if ($previous)
    <li class="previous">
                <a href="/orders/{{ $previous }}"><i class="ace-icon fa fa-angle-double-right"></i> @lang('messages.previous')   </a>
               </li>
    @endif
                    @if ($next)
    <li class="next">
                <a href="/orders/{{ $next }}"> @lang('messages.next')   <i class="ace-icon fa fa-angle-double-left"></i> </a>
               </li>
    @endif
     </ul-->
@stop
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#select_all').on('click', function() {
                if (this.checked) {
                    $('.checkbox').each(function() {
                        this.checked = true;
                    });
                } else {
                    $('.checkbox').each(function() {
                        this.checked = false;
                    });
                }
            });
            $('.checkbox').on('click', function() {
                if ($('.checkbox:checked').length == $('.checkbox').length) {
                    $('#select_all').prop('checked', true);
                } else {
                    $('#select_all').prop('checked', false);
                }
            });
        });
    </script>
    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="/app-assets/js/scripts/forms/number-input.js"></script>
    <!-- END: Page JS-->
    <!-- BEGIN: Page JS-->
    <script src="/app-assets/js/scripts/popover/popover.js"></script>
    <!-- END: Page JS-->
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



@section('page-script')  

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgBcmRxPDyddm0cL8jqRm9ZMGKRtFpw78&callback=initialize"></script>

<script>

var map = new google.maps.Map(document.getElementById('map_canvas'), {
zoom: 15,
center: new google.maps.LatLng({{ $order->order_latitude }},{{ $order->order_longitude }}),
mapTypeId: google.maps.MapTypeId.ROADMAP
});

var myMarker = new google.maps.Marker({
position: new google.maps.LatLng({{ $order->order_latitude }}, {{ $order->order_longitude }}),
draggable: true ,
title:'Click to zoom'
});

google.maps.event.addListener(myMarker, 'dragend', function (evt) {
document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(8) + ' Current Lng: ' + evt.latLng.lng().toFixed(8) + '</p>';
document.getElementById('order_latitude').value  = evt.latLng.lat().toFixed(8) ;
document.getElementById('order_longitude').value  = evt.latLng.lng().toFixed(8) ;
// document.getElementById('Lng').value  =
});

google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
});


map.setCenter(myMarker.position);
myMarker.setMap(map);
</script>



@endsection
