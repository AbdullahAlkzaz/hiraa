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

                <div class="card-content">
                    <div id="chart"></div>
                    <br>

                    <div id="table-container">

                    </div>
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

            var suppliers = @json($suppliers['data']);
            var env = "{{config('app.env')}}";
            var url ;
            if(env == "production"){
                url ="{{config('app.qvm_new_url')}}"+'/order/api/v1/qvm/special_offers/monthly-report';
            }else{
                url ="{{config('app.qvm_order_base_url')}}"+'/special_offers/monthly-report';

            }


            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function(data) {

                    var dataArray = JSON.parse(JSON.stringify(data));

                    const filteredCompanies = suppliers.filter(company => dataArray['sellers'].includes(company.company_id));
                    const companyNames = filteredCompanies.map(company => company.company_name);
                    const offers     = dataArray['offers'];
                    var options = {
                        series: offers,
                        labels: companyNames,
                        chart: {
                            type: 'pie',
                        },
                    };

                    var chart = new ApexCharts(document.querySelector("#chart"), options);

                    chart.render();


                    // Create the HTML table with the data
                    var tableHtml = '<table id="myTable" class="table table-striped table-bordered">';
                    tableHtml += '<thead><tr><th>Company Name</th><th>Offer Count</th></tr></thead>';
                    tableHtml += '<tbody>';
                    for (var i = 0; i < companyNames.length; i++) {
                        tableHtml += '<tr><td>' + companyNames[i] + '</td><td>' + offers[i] + '</td></tr>';
                    }
                    tableHtml += '</tbody></table><br>';

                    // Append the HTML table to a container element in the DOM
                    $('#table-container').html(tableHtml);

                    // Initialize the DataTables library on the table
                    $('#myTable').DataTable();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Error fetching data: ' + errorThrown);
                }
            });



        });
        //end of ajax call



    </script>

@endsection

