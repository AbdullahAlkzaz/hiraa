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
    <!-- Analytics card section -->
    @unless(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('POS statistics'))
  <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless
    <section id="analytics-card">
        <div class="row mat-ch-height">
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title"> Stock Values </h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="row border-top text-center mx-0">
                            <div class="col-6 border-end py-1">
                                <p class="card-text text-muted mb-0">Stock</p>
                                <h3 class="fw-bolder mb-0">{{ $stock_values['stockValue'] }}</h3>
                            </div>
                            <div class="col-6 py-1">
                                <p class="card-text text-muted mb-0">Offers</p>
                                <h3 class="fw-bolder mb-0">{{ $stock_values['offersValue'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title"> Month Sales </h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="row border-top text-center mx-0">
                            <div class="col-6 border-end py-1">
                                <p class="card-text text-muted mb-0">Sales</p>
                                <h3 class="fw-bolder mb-0">{{ $month_sales['monthSales'] }}</h3>
                            </div>
                            <div class="col-6 py-1">
                                <p class="card-text text-muted mb-0">No. Subscribtions</p>
                                <h3 class="fw-bolder mb-0">{{ $month_sales['monthQuantity'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title"> Companies </h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="row border-top text-center mx-0">
                            <div class="col-6 border-end py-1">
                                <p class="card-text text-muted mb-0">Active</p>
                                <h3 class="fw-bolder mb-0">{{ $companies['activeCompanies'] }}</h3>
                            </div>
                            <div class="col-6 py-1">
                                <p class="card-text text-muted mb-0">Registered</p>
                                <h3 class="fw-bolder mb-0">{{ $companies['totalCompanies'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title"> Searches Today </h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="row border-top text-center mx-0">
                            <div class="col-3 border-end py-1">
                                <p class="card-text text-muted mb-0">Qvm</p>
                                <h3 class="fw-bolder mb-0">0</h3>
                            </div>
                            <div class="col-3 py-1">
                                <p class="card-text text-muted mb-0">Rep</p>
                                <h3 class="fw-bolder mb-0">0</h3>
                            </div>
                            <div class="col-3 py-1">
                                <p class="card-text text-muted mb-0">Cat</p>
                                <h3 class="fw-bolder mb-0">0</h3>
                            </div>
                            <div class="col-3 py-1">
                                <p class="card-text text-muted mb-0">Stk</p>
                                <h3 class="fw-bolder mb-0">0</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h5 class="card-title">Monthly Searches</h5>
        <p>Comparison of monthly search activities</p>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div id="products_monthly_searches"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div id="replacements_monthly_searches"></div>
                        <span id="chart"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div id="stock_monthly_searches"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">New Companies</h5>
                        <p>Newly 10 joined companies</p>
                        <table class="table">
                            <tr>
                                <td>Company</td>
                                <td>Join Date</td>
                            </tr>
                            @if ($topCompanies)
                                @forelse ($topCompanies as $topCompany)
                                    <tr>
                                        <td>
                                            <a href="{{ route('company_dashboard', $topCompany['id']) }}">
                                                {{ $topCompany['name'] }}</a>
                                        </td>
                                        <td>
                                            @php
                                                $seconds = $topCompany['created'] / 1000;
                                                $created = date('d-m-Y', $seconds);
                                            @endphp
                                            {{ $created }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            No items
                                        </td>
                                    </tr>
                                @endforelse
                            @endif
                        </table>
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
        var options = {
            series: [{
                name: "search",
                data: [
                    @if ($replacementMonthlySearches)
                        @foreach ($replacementMonthlySearches as $replacementMonthlySearch)
                            {
                                x: '{{ $replacementMonthlySearch['month'] }} {{ $replacementMonthlySearch['year'] }}',
                                y: {{ $replacementMonthlySearch['count'] }}
                            },
                        @endforeach
                    @endif
                ]
            }],
            chart: {
                type: 'bar',
                height: 380
            },
            xaxis: {
                type: 'category',
                labels: {
                    formatter: function(val) {
                        return val
                    }
                },
            },
            title: {
                text: 'Replacements monthly searches',
            },
            tooltip: {
                x: {
                    formatter: function(val) {
                        return val
                    }
                }
            },
        };
        var chart = new ApexCharts(document.querySelector("#replacements_monthly_searches"), options);
        chart.render();
    </script>
    <script>
        var options = {
            series: [{
                name: "search",
                data: [
                    @if ($monthlySearches)
                        @foreach ($monthlySearches as $monthlySearch)
                            {
                                x: '{{ $monthlySearch['month'] }} {{ $monthlySearch['year'] }}',
                                y: {{ $monthlySearch['count'] }}
                            },
                        @endforeach
                    @endif
                ]
            }],
            chart: {
                type: 'bar',
                height: 380
            },
            xaxis: {
                type: 'category',
                labels: {
                    formatter: function(val) {
                        return val
                    }
                },
            },
            title: {
                text: 'Products monthly searches',
            },
            tooltip: {
                x: {
                    formatter: function(val) {
                        return val
                    }
                }
            },
        };
        var chart = new ApexCharts(document.querySelector("#products_monthly_searches"), options);
        chart.render();
    </script>
    <script>
        var options = {
            series: [{
                name: "search",
                data: [
                    @if ($stockMonthlySearches)
                        @foreach ($stockMonthlySearches as $stockMonthlySearch)
                            {
                                x: '{{ $stockMonthlySearch['month'] }} {{ $stockMonthlySearch['year'] }}',
                                y: {{ $stockMonthlySearch['count'] }}
                            },
                        @endforeach
                    @endif
                ]
            }],
            chart: {
                type: 'bar',
                height: 380
            },
            xaxis: {
                type: 'category',
                labels: {
                    formatter: function(val) {
                        return val
                    }
                },
            },
            title: {
                text: 'Stock monthly searches',
            },
            tooltip: {
                x: {
                    formatter: function(val) {
                        return val
                    }
                }
            },
        };
        var chart = new ApexCharts(document.querySelector("#stock_monthly_searches"), options);
        chart.render();
    </script>
@endsection
