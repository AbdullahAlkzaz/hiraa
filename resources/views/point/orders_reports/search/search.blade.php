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
    @php $currenturl = url()->current(); @endphp
    <div class="card-content collapse show">
        <div class="card-body">
            <div class="users-list-filter">
                <form action="{{ $currenturl }}" method="GET">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="orders-list-created_at">{{ __('Orders Date From') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="date_from" type="date"
                                    value="@if (isset($_GET['date_from'])) {{ $_GET['date_from'] }} @endif" />
                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="orders-list-created_at">{{ __('Orders Date To') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="date_to" type="date"
                                    value="@if (isset($_GET['date_to'])) {{ $_GET['date_to'] }} @endif" />
                            </fieldset>
                        </div>
                        <div class="col-12 pt-1" >
                            <button type="submit" class="btn btn-info"><i
                                    data-feather='search'></i>{{ __('Find') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
