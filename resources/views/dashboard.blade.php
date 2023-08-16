@extends('layouts/contentLayoutMaster')
@section('title', 'لوحة التحكم')
@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection
@section('page-style')
    {{-- Page css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection
@section('content')
   <input name="count_orders" value="10" type="hidden" />
   <input name="count_quotations_orders" value="50" type="hidden" />
   <input name="offer_orders"  value="40" type="hidden" />

    {{-- @inject('HomeController', 'App\Http\Controllers\HomeController') --}}
    <!-- Dashboard Ecommerce Starts -->
    <section id="dashboard-ecommerce">

        <div class="row match-height">
            <!-- Medal Card -->
            <div class="col-xl-4 col-md-6 col-12">
                <div class="card card-congratulation-medal">
                    <div class="card-body">
                        <h5>Welcome 🎉 {{ Auth::user()->name }}!</h5>
                        {{-- <p class="card-text font-small-3">You have won gold medal</p> --}}
                        <h3 class="mb-75 mt-2 pt-50">
                            {{-- <a href="#">$48.9k</a> --}}
                        </h3>
                        {{-- <button type="button" class="btn btn-primary">View Sales</button> --}}
                        <img src="{{ asset('images/illustration/badge.svg') }}" class="congratulation-medal"
                            alt="Medal Pic" />
                    </div>
                </div>
            </div>
            <!--/ Medal Card -->
            <!-- Statistics Card -->
            <div class="col-xl-8 col-md-6 col-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">Statistics</h4>
                        <div class="d-flex align-items-center">
                            <p class="card-text font-small-2 me-25 mb-0">Updated 1 month ago</p>
                        </div>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-primary me-2">
                                        <div class="avatar-content">
                                            <i data-feather="trending-up" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{ $sales }}</h4>
                                        <p class="card-text font-small-3 mb-0">Sales</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-info me-2">
                                        <div class="avatar-content">
                                            <i data-feather="user" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{ $count_customers }}</h4>
                                        <p class="card-text font-small-3 mb-0">Customers</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-danger me-2">
                                        <div class="avatar-content">
                                            <i data-feather="box" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{ $count_products }}</h4>
                                        <p class="card-text font-small-3 mb-0">Products</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                                <div class="d-flex flex-row">
                                    <a href="#">
                                    <div class="avatar bg-light-success me-2">
                                        <div class="avatar-content">
                                            <i data-feather="dollar-sign" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    </a>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{ $revenue }}</h4>
                                        <p class="card-text font-small-3 mb-0">Revenue</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Statistics Card -->
        </div>
        <div class="row match-height">
            <div class="col-lg-4 col-12">
                <div class="row match-height">
                    <!-- Bar Chart - Orders -->
                    <div class="col-lg-6 col-md-3 col-6">
                        <div class="card">
                            <div class="card-body pb-50">
                                <h6>Orders</h6>
                                <h2 class="fw-bolder mb-1">{{ $count_orders }}</h2>
                                <div id="statistics-order-chart"></div>
                            </div>
                        </div>
                    </div>
                    <!--/ Bar Chart - Orders -->
                    <!-- Line Chart - Profit -->
                    <div class="col-lg-6 col-md-3 col-6">
                        <div class="card card-tiny-line-stats">
                            <div class="card-body pb-50">
                                <h6>Profit</h6>
                                <h2 class="fw-bolder mb-1">{{ $revenue }}</h2>
                                <div id="statistics-profit-chart"></div>
                            </div>
                        </div>
                    </div>
                    <!--/ Line Chart - Profit -->
                    <!-- Earnings Card -->
                    <div class="col-lg-12 col-md-6 col-12">
                        <div class="card earnings-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h4 class="card-title mb-1">Earnings</h4>
                                        <div class="font-small-2">This Month</div>
                                        <h5 class="mb-1">{{ $revenue }}</h5>
                                        {{-- <p class="card-text text-muted font-small-2">
                                            <span class="fw-bolder">68.2%</span><span> more earnings than last month.</span>
                                        </p> --}}
                                    </div>
                                    <div class="col-6">
                                        {{-- <div id="earnings-chart"></div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Earnings Card -->
                </div>
            </div>
            <!-- Company Table Card -->
            <div class="col-lg-8 col-12">
                <div class="card card-company-table">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Company</th>
                                        {{-- <th>Category</th> --}}
                                        <th>Number of Orders</th>
                                        <th>Revenue</th>
                                        <th>Sales</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                        <?php $company_data = $HomeController->company_by_id($company->company_id); ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/toolbox.svg') }}"
                                                                alt="Toolbar svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">
                                                            {{ $company_data['company_en_name'] ?? '-' }}</div>
                                                        <div class="font-small-2 text-muted">
                                                            {{ $company_data['company_email'] ?? '-' }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            {{-- <td>
                        <div class="d-flex align-items-center">
                          <div class="avatar bg-light-primary me-1">
                            <div class="avatar-content">
                              <i data-feather="monitor" class="font-medium-3"></i>
                            </div>
                          </div>
                          <span></span>
                        </div>
                      </td> --}}
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">{{ $company->number_of_orders }}</span>
                                                    {{-- <span class="font-small-2 text-muted">this week</span> --}}
                                                </div>
                                            </td>
                                            <td>{{ $company_data['revenue'] ?? 0 }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">{{ $company_data['sales'] ?? 0 }}</span>
                                                    <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Company Table Card -->
        </div>
        <div class="row match-height">
            <!-- Browser States Card -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-browser-states">
                    <div class="card-header">
                        <div>
                            <h4 class="card-title">Top seal products</h4>
                            {{-- <p class="card-text font-small-2">this week</p> --}}
                        </div>
                        <div class="dropdown chart-dropdown">
                            <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"
                                data-bs-toggle="dropdown"></i>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Last 28 Days</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">Last Year</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($top_products as $top_product)
                            <div class="browser-states">
                                <div class="d-flex">
                                    <img src="{{ asset('images/icons/qrcode.png') }}" class="rounded me-1"
                                        height="30"
                                        alt="{{ $top_product->product ? $top_product->product['name'] : '' }}" />
                                    <h6 class="align-self-center mb-0">
                                        {{ $top_product->product ? $top_product->product['name'] : '' }} </h6>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="fw-bold text-body-heading me-1">{{ $top_product->number_of_orders }}</div>
                                    {{-- <div id="browser-state-chart-primary"></div> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--/ Browser States Card -->
            <input id="inprogress_orders" value="{{ $inprogress_orders }}" type="hidden" />
            <!-- Goal Overview Card -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Orders Status Overview</h4>
                        <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                    </div>
                    <div class="card-body p-0">
                        <div id="goal-overview-radial-bar-chart" class="my-2"></div>
                        <div class="row border-top text-center mx-0">
                            <div class="col-4 border-end py-1">
                                <p class="card-text text-muted mb-0">All</p>
                                <h3 class="fw-bolder mb-0">{{ $count_orders }}</h3>
                            </div>
                            <div class="col-4 border-end py-1">
                                <p class="card-text text-muted mb-0">Completed</p>
                                <h3 class="fw-bolder mb-0">{{ $count_orders_completed }}</h3>
                            </div>
                            <div class="col-4 py-1">
                                <p class="card-text text-muted mb-0">In Progress</p>
                                <h3 class="fw-bolder mb-0">{{ $count_orders_in_progress }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Goal Overview Card -->
            <!-- Transaction Card -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-transaction">
                    <div class="card-header">
                        <h4 class="card-title">Transactions</h4>
                        <div class="dropdown chart-dropdown">
                            <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"
                                data-bs-toggle="dropdown"></i>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Last 28 Days</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">Last Year</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($transactions_by_descriptions as $transaction)
                            <div class="transaction-item" title="{{ $transaction->status_key }}">
                                <div class="d-flex">
                                    <div
                                        class="avatar bg-light-{{ $transaction->status == 1 ? 'success' : 'primary' }}   rounded float-start">
                                        <div class="avatar-content">
                                            <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                                        </div>
                                    </div>
                                    <div class="transaction-percentage">
                                        <h6 class="transaction-title">Wallet </h6>
                                        <small> {{ $transaction->description }}
                                            @if ($transaction->status != 1)
                                                <span class="text-danger">{{ $transaction->status_key }}</span>
                                            @endif
                                        </small>
                                    </div>
                                </div>
                                <div class="fw-bolder text-{{ $transaction->status == 1 ? 'success' : 'danger' }}">
                                    {{ $transaction->sum_amount }} </div>
                            </div>
                        @endforeach
                        <hr>
                        {{--
          <div class="transaction-item">
            <div class="d-flex">
              <div class="avatar bg-light-primary rounded float-start">
                <div class="avatar-content">
                  <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                </div>
              </div>
              <div class="transaction-percentage">
                <h6 class="transaction-title">Wallet</h6>
                <small> deposit </small>
              </div>
            </div>
            <div class="fw-bolder text-danger">{{ $wallet_deposit }} </div>
          </div>
          <div class="transaction-item">
            <div class="d-flex">
              <div class="avatar bg-light-danger rounded float-start">
                <div class="avatar-content">
                  <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                </div>
              </div>
              <div class="transaction-percentage">
                <h6 class="transaction-title">Wallet</h6>
                <small> withdraw  </small>
              </div>
            </div>
            <div class="fw-bolder text-danger">{{ $wallet_withdraw }}</div>
          </div> --}}
                        <div class="transaction-item">
                            <div class="d-flex">
                                <div class="avatar bg-light-success rounded float-start">
                                    <div class="avatar-content">
                                        <i data-feather="check" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="transaction-percentage">
                                    <h6 class="transaction-title">Bank Transfer</h6>
                                    <small>from users </small>
                                </div>
                            </div>
                            <div class="fw-bolder text-success">0</div>
                        </div>
                        <div class="transaction-item">
                            <div class="d-flex">
                                <div class="avatar bg-light-info rounded float-start">
                                    <div class="avatar-content">
                                        <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="transaction-percentage">
                                    <h6 class="transaction-title">Transfer</h6>
                                    <small>Refund</small>
                                </div>
                            </div>
                            <div class="fw-bolder text-success">0</div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Transaction Card -->
        </div>
        @if(session('permissionError'))
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="errorModalLabel">Error</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ session('permissionError') }}
                    </div>
                </div>
            </div>
        </div>
        @endif
    </section>
    <!-- Dashboard Ecommerce ends -->
@endsection
@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script>

@endsection
