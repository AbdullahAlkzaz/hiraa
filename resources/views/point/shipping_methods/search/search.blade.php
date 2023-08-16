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
                <form action="{{ route('shipping_methods.index') }}" method="GET">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="shipping_methods-list-name">{{ __('shipping_methods_name') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="name"
                                    value="@if (isset($_GET['name'])) {{ $_GET['name'] }} @endif" type="text"
                                    placeholder="{{ __('shipping_methods_name') }}" />
                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="shipping_methods-list-en_name">{{ __('shipping_methods_en_name') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="en_name"
                                    value="@if (isset($_GET['en_name'])) {{ $_GET['en_name'] }} @endif"
                                    type="text" placeholder="{{ __('shipping_methods_en_name') }}" />
                            </fieldset>
                        </div>
                 
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="shipping_methods-list-is_active">{{ __('shipping_methods_is_active') }}</label>
                            <fieldset class="form-group">
                                <select name="is_active" class="form-control" id="shipping_methods-list-is_active">
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
                            <label
                                for="shipping_methods-list-created_at">{{ __('shipping_methods_created_at') }}</label>
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
