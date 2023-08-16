@extends('layouts.app')
@section('title', __('Customer Statistics'))
@section('page-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-one">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('Customer Statistics') }}</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="users-list-filter">
                            <form action="" method="GET">
                                <div class="row">
                                    <div class="col-4 col-sm-6 col-lg-3">
                                        <label class="form-label" for="normalMultiSelect">Multiple Select</label>
                                        <select class="form-select select2" name="group"  data-placeholder="Choose anything">
                                            <option value="day" {{ request()->group == "day" ? "selected" : "" }}> Day </option>
                                            <option value="month" {{ request()->group == "month" ? "selected" : "" }}> Month </option>
                                            <option value="year" {{ request()->group == "year"  ? "selected" : "" }}> Year </option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-4 pt-2 ">
                                        <button type="submit" class="btn btn-info"><i data-feather='search'></i>{{ __('Show') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row match-height">
                    <div class="col-lg-12 col-12">
                        <div class="row match-height">
                            <!-- Earnings Card -->
                            <div class="col-lg-6 col-md-3 col-6">
                                <div class="card earnings-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="card-title mb-1">Avergae of purchases value</h4>
                                                <div class="font-small-4">per {{ request()->group }}</div>
                                                <h5 class="mb-1">{{ $pruchase_average }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Earnings Card -->
                            <!-- Earnings Card -->
                            <div class="col-lg-6 col-md-3 col-6">
                                <div class="card earnings-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <h4 class="card-title mb-1">average Orders</h4>
                                                <div class="font-small-2">per {{ request()->group }}</div>
                                                <h5 class="mb-1">{{ $order_average }}</h5>
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
                </div>
                
                <div class="card-header">
                    <h4 class="mb-0">{{ __('Purchases and orders statistics') }}</h4>
                </div>
                <div class="col-lg-12 col-12">
                    <div class="card card-company-table">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            @if(request()->group == "year" || request()->group == "month" || request()->group == "id")
                                            <th>Year</th>
                                            @endif
                                            @if(request()->group == "month" || request()->group == "id")
                                            <th>Month</th>
                                            @endif
                                            @if(request()->group == "id")
                                            <th>Day</th>
                                            @endif
                                            <th>Purchase Amounts</th>
                                            <th>Orders Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($purchases_per_month as $purchase)
                                            <tr>
                                                @if(request()->group == "year" || request()->group == "month" || request()->group == "id")
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <div class="fw-bolder">
                                                                {{ $purchase->year }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                @endif
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
                                                @if(request()->group == "month" || request()->group == "id")
                                                <td class="text-nowrap">
                                                    <div class="d-flex flex-column">
                                                        <span class="fw-bolder mb-25">{{ $purchase->month }}</span>
                                                    </div>
                                                </td>
                                                @endif
                                                
                                                <!-- <td>{{ $purchase->purchases_value }}</td> -->
                                                @if(request()->group == "id")
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="fw-bolder me-1">{{ $purchase->day }}</span>
                                                    </div>
                                                </td>
                                                @endif
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="fw-bolder me-1">{{ $purchase->purchases_value }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="fw-bolder me-1">{{ $purchase->orders_count }}</span>
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
                <div class="card-header">
                    <h4 class="mb-0">{{ __('company Login Logs') }}</h4>
                </div>
                <div class="col-lg-12 col-12">
                    <div class="card card-company-table">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Customer ID</th>
                                            <th>Email</th>
                                            <th>Name</th>
                                            <th>Last Login</th>
                                            <th>Number Of Logins</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userLoginLogs as $log)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <div class="fw-bolder">
                                                                {{ $log['id'] }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-nowrap">
                                                    <div class="d-flex flex-column">
                                                        <span class="fw-bolder mb-25">{{ $log['email'] }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="fw-bolder me-1">{{ $log['name'] }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="fw-bolder me-1">{{ $log['numLogin'] == 0 ? "______" :date("Y-m-d",$log['lastLogin']/1000) }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="fw-bolder me-1">{{ $log['numLogin'] }}</span>
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
            </div>
        </div>
    </div>
@stop
@section('page-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script>
        $('#multiple-select-clear-field').select2( {
            dropdownAutoWidth: true,
            dropdownParent: $('#multiple-select-clear-field').parent(),
            width: '100%',
            containerCssClass: 'select-lg'
        } );
    </script>
@endsection
@push('scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <!-- END: Page Vendor JS-->
    <script>
        $(document).ready(function() {
            $('.delete-this').on('click', function() {
                var id = ($(this).val());
                Swal.fire({
                    title: "{{ __('Are you sure?') }}",
                    text: "{{ __('You wont be able to revert this!') }}",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "{{ __('Yes, delete it!') }}",
                    confirmButtonClass: 'btn btn-primary',
                    cancelButtonClass: 'btn btn-danger ml-1',
                    cancelButtonText: "{{ __('Cancel') }}",
                    buttonsStyling: false,
                }).then(function(result) {
                    if (result.value) {
                        Swal.fire({
                            type: "success",
                            title: 'Deleted!',
                            text: 'Your file has been deleted.',
                            confirmButtonClass: 'btn btn-success',
                        })
                        document.getElementById('destroy-order_status_' + id).submit();
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            title: "{{ __('Cancelled') }}",
                            text: "{{ __('Your data is safe :)') }}",
                            type: 'error',
                            confirmButtonClass: 'btn btn-success',
                        })
                    }
                })
            });
        });
    </script>
    @if (Session::has('message'))
        <script>
            Swal.fire({
                position: 'top-end',
                type: 'success',
                html: '{!! session('message') !!}',
                showConfirmButton: false,
                timer: 3000,
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
        </script>
    @endif
@endpush
 