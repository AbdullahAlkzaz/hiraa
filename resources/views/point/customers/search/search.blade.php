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
                <form action="{{ route('companies.index') }}" method="GET">
                    <div class="row">
                        <div class="col-4 col-sm-6 col-lg-3">
                            <label for="company_name">{{ __('Company name') }}</label>
                            <fieldset class="form-group">
                                <input name="company_name" class="form-control" id="company_name" placeholder="{{ __('Company name') }}" >
                            </fieldset>
                        </div>
                        <div class="col-4 col-sm-6 col-lg-3">
                            <label class="form-label" for="normalMultiSelect">Multiple Select</label>
                            <select class="form-select select2" name="labels[]" id="multiple-select-clear-field" data-placeholder="Choose anything" multiple>
                                @foreach($labels as $label)
                                <option value="{{$label['id']}}">{{ $label['label'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        
               
                    
                        <div class="col-4 pt-2 ">
                            <button type="submit" class="btn btn-info"><i data-feather='search'></i>{{ __('Find') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
