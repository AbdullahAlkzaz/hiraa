@extends('layouts.app')
@section('title', __('Most Purchased Products'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('Most Purchased Products For Customer ') .$customer_name }}</h4>
                </div>
                <div class="card-content">
                    <div class="table-responsive mt-1">
                        <table class="table table-hover-animation mb-0">
                            <thead>
                                <tr>
                                    <td>Product Number</td>
                                    <td>Product Name</td>
                                    <td>Product Arabic Name</td>
                                    <td>Brand Name</td>
                                    <td>Brand class Name</td>
                                    <td>Ordered Count</td>
                                    <td>Main Category Name</td>
                                    <td>subcategory Name</td>
                                    <td>Weight</td>
                                    <td>Dimension</td>
                                </tr>
                            </thead>
                            @if ($products)
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product['productNumber'] }}</td>
                                            
                                            <td>
                                                {{ $product['name'] }}</a>
                                            </td>

                                            <td>{{ $product['nameAr'] }}</td>
                                            
                                            <td>{{ $product['brandName'] }}</td>
                                            <td>{{ $product['brandClassName'] }}</td>
                                            <td>{{ $product['purchasesCount'] }}</td>
                                            <td>{{ $product['main_category_name'] }}</td>
                                            <td>{{ $product['subcategory_name'] }}</td>
                                            <td>{{ $product['weightName'] }}</td>
                                            <td>{{ $product['dimensionsName'] }}</td>
                                        </tr>
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
 