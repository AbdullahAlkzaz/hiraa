@php $titlePage = __('Cities') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')
    <form action="{{ route('cities.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('Country name') }}</label>
                    <select name="country_id" class="form-control">
                        {{-- <option>{{ __("Select country") }}</option> --}}
                        @foreach ($countries as $country)
                            <option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('Region name') }}</label>
                    <select id="region_id" name="region_id" class="form-control">
                        <option>{{ __('Select region') }}</option>
                        @foreach ($regions as $region)
                            <option data-country_id="{{ $region['countryId'] }}" value="{{ $region['id'] }}">
                                {{ $region['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('City name') }}</label>
                    <input type="text" name="name" class="form-control" placeholder="{{ __('City name') }}"
                        value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('City en_name') }}</label>
                    <input type="text" name="en_name" class="form-control" placeholder="{{ __('City en_name') }}"
                        value="{{ old('en_name') }}" required>
                </div>
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">Coordinates<span class="input-label-secondary"
                            title="{{ __('draw your zone area on the map') }}">{{ __('draw your zone area on the map') }}</span></label>
                    <textarea type="text" name="coordinates" id="coordinates" class="form-control">{{ old('coordinates') }}</textarea>
                </div>
            </div>
            <div class="col-6" style="height: 300px;">
                <input id="pac-input" class="controls rounded" style="height: 3em;width:fit-content;"
                    title="{{ __('search_your_location_here') }}" type="text" placeholder="{{ __('search_here') }}" />
                <div id="map-canvas" style="height: 100%; margin:0px; padding: 0px;"></div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('update') }}</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3.45.8&key=AIzaSyCgBcmRxPDyddm0cL8jqRm9ZMGKRtFpw78&libraries=drawing,places">
    </script>
    <script>
        auto_grow();
        function auto_grow() {
            let element = document.getElementById("coordinates");
            element.style.height = "5px";
            element.style.height = (element.scrollHeight) + "px";
        }
    </script>
    <script>
        var map; // Global declaration of the map
        var lat_longs = new Array();
        var drawingManager;
        var lastpolygon = null;
        var bounds = new google.maps.LatLngBounds();
        var polygons = [];
        function resetMap(controlDiv) {
            // Set CSS for the control border.
            const controlUI = document.createElement("div");
            controlUI.style.backgroundColor = "#fff";
            controlUI.style.border = "2px solid #fff";
            controlUI.style.borderRadius = "3px";
            controlUI.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
            controlUI.style.cursor = "pointer";
            controlUI.style.marginTop = "8px";
            controlUI.style.marginBottom = "22px";
            controlUI.style.textAlign = "center";
            controlUI.title = "Reset map";
            controlDiv.appendChild(controlUI);
            // Set CSS for the control interior.
            const controlText = document.createElement("div");
            controlText.style.color = "rgb(25,25,25)";
            controlText.style.fontFamily = "Roboto,Arial,sans-serif";
            controlText.style.fontSize = "10px";
            controlText.style.lineHeight = "16px";
            controlText.style.paddingLeft = "2px";
            controlText.style.paddingRight = "2px";
            controlText.innerHTML = "X";
            controlUI.appendChild(controlText);
            // Setup the click event listeners: simply set the map to Chicago.
            controlUI.addEventListener("click", () => {
                lastpolygon.setMap(null);
                $('#coordinates').val('');
            });
        }
        function initialize() {
            var myLatlng = new google.maps.LatLng(24.714069690178, 46.7605883125);
            var myOptions = {
                zoom: 10,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
            const polygonCoords = [];
            var zonePolygon = new google.maps.Polygon({
                paths: polygonCoords,
                strokeColor: "#F20505",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillOpacity: 0,
            });
            zonePolygon.setMap(map);
            zonePolygon.getPaths().forEach(function(path) {
                path.forEach(function(latlng) {
                    bounds.extend(latlng);
                    map.fitBounds(bounds);
                });
            });
            drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.POLYGON,
                drawingControl: true,
                drawingControlOptions: {
                    position: google.maps.ControlPosition.TOP_CENTER,
                    drawingModes: [google.maps.drawing.OverlayType.POLYGON]
                },
                polygonOptions: {
                    editable: true
                }
            });
            drawingManager.setMap(map);
            google.maps.event.addListener(drawingManager, "overlaycomplete", function(event) {
                var newShape = event.overlay;
                newShape.type = event.type;
            });
            google.maps.event.addListener(drawingManager, "overlaycomplete", function(event) {
                if (lastpolygon) {
                    lastpolygon.setMap(null);
                }
                $('#coordinates').val(event.overlay.getPath().getArray());
                lastpolygon = event.overlay;
                auto_grow();
            });
            const resetDiv = document.createElement("div");
            resetMap(resetDiv, lastpolygon);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(resetDiv);
            // Create the search box and link it to the UI element.
            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });
            let markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    const icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25),
                    };
                    // Create a marker for each place.
                    markers.push(
                        new google.maps.Marker({
                            map,
                            icon,
                            title: place.name,
                            position: place.geometry.location,
                        })
                    );
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("select[name=country_id]").change(function() {
                changeopts(this.value);
            });
        });
    </script>
    <script>
        function changeopts(show) {
            console.log(show);
            $('#region_id option').hide();
            $('#region_id option[data-country_id="' + show + '"]').show();
        }
    </script>
@stop
