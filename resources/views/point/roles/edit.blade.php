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
    <form action="{{route('roles.update')}}" method="post">
        @csrf
        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('name') }}</label>
                    <input type="text" name="name" placeholder="name" class="form-control" value="{{$role->name}}">
                    <input type="hidden" name="role_id" value="{{$role->id}}">
                </div>
                <br>
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('information') }}</label>
                    <input type="text" name="info" placeholder="information about role" class="form-control" value="{{$role->info ?? null}}">
                </div>
                <br>
                <div class="form-group">
                    <label for="permissions">Select Permissions:</label>
                    <br>
                    <div class="checkbox-group">
                        @foreach ($permissions as $permission)
                            @if ($loop->iteration % 3 == 1)
                                <div class="row">
                                    @endif
                                    <div class="form-check col-md-4">
                                        <input class="form-check-input" type="checkbox" id="permission-{{ $permission->id }}"
                                               name="permissions[]" value="{{ $permission->id }}"
                                               @if (in_array($permission->id, $selectedPermissions)) checked @endif
                                        >
                                        <label class="form-check-label" for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                    <br>
                                    @if ($loop->iteration % 3 == 0 || $loop->last)
                                </div>
                                <br>
                            @endif
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-primary form-control" >{{ __('save') }}</button>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>

        </div>
    </form>

@stop
