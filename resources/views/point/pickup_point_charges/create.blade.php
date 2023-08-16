@php $titlePage = __('pickup charge') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <form action="{{route('pickup-charge.store')}}" method="post">
        @csrf
        <div class="row">
            @if(isset($message))
                <div>
                    <center><div class="btn btn-outline-warning">{{$message}}</div></center>
                </div>
            @endif
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                <div class="form-group">
                    <label class="input-label" for="from_city">{{ __('from city') }}</label>
                    <select class="form-control" required
                            name="from_city" id="from_city"
                            aria-label=".form-select-lg">
                        @foreach($cities as $city)

                            <option value="{{$city['id']}}">{{$city['name']}} </option>
                        @endforeach
                    </select>
                </div>
                <br>

                <div class="form-group">
                    <label class="input-label" for="to_city">{{ __('to city') }}</label>
                    <select class="form-control" requried
                            name="to_city" id="to_city"
                            aria-label=".form-select-lg">
                        @foreach($cities as $city)

                            <option value="{{$city['id']}}">{{$city['name']}} </option>
                        @endforeach
                    </select>
                </div>
                <br>

                <div class="form-group">
                    <label class="input-label" for="to_pickup_point">{{ __('to pickup point') }}</label>
                    <select id="results" name="to_pickup_point" class="form-control" required>
                        <option value="">Select pickup point</option>
                    </select>
                </div>
                <br>

                <div class="form-group">
                    <label class="input-label" for="charge_cost">{{ __('charge cost') }}</label>
                    <input type="text" name="charge_cost" placeholder="charge cost" class="form-control" required>
                </div>
                <br>

                <div class="form-group">
                    <label class="input-label" for="old_cost">{{ __('old cost') }}</label>
                    <input type="text" name="old_cost" placeholder="old cost" class="form-control" required>
                </div>
                <br>

                <div class="form-group">
                    <label class="input-label" for="tier">{{ __('tier') }}</label>
                    <input type="text" name="tier" placeholder="tier" class="form-control" required>
                </div>
                <br>

                <div class="form-group">
                    <label class="input-label" for="delivery_time">{{ __('delivery time') }}</label>
                    <input type="text" name="delivery_time" placeholder="delivery_time" class="form-control" required>
                </div>
                <br>



                <div class="form-group">
                    <label class="input-label" for="note">{{ __('note') }}</label>
                    <input type="text" name="note" placeholder="note" class="form-control" required>
                </div>
                <br>


                <button type="submit" class="btn btn-primary form-control" >{{ __('save') }}</button>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>

        </div>
    </form>

@stop
@section('page-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

        $(document).ready(function() {
            $('#to_city').change(function() {
            var cityId = $(this).val();
                var env = "{{config('app.env')}}";
                var url ;
                if(env == "production"){
                    url ="{{config('app.qvm_new_url')}}"+'/get/delivery-points/';
                }else{
                    url ="{{config('app.qvm_order_base_url')}}"+'/get/delivery-points/';
                }
            if (cityId) {
                $.ajax({

                    type: "GET",
                    url: url + cityId,
                    success: function(results) {
                       $("#results").empty();
                        $.each(results['delivery_points'], function(point) {
                            console.log("results : " + results['delivery_points'][point]['id']);
                            $("#results").append('<option value="' + results['delivery_points'][point]['id'] + '">' + results['delivery_points'][point]['point_name'] + '</option>');
                        });
                    }
                });
            } else {
                $("#results").empty();
            }
        });
    });
</script>
    <script>
        $(document).ready(function() {
            $('#from_city').select2({
                placeholder: 'Select city',
                allowClear: true
            });

            $('#to_city').select2({
                placeholder: 'Select city',
                allowClear: true
            });
            $('.select2-selection__arrow').hide();
        });
    </script>
@endsection
