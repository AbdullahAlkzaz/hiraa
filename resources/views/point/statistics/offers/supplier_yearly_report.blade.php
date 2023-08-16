@extends('layouts.app')

@section('title', __('Offers Statistics'))
@push('style')
@endpush

@section('content')

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">

                <div class="card-header">
                    <h4 class="mb-0">{{ __('Offers stats') }}</h4>


                </div>
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <form id="seller-form">
                            @csrf
                            <label for="seller_id">select seller:  </label>
                            <select class="form-control"
                                name="seller_id" id="seller_id"
                                aria-label=".form-select-lg">
                                @foreach($suppliers['data'] as $supplier)

                                    <option value="{{$supplier['company_id']}}">{{$supplier['company_name']}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                    <div class="col-lg-2"></div>
                </div>

                <div class="card-content">
                    <div id="chart"></div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
@stop
@section('page-script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        //ajax call

        $(document).ready(function() {
            var env = "{{config('app.env')}}";
            var url ;
            if(env == "production"){
                url ="{{config('app.qvm_new_url')}}"+'/order/api/v1/qvm/special_offers/yearly-report';
            }else{
                url ="{{config('app.qvm_order_base_url')}}"+'/special_offers/yearly-report';

            }

            $('#seller-form').submit(function(event) {
                event.preventDefault();
                var sellerId = $('#seller_id').val();
                console.log("here " +url);
                getData(url,sellerId);

            });

            function getData(url,sellerId){

                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        seller_id: sellerId
                    },
                    success: function(data) {

                        var dataArray = JSON.parse(JSON.stringify(data));
                        var resultArray = Object.values(dataArray);


                        var options = {
                            chart: {
                                type: 'line'
                            },
                            series: [{
                                name: 'offers',
                                data: resultArray
                            }],
                            xaxis: {
                                categories: ["jan","fab","mar","april","may","jun","jul", "aug","sep","oct","nov","dec"]
                            }
                        }

                        var chart = new ApexCharts(document.querySelector("#chart"), options);

                        chart.render();

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error fetching data: ' + errorThrown);
                    }
                });
            }

        });


        //end of ajax call




    </script>

@endsection

