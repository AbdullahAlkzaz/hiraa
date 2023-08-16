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
                        {{-- <div class="col-12 col-sm-6 col-lg-3">
                            <label
                                for="purchase_orders-list-subscriber_id">{{ __('purchase_orders_subscriber_id') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="subscriber_id" type="text"
                                    value="@if (isset($_GET['subscriber_id'])) {{ $_GET['subscriber_id'] }} @endif"
                                    placeholder="{{ __('purchase_orders_subscriber_id') }}" />
                            </fieldset>
                        </div> --}}
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label
                                for="purchase_orders-list-purchase_order_status_id">{{ __('purchase_orders_purchase_order_status_id') }}</label>
                            <fieldset class="form-group">
                                <select name="purchase_order_status_id" class="form-control"
                                    id="purchase_orders-list-purchase_order_status_id">
                                    <option value="all">{{ __('All') }}</option>
                                    @foreach ($purchase_order_statuses as $purchase_order_status)
                                        <option <?php echo isset($_GET['purchase_order_status_id']) && $_GET['purchase_order_status_id'] == $purchase_order_status->id ? 'selected="selected"' : ''; ?> value="{{ $purchase_order_status->id }}">
                                            {{ $purchase_order_status->en_name }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                        {{-- <div class="col-12 col-sm-6 col-lg-3">
                            <label for="purchase_orders-list-company_id">{{ __('purchase_orders_company_id') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="company_id" type="text"
                                    value="@if (isset($_GET['company_id'])) {{ $_GET['company_id'] }} @endif"
                                    placeholder="{{ __('purchase_orders_company_id') }}" />
                            </fieldset>
                        </div> --}}
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label
                                for="purchase_orders-list-payment_type_id">{{ __('purchase_orders_payment_type_id') }}</label>
                            <fieldset class="form-group">
                                <select name="payment_type_id" class="form-control"
                                    id="purchase_orders-list-payment_type_id">
                                    <option value="all">{{ __('All') }}</option>
                                    @foreach ($payment_types as $payment_type)
                                        <option <?php echo isset($_GET['payment_type_id']) && $_GET['payment_type_id'] == $payment_type->id ? 'selected="selected"' : ''; ?> value="{{ $payment_type->id }}">
                                            {{ $payment_type->en_name }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label
                                for="purchase_orders-list-payment_status_id">{{ __('purchase_orders_payment_status_id') }}</label>
                            <fieldset class="form-group">
                                <select name="payment_status_id" class="form-control"
                                    id="purchase_orders-list-payment_status_id">
                                    <option value="all">{{ __('All') }}</option>
                                    @foreach ($payment_statuses as $payment_status)
                                        <option <?php echo isset($_GET['payment_status_id']) && $_GET['payment_status_id'] == $payment_status->id ? 'selected="selected"' : ''; ?> value="{{ $payment_status->id }}">
                                            {{ $payment_status->en_name }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label
                                for="purchase_orders-list-payment_method_id">{{ __('purchase_orders_payment_method_id') }}</label>
                            <fieldset class="form-group">
                                <select name="payment_method_id" class="form-control"
                                    id="purchase_orders-list-payment_method_id">
                                    <option value="all">{{ __('All') }}</option>
                                    @foreach ($payment_methods as $payment_method)
                                        <option <?php echo isset($_GET['payment_method_id']) && $_GET['payment_method_id'] == $payment_method->id ? 'selected="selected"' : ''; ?> value="{{ $payment_method->id }}">
                                            {{ $payment_method->en_name }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label
                                for="purchase_orders-list-shipping_type_id">{{ __('purchase_orders_shipping_type_id') }}</label>
                            <fieldset class="form-group">
                                <select name="shipping_type_id" class="form-control"
                                    id="purchase_orders-list-shipping_type_id">
                                    <option value="all">{{ __('All') }}</option>
                                    @foreach ($shipping_types as $shipping_type)
                                        <option <?php echo isset($_GET['shipping_type_id']) && $_GET['shipping_type_id'] == $shipping_type->id ? 'selected="selected"' : ''; ?> value="{{ $shipping_type->id }}">
                                            {{ $shipping_type->en_name }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="orders-list-shipping_method_id">{{ __('orders_shipping_method_id') }}</label>
                            <fieldset class="form-group">
                                <select name="shipping_method_id" class="form-control"
                                    id="orders-list-shipping_method_id">
                                    <option value="all" @if(isset($_GET['shipping_method_id']) && $_GET['shipping_method_id'] == 'all' ) selected @endif  >{{ __('All') }}</option>
                                    @foreach ($shipping_methods as $shipping_method)
                                        <option <?php echo isset($_GET['shipping_method_id']) && $_GET['shipping_method_id'] == $shipping_method->id ? 'selected="selected"' : ''; ?> value="{{ $shipping_method->id }}">
                                            {{ $shipping_method->en_name }}</option>
                                    @endforeach
                                    <option <?php echo isset($_GET['shipping_method_id']) && $_GET['shipping_method_id'] > 1 && $_GET['shipping_method_id'] != 'all'  && !in_array($_GET['shipping_method_id'], $shipping_methods_arr) ? 'selected="selected"' : ''; ?> value="other">
                                        Other options</option>
                                </select>
                            </fieldset>
                        </div>


                        <div class="col-12 col-sm-6 col-lg-3">
                            <label
                                for="purchase_orders-list-total_price">{{ __('purchase_orders_total_price') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="total_price" type="number"
                                    value="@if (isset($_GET['total_price'])) {{ $_GET['total_price'] }} @endif"
                                    placeholder="{{ __('purchase_orders_total_price') }}" />
                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label
                                for="purchase_orders-list-created_at">{{ __('purchase_orders_created_at') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="created_at" type="date"
                                    value="@if (isset($_GET['created_at'])) {{ $_GET['created_at'] }} @endif" />
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

<div class="card">
    <div class="card-content collapse show">
        <div class="card-body">
            <div class="col-12 ">
                <form id="runsheet-form" method="post" action="{{ route('run-sheet.generate') }}">
                    @csrf
                    <input type="hidden" id="runsheet-ids" name="runsheet-ids">
                    <button type="submit" id="runsheet-button" class="btn btn-info">{{ __('Create Run Sheet') }}</button>
                </form>
            </div>

        </div>
    </div>
</div>
