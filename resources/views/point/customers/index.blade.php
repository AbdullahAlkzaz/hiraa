@extends('layouts.app')
@section('title', __('Customers'))
@section('page-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection
@section('content')
    @unless(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('Customers'))
  <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('Customers') }}</h4>
                </div>
                <div class="card-content">
                    <div class="table-responsive mt-1">
                        <table class="table table-hover-animation mb-0">
                            <thead>
                                <tr>
                                    <td>Customer ID</td>
                                    <td>Customer Name</td>
                                    <td>Customer Arabic Name</td>
                                    <td>Customer Subscribers</td>
                                    <!-- <td>Customer Subscriptions</td> -->
                                    <td>Customer Branches</td>
                                    <td>Created</td>
                                    <td>Status</td>
                                    <td>Country</td>
                                    <td colspan="2"></td>
                                </tr>
                            </thead>
                            @if ($customers)
                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $customer['id'] }}</td>
                                            <td>{{ $customer['name'] }}</td>
                                            <td>{{ $customer['nameAr'] }}</td>
                                            <td><button class="btn btn-primary" onclick="showSubscribers({{json_encode(isset($customer['subscribers']) ? $customer['subscribers'] : [])}})">Show Subscribers</button></td>
                                            <!-- <td><button class="btn btn-primary" onclick="showSubscriptions({{json_encode(isset($customer['subscriptions']) ? $customer['subscriptions'] : [])}})">Show Subscriptions</button></td> -->
                                            <td><button class="btn btn-primary" onclick="showBranches({{json_encode(isset($customer['branches']) ? $customer['branches'] : [])}}, {{json_encode($customerCountries)}})">Show Branches</button></td>
                                            <td>{{ date('d-m-Y', $customer['created'] / 1000)}}</td>
                                            <td>{{ $customer['status'] }}</td>
                                            <td>{{ $customerCountries[$customer['countryId']] }}</td>
                                            <td colspan="2">
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-primary dropdown-toggle"
                                                        type="button"
                                                        id="dropdownMenuButton"
                                                        data-bs-toggle="dropdown"
                                                        aria-expanded="false"
                                                    >
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('customer.orders',[$customer['id']]) }}">Customer Orders</a>
                                                        <a class="dropdown-item" href="{{ route('customer.sales',[$customer['id'], $customer['name']]) }}">Customer sales</a>
                                                        <a class="dropdown-item" href="{{ route('customer.most.purchased',[$customer['id'], $customer['name']]) }}">Customer Most Purchased Items</a>
                                                        <a class="dropdown-item" href="{{ route('customer.quotations',[$customer['id'], $customer['name']]) }}">Custome Quotations</a>
                                                        <a class="dropdown-item" href="{{ route('customer.profile',[$customer['id'], $customer['name']]) }}">Profile and Purchase Statistics</a>
                                                        <a class="dropdown-item" href="{{ route('customer.invoices',[$customer['id'], $customer['name']]) }}">Customer Invoices</a>
                                                        <a class="dropdown-item" href="{{ route('customer.transactions',[$customer['id'], $customer['name']]) }}">Customer Wallet Transactions</a>
                                                        <a class="dropdown-item" href="{{ route('customer.sellers',[$customer['id'], $customer['name']]) }}">Customer Top Sellers</a>
                                                        <a class="dropdown-item" href="{{ route('customer.most.brands',[$customer['id'], $customer['name']]) }}">Customer Most Purchased Brands</a>
                                                        <a class="dropdown-item" href="{{ route('customer.purchasesOffers',[$customer['id'], $customer['name']]) }}">Purchases Offers Statistics</a>
                                                        <a class="dropdown-item" href="{{ route('customer.shipments',[$customer['id'], $customer['name']]) }}">shipments</a>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="9">{{ ($customers->links('pagination::bootstrap-5')) }} </td>
                                    </tr>
                                </tfoot>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="modal fade" id="subscribersModel" tabindex="-1" aria-labelledby="shareProjectTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-sm-5 mx-50 pb-4">
                        <h1 class="text-center mb-1" id="shareProjectTitle">Company Subscribers</h1>
                        <div class="table-responsive mt-1">
                            <table class="table table-hover-animation mb-0">
                                <thead>
                                    <tr>
                                        <td style='text-align:center;'>Name</td>
                                        <td style='text-align:center;'>Email</td>
                                        <td style='text-align:center;'>Mobile</td>
                                        <td style='text-align:center;'>Status</td>
                                    </tr>
                                </thead>
                                    <tbody id="subscribers-container">
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="modal fade" id="branchesModel" tabindex="-1" aria-labelledby="shareProjectTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-sm-5 mx-50 pb-4">
                        <h1 class="text-center mb-1" id="shareProjectTitle">Company Branches</h1>
                        <div class="table-responsive mt-1">
                            <table class="table table-hover-animation mb-0">
                                <thead>
                                    <tr>
                                        <td style='text-align:center;'>Name</td>
                                        <td style='text-align:center;'>Country</td>
                                        <td style='text-align:center;'>Latitude</td>
                                        <td style='text-align:center;'>Longitude</td>
                                        <td style='text-align:center;'>Status</td>
                                    </tr>
                                </thead>
                                    <tbody id="branches-container">
                                    </tbody>
                            </table>
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
        function showSubscribers(subscribers){
            var html = '';
            for(let i = 0; i < subscribers.length; i++){
                html += "<tr>";
                html += "<td style='text-align:center;'>" + subscribers[i].name + "</td>";
                html += "<td style='text-align:center;'>" + subscribers[i].email + "</td>";
                html += "<td style='text-align:center;'>" + subscribers[i].mobile + "</td>";
                html += "<td style='text-align:center;'>" + subscribers[i].status + "</td>";
                html += "</tr>";

            }
            $("#subscribers-container").html(html);
            html = '';
            $("#subscribersModel").modal('show');
        }
        // function showSubscriptions(subscribers){
        //     var html = '';
        //     for(let i = 0; i < subscribers.length; i++){
        //         html += "<td style='text-align:center;'>" + subscribers[i].productId + "</td>";
        //         html += "<td style='text-align:center;'>" + subscribers[i].name + "</td>";
        //         html += "<td style='text-align:center;'>" + subscribers[i].brandName + "</td>";
        //         html += "<td style='text-align:center;'>" + subscribers[i].unitPrice + "</td>";
        //     }
        //     $("#subscribers-container").html(html);
        //     html = '';
        //     $("#subscribersModel").modal('show');
        // }
        function showBranches(subscribers, customerCountries){
            var html = '';
            console.log("countries",(customerCountries));
            for(let i = 0; i < subscribers.length; i++){
                html += "<tr>";
                html += "<td style='text-align:center;'>" + subscribers[i].name + "</td>";
                html += "<td style='text-align:center;'>" + customerCountries[subscribers[i].countryId] + "</td>";
                html += "<td style='text-align:center;'>" + subscribers[i].latitude + "</td>";
                html += "<td style='text-align:center;'>" + subscribers[i].longiude + "</td>";
                html += "<td style='text-align:center;'>" + subscribers[i].status + "</td>";
                html += "</tr>";

            }
            $("#branches-container").html(html);
            html = '';
            $("#branchesModel").modal('show');
        }
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
