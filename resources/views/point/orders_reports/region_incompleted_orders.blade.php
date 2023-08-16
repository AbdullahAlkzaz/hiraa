@extends('layouts.app')

@section('title', __('Incompleted Orders Report'))

@push('style')
@endpush
@section('content')
    @include('QVM.orders_reports.search.search')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('Incompleted Orders Report') }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-datatable table-responsive mt-1 px-2">
                        <table class="table table-hover-animation mb-0" id="region_orders">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('region') }}</th>
                                    <th>{{ __('Orders Count') }}</th>
                                    <th>{{ __('Incompleted Percentage') }}</th>
                                    <th>{{ __('Orders total') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($statistics as $detail)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $cities[$detail->city_id]}}</td>
                                        <td>{{ $detail->incompleted_count }}</td>
                                        <td>{{ $detail->incompleted_count/ $detail->incompleted_count * 100 }}%</td>
                                        <td>{{ $detail->incompleted_total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('page-script')
    <script>
        $("#region_orders").DataTable({
            dom: 'Bfrtip',
            buttons: [
                { extend: 'copy', className: 'btn btn-primary' },
                { extend: 'excel', className: 'btn btn-primary' },
                { extend: 'csv', className: 'btn btn-primary' },
                { extend: 'pdf', className: 'btn btn-primary' },
                // 'copyHtml5',
                // 'excelHtml5',
                // 'csvHtml5',
                // 'pdfHtml5'
            ]
        });
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
                        document.getElementById('destroy-order_' + id).submit();
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
    <script type="text/javascript">
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
@endpush
