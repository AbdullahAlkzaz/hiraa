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
                   
                        {{-- <div class="col-12 col-sm-6 col-lg-3">
                            <label for="wallets-list-user_id">{{ __('wallets_user_id') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="user_id" type="number"
                                    value="@if (isset($_GET['user_id'])) {{ $_GET['user_id'] }} @endif"
                                    placeholder="{{ __('wallets_user_id') }}" />
                            </fieldset>
                        </div> --}}
                  
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="wallets-list-current_balance">{{ __('wallets_current_balance') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="current_balance" type="number"
                                    value="@if (isset($_GET['current_balance'])) {{ $_GET['current_balance'] }} @endif"
                                    placeholder="{{ __('wallets_current_balance') }}" />
                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="wallets-list-pending_balance">{{ __('wallets_pending_balance') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="pending_balance" type="number"
                                    value="@if (isset($_GET['pending_balance'])) {{ $_GET['pending_balance'] }} @endif"
                                    placeholder="{{ __('wallets_pending_balance') }}" />
                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label
                                for="wallets-list-transferable_balance">{{ __('wallets_transferable_balance') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="transferable_balance" type="number"
                                    value="@if (isset($_GET['transferable_balance'])) {{ $_GET['transferable_balance'] }} @endif"
                                    placeholder="{{ __('wallets_transferable_balance') }}" />
                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="wallets-list-created_at">{{ __('wallets_created_at') }}</label>
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
