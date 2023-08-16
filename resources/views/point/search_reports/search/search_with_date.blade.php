<div class="card">
    <div class="card-header">
    </div>
    @php $currenturl = url()->current(); @endphp
    <div class="card-content collapse show">
        <div class="card-body">
            <div class="users-list-filter">
                <form action="{{ $currenturl }}" method="GET">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <form id="seller-form">
                                @csrf
                                <label for="seller_id">select company:  </label>
                                <select class="form-control"
                                        name="seller_id" id="seller_id"
                                        aria-label=".form-select-lg">
                                    <option selected value="">Select company</option>
                                    @foreach($suppliers['data'] as $supplier)

                                        <option value="{{$supplier['company_id']}}">{{$supplier['company_name']}}</option>
                                    @endforeach
                                </select>
                                <br>
                                <label for="seller_id">select type:  </label>
                                <select class="form-control" name="type" id="type" aria-label=".form-select-lg">>
                                    <option value="daily">Daily</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="Annual">Annual</option>
                                </select>
                                <br>
                                <label for="last_year">Get Last Year?   </label>

                                <select class="form-control" name="last" id="last_year" aria-label=".form-select-lg">>
                                    <option value="false">No</option>
                                    <option value="true">Yes</option>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
