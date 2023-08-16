@extends('layouts.app')
@section('title', __('Quotations For') . " " . $customer_name)
@section('page-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('Quotations') }}</h4>
                </div>
                <div class="card-content">
                    <div class="table-responsive mt-1">
                        <table class="table table-hover-animation mb-0">
                            <thead>
                                <tr>
                                    <td>Quotation ID</td>
                                    <td>Customer Name</td>
                                    <td>Delivery Charge</td>
                                    <td>Items</td>
                                    <td>Transaction Type</td>
                                    <td>Payment Method</td>
                                    <td>Invoice Number</td>
                                </tr>
                            </thead>
                            @if ($quotations)
                                <tbody>
                                    @foreach ($quotations as $quotation)
                                        <tr>
                                            <td>{{ $quotation['id'] }}</td>
                                            <td>{{ $customer_name }}</td>
                                            <td>{{ $quotation['deliveryCharge'] }}</td>
                                            <td><button class="btn btn-primary" onclick="showProducts({{json_encode(isset($quotation['items'][0]) ? $quotation['items'][0]['stockProduct'] : [])}})">Show Item</button></td>
                                            <td>{{ $quotation['transactionType'] }}</td>
                                            <td>{{ $quotation['paymentMethod'] }}</td>
                                            <td>{{ $quotation['invoiceNumber'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="9">{{ ($quotations->links('pagination::bootstrap-5')) }} </td>
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
        <div class="modal fade" id="shareProject" tabindex="-1" aria-labelledby="shareProjectTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-sm-5 mx-50 pb-4">
                        <h1 class="text-center mb-1" id="shareProjectTitle">Quotation Item</h1>
                        <div class="table-responsive mt-1">
                            <table class="table table-hover-animation mb-0">
                                <thead>
                                    <tr>
                                        <td>Product ID</td>
                                        <td>Product Name</td>
                                        <td>Brand Name</td>
                                        <td>Unit Price</td>
                                    </tr>
                                </thead>
                                    <tbody id="items-container">
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
        function showProducts(item){
            var html = '';
            html += "<td style='text-align:center;'>" + item.productId + "</td>";
            html += "<td style='text-align:center;'>" + item.name + "</td>";
            html += "<td style='text-align:center;'>" + item.brandName + "</td>";
            html += "<td style='text-align:center;'>" + item.unitPrice + "</td>";
            $("#items-container").html(html);
            html = '';
            $("#shareProject").modal('show');
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
 
 