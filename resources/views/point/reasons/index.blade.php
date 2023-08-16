@php $titlePage = __('Return reasons') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')
    <div>
        <div class="row">
            <div>
                <a href="{{ url('reasons-crud/create') }}"
                   class="btn btn-info mr-1 mb-1 btn-sm"><i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive mt-1">
        <table class="table table-hover-animation mb-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Reason</th>
                <th>delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($reasons as $key=> $reason)
                <tr>
                    <td>{{$key + 1 }}</td>
                    <td>{{ $reason['reason'] }}</td>
                    <td>
                        <form action="{{ route('reasons-crud.destroy', $reason['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this return reason?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop
