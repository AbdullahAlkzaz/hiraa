<div class="card">
    <div class="card-header">
    </div>
    @php
        $currenturl = url()->current();
        $selectedOption = "";
 @endphp
    <div class="card-content collapse show">
        <div class="card-body">
            <div class="users-list-filter">
                <form action="{{ $currenturl }}" method="GET">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <form id="seller-form">
                                @csrf
                                <label for="city_id">select city:  </label>
                                <select class="form-control" required
                                        name="city_id" id="city_id"
                                        aria-label=".form-select-lg">
                                    @foreach($cities as $city)

                                        <option value="{{$city['id']}}"
                                            {{ ($city['id'] == $selectedOption) ? 'selected' : '' }}
                                        >{{$city['nameAr'] . " / " .$city['name']}}
                                        </option>

                                    @endforeach
                                </select>
                                <br>
                                <br>
                                <input type="date" name="from" class="form-control">
                                <br>
                                <input type="date" name="to" class="form-control">
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


