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
                <form action="{{ route('statistics.suppliers') }}" method="GET">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="purchase_orders-list-purchase_order_status_id">{{ __('purchase_orders_purchase_order_status_id') }}</label>
                            <fieldset class="form-group">
                                <select name="purchase_order_status_id" class="form-control"
                                        id="purchase_orders-list-purchase_order_status_id">
                                    <option value="all">{{ __('All') }}</option>
                                    @foreach ($purchase_order_statuses as $purchase_order_status)
                                        <option
                                            @if(isset($_GET['purchase_order_status_id']) && $_GET['purchase_order_status_id'] == $purchase_order_status->id){{'selected="selected"'}} @endif
                                            @if($purchase_order_status->id == $order_status){{'selected="selected"'}} @endif
                                                value="{{ $purchase_order_status->id }}"
                                        >
                                            {{ $purchase_order_status->en_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="count">{{ __('count') }}</label>
                            <fieldset class="form-group">
                                <select name="count" class="form-control" id="count">
                                    <option value="10" @if($count == 10) {{'selected="selected'}} @endif>10</option>
                                    <option value="20" @if($count == 20) {{'selected="selected'}} @endif>20</option>
                                    <option value="30" @if($count == 30) {{'selected="selected'}} @endif>30</option>
                                    <option value="40" @if($count == 40) {{'selected="selected'}} @endif>40</option>
                                    <option value="50" @if($count == 50) {{'selected="selected'}} @endif>50</option>
                                    <option value="100" @if($count == 100) {{'selected="selected'}} @endif>100</option>
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="date_from">{{ __('Date From') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="date_from" type="date" value="@if (isset($_GET['date_from'])){{ $_GET['date_from'] }}@endif" />
                            </fieldset>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="date_to">{{ __('Date To') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="date_to" type="date" value="@if (isset($_GET['date_to'])){{$_GET['date_to']}}@endif" />
                            </fieldset>
                        </div>

                        <div class="col-12 ">
                            <button type="submit" class="btn btn-info">{{ __('Find') }}</button>
                        </div>
                    </div>
                </form>

                <form action="{{ route('statistics.suppliersExport') }}" method="post" class="mt-25">
                    @csrf
                    <div class="row">
                        <input class="form-control" id="export_purchase_order_status_id" name="export_purchase_order_status_id" hidden="" type="hidden" value="{{$order_status}}" />
                        <input class="form-control" id="export_count" name="export_count" hidden="" type="hidden" value="{{ $count }}" />
                        <input class="form-control" id="export_date_from" name="export_date_from" hidden="" type="hidden" value="" />
                        <input class="form-control" id="export_date_to" name="export_date_to" hidden="" type="hidden" value="" />

                        <div class="col-12 ">
                            <button type="submit" class="btn btn-info">{{ __('Export') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')

@endpush

