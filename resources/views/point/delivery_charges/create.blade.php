@php $titlePage = __('delivery charge') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <form action="{{route('delivery-charge.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                <div class="form-group">
                    <label class="input-label" for="from_city_supplier">{{ __('from city (supplier)') }}</label>
                    <select class="form-control" required
                            name="from_city_supplier" id="from_city_supplier"
                            aria-label=".form-select-lg">
                        <option selected value="">Select supplier city</option>
                        @foreach($cities as $city)

                            <option value="{{$city['id']}}">{{$city['name']}} </option>
                        @endforeach
                    </select>
                </div>
                <br>


                <div class="form-group">
                    <label class="input-label" for="to_city_customer">{{ __('to city ( customer)') }}</label>
                    <select class="form-control" requried
                            name="to_city_customer" id="to_city_customer"
                            aria-label=".form-select-lg">
                        <option selected value="">Select customer city </option>
                        @foreach($cities as $city)

                            <option value="{{$city['id']}}">{{$city['name']}} </option>
                        @endforeach
                    </select>
                </div>
                <br>

                <div class="form-group">
                    <label class="input-label" for="tier">{{ __('tier') }}</label>
                    <input type="text" name="tier" placeholder="tier" class="form-control" required>
                </div>
                <br>

                <div class="form-group">
                    <label class="input-label" for="duration">{{ __('duration') }}</label>
                    <input type="text" name="duration" placeholder="duration" class="form-control" required>
                </div>
                <br>

                <div class="form-group">
                    <label class="input-label" for="cost_before_discount">{{ __('cost_before_discount') }}</label>
                    <input type="text" name="cost_before_discount" placeholder="cost before discount" class="form-control" required>
                </div>
                <br>

                <div class="form-group">
                    <label class="input-label" for="cost">{{ __('cost') }}</label>
                    <input type="text" name="cost" placeholder="cost" class="form-control" required>
                </div>
                <br>


                <div class="form-group">
                    <label class="input-label" for="note">{{ __('note') }}</label>
                    <input type="text" name="note" placeholder="note" class="form-control" >
                </div>
                <br>

                <button type="submit" class="btn btn-primary form-control" >{{ __('save') }}</button>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>

        </div>
    </form>

@stop

@section('page-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('#from_city_supplier').select2({
                placeholder: 'Select city',
                allowClear: true
            });

            $('#to_city_customer').select2({
                placeholder: 'Select city',
                allowClear: true
            });
            $('.select2-selection__arrow').hide();
        });
    </script>
@endsection
