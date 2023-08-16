@php $titlePage = __('Delivery points') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')



    <div class="row">
       <div class="col-lg-12">
           <a href="{{ route('cities.create.delivery.point', [$id,$city_name]) }}"
              class="btn btn-success mr-1 mb-1 btn-sm"><i class="fa fa-plus"></i></a>
       </div>


    </div>
    <div class="table-responsive mt-1">
        <table class="table table-hover-animation mb-0">
            <tr>
                <th>#</th>
                <th>{{ __('City name') }}</th>
                <th>{{ __('Point name') }}</th>
                <th>{{ __('Point address') }}</th>
                <th>{{ __('Point location') }}</th>
                <th>{{ __('Point working hours') }}</th>
                <th>{{ __('Point manager name') }}</th>
                <th>{{ __('Point manager phone') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
            @foreach ($delivery_points as $key => $delivery_point)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $delivery_point['city_name'] }}</td>
                    <td>{{ $delivery_point['point_name'] . " / "  . $delivery_point['point_name_ar']}}</td>
                    <td>{{ $delivery_point['point_address'] }}</td>
                    <td>{{ $delivery_point['point_location'] }}</td>
                    <td>{{ $delivery_point['point_working_hours'] }}</td>
                    <td>{{ $delivery_point['point_manager_name'] }}</td>
                    <td>{{ $delivery_point['point_manager_phone'] }}</td>
                    <td>
                        <a href="{{ route('cities.delete.delivery.point', $delivery_point['id']) }}"
                           class="btn btn-danger mr-1 mb-1 btn-sm"><i class="fa fa-trash"></i></a>

                        <a href="{{ route('cities.edit.delivery.point', $delivery_point['id']) }}"
                           class="btn btn-warning mr-1 mb-1 btn-sm"><i class="fa fa-pen"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@stop
@push('scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <!-- END: Page Vendor JS-->


@endpush
