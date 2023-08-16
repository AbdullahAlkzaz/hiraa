@php $titlePage = __('Unit') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')

    <div>
        <div class="row">
            <div>
                <a href="{{ url('unit/create') }}"
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
                <th>My options</th>
            </tr>
            @foreach ($units as $key => $unit)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $unit['nameAr'] }}</td>
                    <td>{{ $unit['name'] }}</td>
                    <td>
                        <a href="{{ url('unit/'.$unit['id']) }}"
                           class="btn btn-danger mr-1 mb-1 btn-sm"><i class="fa fa-trash"></i>
                        </a>
                        <a href="{{ url('unit/edit/'.$unit['id']) }}"
                           class="btn btn-warning mr-1 mb-1 btn-sm"><i class="fa fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@stop
