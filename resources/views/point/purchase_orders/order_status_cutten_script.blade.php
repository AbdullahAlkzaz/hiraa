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
                            <input type="text" class="form-control" id="invoice-from" value="info@qetaa.com"
                                placeholder="info@qetaa.com" />
                        </div>
                        <div class="mb-1">
                            <label for="invoice-to" class="form-label">To</label>
                            <input type="text" class="form-control" id="invoice-to" value="{{ $subscriber['subscriber_email'] }}"
                                placeholder="{{ $subscriber['subscriber_email'] }}" />
                        </div>
                        <div class="mb-1">
                            <label for="invoice-subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="invoice-subject"
                                value="Purchase order invoice" placeholder="Invoice regarding goods" />
                        </div>
                        <div class="mb-1">
                            <label for="invoice-message" class="form-label">Message</label>
                            <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="11"
 
                        
                                placeholder="Message...">
Dear {{ $subscriber['subscriber_name'] }},
Thank you for your business, always a pleasure to work with you!
We have generated a new invoice in the amount of {{ $purchase_order->total_price }}
We would appreciate payment of this invoice by {{ $purchase_order->created_at }}</textarea
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
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Payment Sidebar -->
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
                                action="/orders/{{ $purchase_order->id }}" enctype="multipart/form-data" novalidate>
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
                                                        <input readonly data-toggle="popover"
                                                            value="{{ $purchase_order->subscriber_name }}" data-placement="left"
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
                                                            @foreach ($purchase_order_statuses as $purchase_order_status)
                                                                <option <?php echo $purchase_order->order_status_id == $purchase_order_status->id ? 'selected="selected"' : ''; ?>
                                                                    value="{{ $purchase_order_status->id }}">
                                                                    {{ $purchase_order_status->name }}</option>
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
                                                        <input data-toggle="popover" value="{{ $purchase_order->company_id }}"
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
                                                            value="{{ $purchase_order->company_distance }}" data-placement="left"
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
                                                                <option <?php echo $purchase_order->distance_unit_id == $distance_unit->id ? 'selected="selected"' : ''; ?>
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
                                                                <option <?php echo $purchase_order->payment_type_id == $payment_type->id ? 'selected="selected"' : ''; ?>
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
                                                                <option <?php echo $purchase_order->payment_method_id == $payment_method->id ? 'selected="selected"' : ''; ?>
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
                                                            @foreach ($purchase_order_items_availabilities as $purchase_order_items_availability)
                                                                <option <?php echo $purchase_order->order_items_availability_id == $purchase_order_items_availability->id ? 'selected="selected"' : ''; ?>
                                                                    value="{{ $purchase_order_items_availability->id }}">
                                                                    {{ $purchase_order_items_availability->name }}</option>
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
                                                                <option <?php echo $purchase_order->shipping_type_id == $shipping_type->id ? 'selected="selected"' : ''; ?>
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
                                                            value="{{ $purchase_order->shipping_method_id }}"
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
                                                        <input data-toggle="popover" value="{{ $purchase_order->shipping_price }}"
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
                                                        <input data-toggle="popover" value="{{ $purchase_order->tax }}"
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
                                                            value="{{ $purchase_order->default_sales_tax }}"
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
                                                        <input data-toggle="popover" value="{{ $purchase_order->price }}"
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
                                                        <input data-toggle="popover" value="{{ $purchase_order->total_price }}"
                                                            data-placement="left"
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
                                                            placeholder="@lang('orders_notes')">{{ $purchase_order->notes }}</textarea>
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
                                                            value="{{ $purchase_order->order_longitude }}" data-placement="left"
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
                                                            value="{{ $purchase_order->order_latitude }}" data-placement="left"
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
                                        @foreach ($purchase_order->purchase_order_items as $key => $purchase_order_item)
                                            <tr>
                                                <td>{{ $purchase_order_item->firstItem + $key + 1 }}</td>
                                                <td>{{ $purchase_order_item->id }}</td>
                                                <td>{{ $purchase_order_item->branch_id }}</td>
                                                <td>{{ $purchase_order_item->product_id }}</td>
                                                <td>{{ $purchase_order_item->order_max_quantity }}</td>
                                                <td>{{ $purchase_order_item->order_min_quantity }}</td>
                                                <td>{{ $purchase_order_item->price }}</td>
                                                <td>{{ $purchase_order_item->quantity }}</td>
                                                <td>{{ $purchase_order_item->total_price }}</td>
                                                <td>{{ $purchase_order_item->order_items_availability ? $purchase_order_item->order_items_availability->en_name : '-' }}
                                                </td>
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
 
@endsection
 
@section('page-script')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgBcmRxPDyddm0cL8jqRm9ZMGKRtFpw78&callback=initialize">
    </script>
    <script>
        var map = new google.maps.Map(document.getElementById('map_canvas'), {
            zoom: 15,
            center: new google.maps.LatLng({{ $purchase_order->order_latitude }}, {{ $purchase_order->order_longitude }}),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var myMarker = new google.maps.Marker({
            position: new google.maps.LatLng({{ $purchase_order->order_latitude }}, {{ $purchase_order->order_longitude }}),
            draggable: true,
            title: 'Click to zoom'
        });
        google.maps.event.addListener(myMarker, 'dragend', function(evt) {
            document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat()
                .toFixed(8) + ' Current Lng: ' + evt.latLng.lng().toFixed(8) + '</p>';
            document.getElementById('order_latitude').value = evt.latLng.lat().toFixed(8);
            document.getElementById('order_longitude').value = evt.latLng.lng().toFixed(8);
            // document.getElementById('Lng').value  =
        });
        google.maps.event.addListener(myMarker, 'dragstart', function(evt) {
            document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
        });
        map.setCenter(myMarker.position);
        myMarker.setMap(map);
    </script>
@endsection
