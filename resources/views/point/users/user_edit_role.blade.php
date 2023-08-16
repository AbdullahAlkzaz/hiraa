@php $titlePage = __('Edit user Role') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')
    <form action="{{route('user.update.role')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <input type="hidden" name="user_id" value="{{$user['id']}}">
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('Roles') }}</label>
                    <div class="input-group input-group-merge ">
                        <select name="roleId[]" id="roleId" class="form-control form-control-merge" multiple>
                            @foreach($allRoles as  $role)
                                <option value="{{$role->id}}" {{ in_array($role->id, $selectedRoles) ? 'selected' : '' }}>{{$role->name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary form-control" >{{ __('update') }}</button>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>

        </div>
    </form>

@stop
