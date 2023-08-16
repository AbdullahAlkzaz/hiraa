<div class="card-content collapse show">
    <div class="card-body">
        <div class="users-list-filter">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-4 col-sm-6 col-lg-3">
                        <label class="form-label" for="normalMultiSelect">Filter Data</label>
                        <select class="form-select select2" name="group"
                            data-placeholder="Choose anything">
                            <option value="byOrder" {{ request()->group == 'byOrder' ? 'selected' : '' }}>
                                By Orders</option>
                            <option value="byItem" {{ request()->group == 'byItem' ? 'selected' : '' }}> By
                                Items </option>
                        </select>
                    </div>

                    <div class="col-4 pt-2 ">
                        <button type="submit" class="btn btn-info"><i
                                data-feather='search'></i>{{ __('Show') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>