@extends('layouts.app')

@section('title', __('Supplires Pending Orders Report'))

@push('style')
@endpush
@section('content')
    @include('QVM.orders_reports.search.search')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('Pending Orders Report') }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-datatable table-responsive mt-1 px-2">
                    <div class="card-body">
                        <div id="payment_method_purchase_orders"></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection`
@section('page-script')
<script src="{{ asset(mix('js/scripts/charts/chart-apex.js')) }}"></script>
    <script>
        var months = [];
        var options_series = [];
        let series_data = [];
        @foreach($statistics as $key => $element)
        months.push('{{ $key }}')
        @endforeach
        @foreach($payments as $key => $payment)
            @foreach($statistics as $key1 => $element)
                @if($key == $element->payment_method_id)
                    for(let i=0; i < months.length; i++){
                        if(months[i] == "{{$key1}}"){
                            series_data.push("{{ $element->completed_total }}")
                        }else{
                            series_data.push(0)
                        }
                    }
                @endif
            @endforeach
            options_series.push({
                name:"{{$payment}}",
                data: series_data
            })
            series_data = [];
        @endforeach
        var options = {
          series: options_series,
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: true
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: months,
        },
        yaxis: {
          title: {
            text: '$ (thousands)'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "$ " + val + " thousands"
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#payment_method_purchase_orders"), options);
        chart.render();
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
