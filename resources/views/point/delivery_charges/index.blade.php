@php $titlePage = __('Delivery charge') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')

    <div>
        <div class="row">
            <div>
                <a href="{{ url('delivery-charge/create') }}"
                   class="btn btn-info mr-1 mb-1 btn-sm"><i class="fa fa-plus"></i>
                </a>
            </div>
            @if(isset($message))
            <div>
                <center><div class="btn btn-outline-warning">{{$message}}</div></center>
            </div>
            @endif
        </div>
    </div>
    <div class="table-responsive mt-1">
        <table class="table table-hover-animation mb-0">
            <tr>
                <th>#</th>
                <th>{{ __('from city (supplier)') }}</th>
                <th>{{ __('to city (customer)') }}</th>
                <th>{{ __('tier') }}</th>
                <th>{{ __('duration') }}</th>
                <th>{{ __('cost before discount') }}</th>
                <th>{{ __('cost') }}</th>
                <th>{{ __('note') }}</th>
                <th>My options</th>
            </tr>
            @if(count($deliveryCharges)>0)
            @foreach ($deliveryCharges as $key => $deliveryCharge)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    @foreach($cities as $city)
                        @if($city['id'] == $deliveryCharge['from_city_supplier'] )
                    <td>{{ $city['name'] }}</td>
                        @endif
                    @endforeach

                    @foreach($cities as $city)
                        @if($city['id'] == $deliveryCharge['to_city_customer'] )
                            <td>{{ $city['name'] }}</td>
                        @endif
                    @endforeach

                    <td>{{ $deliveryCharge['tier'] }}</td>
                    <td>{{ $deliveryCharge['duration'] }}</td>
                    <td>{{ $deliveryCharge['cost_before_discount'] }}</td>
                    <td>{{ $deliveryCharge['cost'] }}</td>
                    <td>{{ $deliveryCharge['note'] }}</td>
                    <td>
                        <a href="{{ url('delivery-charge/'.$deliveryCharge['id']) }}"
                           class="btn btn-danger mr-1 mb-1 btn-sm"><i class="fa fa-trash"></i>
                        </a>
                        <a href="{{ url('delivery-charge/edit/'.$deliveryCharge['id']) }}"
                           class="btn btn-warning mr-1 mb-1 btn-sm"><i class="fa fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            @endif
        </table>
    </div>

@stop
@push('scripts')
    <script src="/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>

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

