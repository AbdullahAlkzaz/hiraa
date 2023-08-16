@php $titlePage = __('Roles') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')
    @unless(auth()->user()->hasRole('admin'))
  <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless
    <div>
        <div class="row">
            @if (session('message'))
                <div class="alert alert-info">
                    {{ session('message') }}
                </div>
            @endif
            <div>
                <a href="{{ url('roles/create') }}"
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
            @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $role['name'] }}</td>

                    <td>
                        <a href="{{ url('/delete/roles/'.$role['id']) }}"
                           class="btn btn-danger mr-1 mb-1 btn-sm"><i class="fa fa-trash"></i>
                        </a>
                        <a href="{{ url('roles/edit/'.$role['id']) }}"
                           class="btn btn-warning mr-1 mb-1 btn-sm"><i class="fa fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@stop
