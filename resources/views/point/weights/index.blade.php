@php $titlePage = __('Weights') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')

    <div>
        <div class="row">
            <div>
                <a href="{{ url('weight/create') }}"
                   class="btn btn-info mr-1 mb-1 btn-sm"><i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive mt-1">
        <table class="table table-hover-animation mb-0">
            <tr>
                <th>#</th>
                <th>{{ __('name') }}</th>
                <th>{{ __('name arabic') }}</th>
                <th>{{ __('shipping weight') }}</th>
                <th>My options</th>
            </tr>
            @foreach ($weights as $key => $weight)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $weight['nameAr'] }}</td>
                    <td>{{ $weight['name'] }}</td>
                    <td>{{ $weight['shippingWeight'] ?? "-" }}</td>
                    <td>
                        <a href="{{ url('weight/'.$weight['id']) }}"
                           class="btn btn-danger mr-1 mb-1 btn-sm"><i class="fa fa-trash"></i>
                        </a>
                        <a href="{{ url('weight/edit/'.$weight['id']) }}"
                           class="btn btn-warning mr-1 mb-1 btn-sm"><i class="fa fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@stop
