@php $titlePage = __('Attach permissions') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')
    <form action="{{route('permissions.attach')}}" method="post">
        @csrf
        <div class="row">
            <center>
                <h5>
                    attach permission
                </h5>
            </center>
        </div>
        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <input type="hidden" name="permission_id" id="permission_id" value="{{$permission->id}}">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <br>
                    <select name="role_id" class="form-control">
                        @foreach($roles as $choosenRole)
                            <option value="{{$choosenRole->id}}" >{{$choosenRole->name}}</option>
                        @endforeach
                    </select>
                <br>

                <button type="submit" class="btn btn-primary form-control" >{{ __('save') }}</button>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>

        </div>
    </form>
    <br>
    <hr>
    <br>
    <form action="{{route('permissions.detach')}}" method="post">
        @csrf
        <div class="row">
            <center>
                <h5>
                    detach permission
                </h5>
            </center>
        </div>
        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <input type="hidden" name="permission_id" id="permission_id" value="{{$permission->id}}">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                @if (session('message2'))
                    <div class="alert alert-success">
                        {{ session('message2') }}
                    </div>
                @endif
                <br>
                <select name="role_id" class="form-control">
                    @foreach($roles as $choosenRole)
                        <option value="{{$choosenRole->id}}" >{{$choosenRole->name}}</option>
                    @endforeach
                </select>
                <br>

                <button type="submit" class="btn btn-primary form-control" >{{ __('save') }}</button>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>

        </div>
    </form>
@stop
