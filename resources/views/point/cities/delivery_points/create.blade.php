@php $titlePage = __('pickup points') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')
    <form action="{{ route('cities.store.delivery.point') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <input type="text" hidden value="{{$id}}" name="city_id">
                <input type="text" hidden name="city_choosen" value="{{$city_name}}">

                <div class="form-group">
                    <label class="input-label" for="point_name">{{ __('point name') }}</label>
                    <input type="text" name="point_name" class="form-control" placeholder="{{ __('point name') }}"
                           required>
                </div>

                <div class="form-group">
                    <label class="input-label" for="point_name">{{ __('point arabic name') }}</label>
                    <input type="text" name="point_name_ar" class="form-control" placeholder="{{ __('point arabic name') }}"
                           required>
                </div>


                <div class="form-group">
                    <input type="text" name="city_name" class="form-control" placeholder="{{ __('City name') }}"
                           value="{{$city_name}}" hidden required>
                </div>
                <div class="form-group">

                    <input type="text" name="city_name_ar" class="form-control" placeholder="{{ __('City arabic name') }}"
                           value="{{$city_name}}" hidden  required>
                </div>



                <div class="form-group">
                    <label class="input-label" for="point_address">{{ __('point address') }}</label>
                    <input type="text" name="point_address" class="form-control" placeholder="{{ __('point name') }}"
                           required>
                </div>

                <div class="form-group">
                    <label class="input-label" for="point_working_hours">{{ __('point working hours') }}</label>
                    <input type="text" name="point_working_hours" class="form-control" placeholder="{{ __('point working hours') }}"
                           required>
                </div>

                <div class="form-group">
                    <label class="input-label" for="point_manager_name">{{ __('point manager name') }}</label>
                    <input type="text" name="point_manager_name" class="form-control" placeholder="{{ __('point manager name') }}"
                           required>
                </div>

                <div class="form-group">
                    <label class="input-label" for="point_manager_phone">{{ __('point manager phone') }}</label>
                    <input type="text" name="point_manager_phone" class="form-control" placeholder="{{ __('point manager phone') }}"
                           required>
                </div>


                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">point location <span class="input-label-secondary"
                                                                                               title="{{ __('draw your zone area on the map') }}">{{ __('draw your zone area on the map') }}</span></label>
                    <textarea type="text" name="point_location" id="coordinates" class="form-control">{{ old('coordinates') }}</textarea>
                </div>
            </div>
            <div class="col-6" style="height: 300px;">
                <div id="map-canvas" style="height: 100%; margin:0px; padding: 0px;"></div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('save') }}</button>
    </form>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <script
     src="https://maps.googleapis.com/maps/api/js?v=3.45.8&key=AIzaSyACI9aMajhzCpV4mJwbVKVlFu6jaNV9d5E&libraries=drawing,places">
    </script>
    <script>

            var map = new google.maps.Map(document.getElementById('map-canvas'), {
                center: {lat: 24.714069690178, lng: 46.7605883125},
                zoom: 12
            });

            var marker = new google.maps.Marker({
                position: {lat:24.714069690178, lng: 46.7605883125},
                map: map,
                draggable: true
            });

            google.maps.event.addListener(map, 'click', function(event) {
                marker.setPosition(event.latLng);
                document.getElementById("coordinates").value = event.latLng.lat() + "," + event.latLng.lng();
            });
    </script>

@stop
