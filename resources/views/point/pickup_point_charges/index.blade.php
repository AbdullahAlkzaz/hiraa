@php $titlePage = __('pickup charge') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')

    <div>
        <div class="row">
            <div>
                <a href="{{ url('pickup-charge/create') }}"
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
                <th>{{ __('from city ') }}</th>
                <th>{{ __('to city') }}</th>
                <th>{{ __('to pickup point') }}</th>
                <th>{{ __('charge_cost') }}</th>
                <th>{{ __('old cost') }}</th>
                <th>{{ __('delivery time') }}</th>
                <th>{{ __('tier') }}</th>
                <th>{{ __('note') }}</th>
                <th>My options</th>
            </tr>
            @if(count($pickupCharges)>0)
                @foreach ($pickupCharges as $key => $pickupCharge)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        @foreach($cities as $city)
                            @if($city['id'] == $pickupCharge['from_city'] )
                                <td>{{ $city['name'] }}</td>
                            @endif
                        @endforeach

                        @foreach($cities as $city)
                            @if($city['id'] == $pickupCharge['to_city'] )
                                <td>{{ $city['name'] }}</td>

                            @endif
                        @endforeach
                        <td>{{ $allPickupPoints[$pickupCharge['to_pickup_point']]  }}</td>
                        <td>{{ $pickupCharge['charge_cost']}}</td>
                        <td>{{ $pickupCharge['old_cost'] }}</td>
                        <td>{{ $pickupCharge['delivery_time'] }}</td>
                        <td>{{ $pickupCharge['tier'] }}</td>
                        <td>{{ $pickupCharge['note'] }}</td>
                        <td>
                            <a href="{{ url('pickup-charge/'.$pickupCharge['id']) }}"
                               class="btn btn-danger mr-1 mb-1 btn-sm"><i class="fa fa-trash"></i>
                            </a>
                            <a href="{{ url('pickup-charge/edit/'.$pickupCharge['id']) }}"
                               class="btn btn-warning mr-1 mb-1 btn-sm"><i class="fa fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>

@stop

