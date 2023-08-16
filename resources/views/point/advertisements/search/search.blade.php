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
                <form action="{{ route('ads.index') }}" method="GET">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="advertisements-list-position">{{ __('advertisements_position') }}</label>
                            <fieldset class="form-group">
                                <select name="position" class="form-control" id="advertisements-list-position">
                                    <option value="all" @if (isset($_GET['position']) && $_GET['position'] == 'all') selected @endif>
                                        {{ __('All') }}</option>
                                    <option value="top" @if (isset($_GET['position']) && $_GET['position'] == 'top') selected @endif>
                                        {{ __('top') }}</option>
                                    <option value="medium" @if (isset($_GET['position']) && $_GET['position'] == 'medium') selected @endif>
                                        {{ __('medium') }}</option>
                                    <option value="bottom" @if (isset($_GET['position']) && $_GET['position'] == 'bottom') selected @endif>
                                        {{ __('bottom') }}</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="advertisements-list-is_active">{{ __('advertisements_is_active') }}</label>
                            <fieldset class="form-group">
                                <select name="is_active" class="form-control" id="advertisements-list-is_active">
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
                            <label for="advertisements-list-created_at">{{ __('advertisements_created_at') }}</label>
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
