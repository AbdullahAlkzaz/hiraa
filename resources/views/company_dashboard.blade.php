@extends('layouts.contentLayoutMaster')
@section('title', __('Company dashboard'))
@section('content')
    <section id="analytics-card">
        <div class="row match-height">
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title"> Stock Values </h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="row border-top text-center mx-0">
                            <div class="col-6 border-end py-1">
                                <p class="card-text text-muted mb-0">Stock</p>
                                <h3 class="fw-bolder mb-0">{{ $company_stock_values['stockValue'] }}</h3>
                            </div>
                            <div class="col-6 py-1">
                                <p class="card-text text-muted mb-0">Offers</p>
                                <h3 class="fw-bolder mb-0">{{ $company_stock_values['offersValue'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title"> Purchae Orders </h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="row border-top text-center mx-0">
                            <div class="col-6 border-end py-1">
                                <p class="card-text text-muted mb-0">Submitted</p>
                                <h3 class="fw-bolder mb-0">{{ $submitted_purchase_orders }}</h3>
                            </div>
                            <div class="col-6 py-1">
                                <p class="card-text text-muted mb-0">Received</p>
                                <h3 class="fw-bolder mb-0">{{ $received_purchase_orders }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title"> Quotations </h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="row border-top text-center mx-0">
                            <div class="col-6 border-end py-1">
                                <p class="card-text text-muted mb-0">Submitted</p>
                                <h3 class="fw-bolder mb-0">{{ $submitted_quotations }}</h3>
                            </div>
                            <div class="col-6 py-1">
                                <p class="card-text text-muted mb-0">Recieved</p>
                                <h3 class="fw-bolder mb-0">{{ $received_quotations }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title"> Total Searches </h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="row border-top text-center mx-0">
                            <div class="col-4 border-end py-1">
                                <p class="card-text text-muted mb-0">Products</p>
                                <h3 class="fw-bolder mb-0">{{ $company_month_sales['totalSearches'] }}</h3>
                            </div>
                            <div class="col-4 border-end py-1">
                                <p class="card-text text-muted mb-0">Replc.</p>
                                <h3 class="fw-bolder mb-0">{{ $company_month_sales['totalReplacementSearches'] }}</h3>
                            </div>
                            <div class="col-4 py-1">
                                <p class="card-text text-muted mb-0">Catalogs</p>
                                <h3 class="fw-bolder mb-0">{{ $company_month_sales['stockSearchesToday'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row match-height">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Company Information</h5>
                        <table class="table">
                            <tr>
                                <td>Company ID</td>
                                <td>{{ $company['id'] }}</td>
                            </tr>
                            <tr>
                                <td>Company Name</td>
                                <td>{{ $company['name'] }}</td>
                            </tr>
                            <tr>
                                <td>Company Arabic Name</td>
                                <td>{{ $company['nameAr'] }}</td>
                            </tr>
                            <tr>
                                <td>Created</td>
                                <td>{{ date('d-m-Y', $company['created'] / 1000) }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{ $company['status'] }}</td>
                            </tr>
                            <tr>
                                <td>Country</td>
                                <td>{{ $company['countryId'] }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Company labels</h5>
                        <table class="table">
                            <tr>
                                <td>Label</td>
                                <td>color</td>
                                <td>external</td>
                                <td>created</td>
                            </tr>
                            @foreach ($company_labels as $company_label)
                                <tr>
                                    <td>{{ $company_label['label'] }}</td>
                                    <td>{{ $company_label['color'] }}</td>
                                    <td>{{ $company_label['external'] }}</td>
                                    <td>
                                        {{ date('d-m-Y', $company_label['created'] / 1000) }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Subscriptions History
                        </h5>
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Plan</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            @foreach ($subscriptions as $subscription)
                                <tr>
                                    <td>{{ $subscription['id'] }}</td>
                                    <td>{{ $subscription['planId'] }}</td>
                                    <td>{{ date('d-m-Y', $subscription['startDate'] / 1000) }}</td>
                                    <td>{{ date('d-m-Y', $subscription['endDate'] / 1000) }}</td>
                                    <td>{{ $subscription['status'] }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Comments
                        </h5>
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>createdBy</th>
                                <th>status</th>
                                <th>comment</th>
                                <th>created</th>
                            </tr>
                            @foreach ($company_comments as $company_comment)
                                <tr>
                                    <td>{{ $company_comment['id'] }}</td>
                                    <td>{{ $company_comment['createdBy'] }}</td>
                                    <td>{{ $company_comment['status'] }}</td>
                                    <td>{{ $company_comment['comment'] }}</td>
                                    <td>
                                        {{ date('d-m-Y', $company_comment['created'] / 1000) }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Users
                        </h5>
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>name</th>
                                <th>email</th>
                                <th>mobile</th>
                                <th>created</th>
                            </tr>
                            @foreach ($subscribers as $subscriber)
                                <tr>
                                    <td>{{ $subscriber['id'] }}</td>
                                    <td>{{ $subscriber['name'] }}</td>
                                    <td>{{ $subscriber['email'] }}</td>
                                    <td>{{ $subscriber['mobile'] }}</td>
                                    <td>
                                        {{ date('d-m-Y', $subscriber['created'] / 1000) }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Branches
                        </h5>
                        <div id="map" style="width: 100%; height: 400px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row match-height">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Search Activities</h5>
                        <small>Last 50 searches</small>
                        <table class="table">
                            <tr>
                                <td>Keyword</td>
                                <td>Date</td>
                                <td>Time</td>
                                <td>Found</td>
                            </tr>
                            @foreach ($searches_keywords as $key)
                                <tr>
                                    <td>{{ $key['query'] }}</td>
                                    <td>{{ date('d-m-Y', $company['created'] / 1000) }}</td>
                                    <td>{{ date('h:s', $company['created'] / 1000) }}</td>
                                    <td>
                                        @if($key['found'])
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-danger">No</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Search Activities</h5>
                        <small>Last 50 searches</small>
                        <div id="monthly_searches"></div>
                    </div>
                </div>
            </div>

{{--            <div class="col-md-6">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h5 class="card-title">Company labels</h5>--}}
{{--                        <table class="table">--}}
{{--                            <tr>--}}
{{--                                <td>Label</td>--}}
{{--                                <td>color</td>--}}
{{--                                <td>external</td>--}}
{{--                                <td>created</td>--}}
{{--                            </tr>--}}
{{--                            @foreach ($company_labels as $company_label)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $company_label['label'] }}</td>--}}
{{--                                    <td>{{ $company_label['color'] }}</td>--}}
{{--                                    <td>{{ $company_label['external'] }}</td>--}}
{{--                                    <td>--}}
{{--                                        {{ date('d-m-Y', $company_label['created'] / 1000) }}--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <div class="row match-height">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Company Attachments</h5>
                        @if(count($attachments) > 0)
                            @foreach($attachments as $attachment)
                                <a href="{{$attachment['url']}}">{{$attachment['name']}}</a><br>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Extra Information</h5>
                        <table class="table">
                            <tr>
                                <td>Commercial Reregistration Number</td>
                                <td>{{ $company['commRegNumber'] }}</td>
                            </tr>
                            <tr>
                                <td>Vat Number</td>
                                <td>{{ $company['vatNumber'] }}</td>
                            </tr>
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
@endsection

@section('page-script')
    @php
        $latitude = 24.7251918;
        $longitude = 46.8225288;
    @endphp
    <script src="{{ asset(mix('js/scripts/charts/chart-apex.js')) }}"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyACI9aMajhzCpV4mJwbVKVlFu6jaNV9d5E" type="text/javascript"></script>
    <script type="text/javascript">
        var options = {
            series: [{
                name: "search",
                data: [
                    @if ($searches_monthly_summary)
                        @foreach ($searches_monthly_summary as $stockMonthlySearch)
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
                text: 'Monthly searches',
            },
            tooltip: {
                x: {
                    formatter: function(val) {
                        return val
                    }
                }
            },
        };
        console.log(options);
        var chart = new ApexCharts(document.querySelector("#monthly_searches"), options);
        chart.render();
    </script>
    <script type="text/javascript">
        var locations = [
            @foreach ($branches as $key => $branch)
                ['{{ $branch['name'] }}', {{ $branch['latitude'] }}, {{ $branch['longitude'] }},
                    {{ $key + 1 }}
                ],
                @php
                    $latitude = $branch['latitude'];
                    $longitude = $branch['longitude'];
                @endphp
            @endforeach
        ];
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: new google.maps.LatLng({{ $latitude }}, {{ $longitude }}),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    </script>
@endsection
