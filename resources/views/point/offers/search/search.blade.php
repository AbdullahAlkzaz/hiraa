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
                <form action="{{ route('offers.index') }}" method="GET">
                    <div class="row">
                    
                        {{-- <div class="col-12 col-sm-6 col-lg-3">
                            <label for="offers-list-seller_id">{{ __('offers_seller_id') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="seller_id" type="text"
                                    value="@if (isset($_GET['seller_id'])) {{ $_GET['seller_id'] }} @endif"
                                    placeholder="{{ __('offers_seller_id') }}" />
                            </fieldset>
                        </div> --}}
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="offers-list-offer_title">{{ __('offers_offer_title') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="offer_title"
                                    value="@if (isset($_GET['offer_title'])) {{ $_GET['offer_title'] }} @endif"
                                    type="text" placeholder="{{ __('offers_offer_title') }}" />
                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="offers-list-product_number">{{ __('Product Number') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="product_number"
                                    value="@if (isset($_GET['product_number'])) {{ $_GET['product_number'] }} @endif"
                                    type="text" placeholder="{{ __('Product Number') }}" />
                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="offers-list-offer_expiry_date">{{ __('offers_offer_expiry_date') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="offer_expiry_date" type="date"
                                    value="@if (isset($_GET['offer_expiry_date'])) {{ $_GET['offer_expiry_date'] }} @endif" />
                            </fieldset>
                        </div>
                  
             
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="offers-list-offer_type_id">{{ __('offers_offer_type_id') }}</label>
                            <fieldset class="form-group">
                                <select name="offer_type_id" class="form-control" id="offers-list-offer_type_id">
                                    <option value="all">{{ __('All') }}</option>
                                    @foreach ($offer_types as $offer_type)
                                        <option <?php echo isset($_GET['offer_type_id']) && $_GET['offer_type_id'] == $offer_type->id ? 'selected="selected"' : ''; ?> value="{{ $offer_type->id }}">
                                            {{ $offer_type->name }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="offers-list-is_active">{{ __('offers_is_active') }}</label>
                            <fieldset class="form-group">
                                <select name="is_active" class="form-control" id="offers-list-is_active">
                                    <option value="all" @if (isset($_GET['is_active']) && $_GET['is_active'] == 'all') selected @endif>
                                        {{ __('All') }}</option>
                                    <option value="1" @if (isset($_GET['is_active']) && $_GET['is_active'] == '1') selected @endif>
                                        {{ __('YES') }}</option>
                                    <option value="0" @if (isset($_GET['is_active']) && $_GET['is_active'] == '0') selected @endif>
                                        {{ __('NO') }}</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="offers-list-created_at">{{ __('offers_created_at') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="created_at" type="date"
                                    value="@if (isset($_GET['created_at'])) {{ $_GET['created_at'] }} @endif" />
                            </fieldset>
                        </div>
                   
                        <div class="col-12 ">
                            <button type="submit" class="btn btn-info"><i data-feather='search'></i>{{ __('Find') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
