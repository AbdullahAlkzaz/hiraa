@extends('layouts/contentLayoutMaster')
@section('title', __('POS statistics'))
@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
@endsection
@section('content')
    @unless(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('Charts'))
  <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless
    <!-- Analytics card section -->
    <section id="analytics-card">
        <p>Comparison of monthly search activities</p>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <form action="{{ route('statistics.charts') }}" method="GET">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-6">
                                    <label for="suppliers_date_from">{{ __('Date From') }}</label>
                                    <fieldset class="form-group">
                                        <input class="form-control" id="suppliers_date_from" name="suppliers_date_from" type="date" value="@if (isset($_GET['suppliers_date_from'])){{ $_GET['suppliers_date_from'] }}@endif" />
                                    </fieldset>
                                </div>

                                <div class="col-12 col-sm-6 col-lg-6">
                                    <label for="suppliers_date_to">{{ __('Date To') }}</label>
                                    <fieldset class="form-group">
                                        <input class="form-control" id="suppliers_date_to" name="suppliers_date_to" type="date" value="@if (isset($_GET['suppliers_date_to'])){{$_GET['suppliers_date_to']}}@endif" />
                                    </fieldset>
                                </div>

                                <div class="col-12 ">
                                    <button type="submit" class="btn btn-info">{{ __('Find') }}</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="card-body">
                        <div id="top_buying_suppliers"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <form action="{{ route('statistics.charts') }}" method="GET">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-lg-6">
                                        <label for="customers_date_from">{{ __('Date From') }}</label>
                                        <fieldset class="form-group">
                                            <input class="form-control" id="customers_date_from" name="customers_date_from" type="date" value="@if (isset($_GET['customers_date_from'])){{ $_GET['customers_date_from'] }}@endif" />
                                        </fieldset>
                                    </div>

                                    <div class="col-12 col-sm-6 col-lg-6">
                                        <label for="customers_date_to">{{ __('Date To') }}</label>
                                        <fieldset class="form-group">
                                            <input class="form-control" id="customers_date_to" name="customers_date_to" type="date" value="@if (isset($_GET['customers_date_to'])){{$_GET['customers_date_to']}}@endif" />
                                        </fieldset>
                                    </div>

                                    <div class="col-12 ">
                                        <button type="submit" class="btn btn-info">{{ __('Find') }}</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <div id="top_buying_customers"></div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/charts/chart-apex.js')) }}"></script>
    <script>
        let companies = [];
        let total_orders = [];
        let orders_count = [];
        let total_items_count = [];
        let average_order_value = [];

        @foreach($top_buying_suppliers as $company)
            companies.push('{{ $company["company_name"] }}')
            total_orders.push('{{ $company["total_orders"] }}')
            orders_count.push('{{ $company["orders_count"] }}')
            total_items_count.push('{{ $company["total_items_count"] }}')
            average_order_value.push('{{ $company["average_order_value"] }}')
        @endforeach

        // console.log(companies, total_orders,orders_count);

        var options = {
            series: [
                {
                    name: "Total Orders Value",
                    data: total_orders
                },
                {
                    name: 'Average Order Value',
                    data: average_order_value
                },
                {
                    name: "Number Of Orders",
                    data: orders_count
                },
                {
                    name: 'Number Of Pieces',
                    data: total_items_count
                },
            ],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: [5, 7, 5],
                curve: 'straight',
                dashArray: [0, 8, 5]
            },
            title: {
                text: 'The Most Selling Suppliers',
                align: 'rigth'
            },
            legend: {
                tooltipHoverFormatter: function(val, opts) {
                    return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
                }
            },
            markers: {
                size: 0,
                hover: {
                    sizeOffset: 6
                }
            },
            xaxis: {
                categories: companies,
            },
            grid: {
                borderColor: '#f1f1f1',
            }
        };

        var chart = new ApexCharts(document.querySelector("#top_buying_suppliers"), options);
        chart.render();

    </script>

    <script>
        let customers = [];
        let customers_total_orders = [];
        let customers_orders_count = [];
        let customers_total_items_count = [];
        let customers_average_order_value = [];

        @foreach($top_buying_customers as $company)
            customers.push('{{ $company["subscriber_name"] }}')
            customers_total_orders.push('{{ $company["total_orders"] }}')
            customers_orders_count.push('{{ $company["orders_count"] }}')
            customers_total_items_count.push('{{ $company["total_items_count"] }}')
            customers_average_order_value.push('{{ $company["average_order_value"] }}')
        @endforeach



        var options = {
            series: [
                {
                    name: "Total Orders Value",
                    data: customers_total_orders
                },
                {
                    name: 'Average Order Value',
                    data: customers_average_order_value
                },
                {
                    name: "Number Of Orders",
                    data: customers_orders_count
                },
                {
                    name: 'Number Of Pieces',
                    data: customers_total_items_count
                },
            ],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: [5, 7, 5],
                curve: 'straight',
                dashArray: [0, 8, 5]
            },
            title: {
                text: 'The Most Selling Customers',
                align: 'rigth'
            },
            legend: {
                tooltipHoverFormatter: function(val, opts) {
                    return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
                }
            },
            markers: {
                size: 0,
                hover: {
                    sizeOffset: 6
                }
            },
            xaxis: {
                categories: customers,
            },
            grid: {
                borderColor: '#f1f1f1',
            }
        };

        var chart = new ApexCharts(document.querySelector("#top_buying_customers"), options);
        chart.render();
    </script>
@endsection
