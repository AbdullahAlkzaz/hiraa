@php $titlePage = __('Permissions') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')

    <div>
        <div class="row">
            @if (session('message'))
                <div class="alert alert-info">
                    {{ session('message') }}
                </div>
            @endif
            <div>
                <a href="{{ url('permissions/create') }}"
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

                <th>My options</th>
            </tr>
            @foreach ($permissions as $key => $permission)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $permission['name'] }}</td>

                    <td>
                        <a href="{{ url('/delete/permission/'.$permission['id']) }}"
                           class="btn btn-danger mr-1 mb-1 btn-sm"><i class="fa fa-trash"></i>
                        </a>
                        <a href="{{ url('/attach/permission/'.$permission['id']) }}"
                           class="btn btn-danger mr-1 mb-1 btn-sm"><i class="fa fa-eye"></i>
                        </a>
                        {{--                        <a href="{{ url('permission/edit/'.$permission['id']) }}"--}}
                        {{--                           class="btn btn-warning mr-1 mb-1 btn-sm"><i class="fa fa-edit"></i>--}}
                        {{--                        </a>--}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@stop
