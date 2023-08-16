<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ __('فلتر') }}</h4>
    </div>
    @php $currenturl = url()->current(); @endphp
    
    <div class="card-content collapse show">
        <div class="card-body">
            <div class="users-list-filter">
                <form action="{{ $currenturl }}" method="GET">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="users-list-name">{{ __('المحافظة') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="government"
                                    value="{{ (isset($_GET['government'])) ? $_GET['government'] : "" }}" type="text"
                                    placeholder="{{ __('المحافظة') }}" />

                            </fieldset>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="users-list-email">{{ __('المنطقة') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="area"
                                    value="{{ (isset($_GET['area'])) ? $_GET['area'] : "" }}" type="text"
                                    placeholder="{{ __('المنطقة') }}" />

                            </fieldset>
                        </div>
                        <div class="col-12 ">
                            <br>
                            <button type="submit" class="btn btn-info">{{ __('Find') }}</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
