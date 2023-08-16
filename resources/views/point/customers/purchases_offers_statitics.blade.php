@extends('layouts.app')
@section('title', __('Customer Purchases Offers Statistics'))
@section('page-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection
@section('content')
    <div class="row match-height">
        <div class="col-lg-12 col-12">
            <div class="row match-height">
                <!-- Earnings Card -->
                <div class="col-lg-6 col-md-3 col-6">
                    <div class="card earnings-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="card-title mb-1">#Special Offers Purchases</h4>
                                    <h5 class="mb-1">{{ $puchasesStatistics->is_offer_count }}</h5>
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
                                    <h4 class="card-title mb-1">#Direct Purchases</h4>
                                    <h5 class="mb-1">{{ $puchasesStatistics->not_offer_count }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Earnings Card -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('Brands') }}</h4>
                </div>
                <div class="card-content">
                    <div class="table-responsive mt-1">
                        <table class="table table-hover-animation mb-0">
                            <thead>
                                <tr>
                                    <td>Product ID</td>
                                    <td>Order Number</td>
                                    <td>Product Name</td>
                                    <td>Brand Class Name</td>
                                    <td>#Is Offer?</td>
                                </tr>
                            </thead>
                            @if ($products)
                                <tbody>
                                    @foreach ($products as $key => $product)
                                        @if(isset($product->product))
                                        <tr>
                                            <td>{{ $product->product['productId'] }}</td>
                                            <td>{{ $product->purchase_order_id }}</td>
                                            
                                            <td>
                                                    {{ $product->product['name'] }}</a>
                                            </td>

                                            <td>{{ $product->product['brandClassName'] }}</td>
                                            @if($product->offer_detail_id)
                                            <td><span class="btn btn-success">Offer</span></td>
                                            @else
                                            <td><span class="btn btn-danger">Not Offer</span></td>
                                            @endif
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="9">{{ ($products->links('pagination::bootstrap-5')) }} </td>
                                    </tr>
                                </tfoot>
                            @endif
                        </table>
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
 