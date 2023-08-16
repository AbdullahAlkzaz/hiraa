@extends('layouts.app')
@section('title', __('Customer Companies'))
@section('page-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('Customer Companies') }}</h4>
                </div>
                <div class="card-content">
                    <div class="table-responsive mt-1">
                        <table class="table table-hover-animation mb-0">
                            <thead>
                                <tr>
                                    <td>Company ID</td>
                                    <td>Company Name</td>
                                    <td>Company Arabic Name</td>
                                    <td>#deals</td>
                                    <td>Created</td>
                                    <td>Status</td>
                                    <td>Country</td>
                                    <td colspan="2"></td>
                                </tr>
                            </thead>
                            @if ($sellers)
                                <tbody>
                                    @foreach ($sellers as $company)
                                        <tr>
                                            <td>{{ $company['id'] }}</td>
                                            
                                            <td>
                                                <a href="{{ route('company_dashboard', $company['id']) }}">
                                                    {{ $company['name'] }}</a>
                                            </td>

                                            <td>{{ $company['nameAr'] }}</td>
                                            <td>{{ $company['sellers_count'] }}</td>
                                            
                                            <td>{{ date('d-m-Y', $company['created'] / 1000) }}</td>
                                            <td>{{ $company['status'] }}</td>
                                            <td>{{ $companiesCountries[$company['countryId']] }}</td>
                                            <td colspan="2">
                                                <a class="btn btn-primary"  href="{{ route('company_products' ,   $company['id'] )}}" > 
                                                    Products 
                                                </a>
                                                <a class="btn btn-success"  href="{{ route('company_dashboard' ,   $company['id'] )}}" > 
                                                    <i data-feather='eye'></i> 
                                                </a>
        
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
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
 