@php $titlePage = __('Permissions') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')
    <form action="{{route('permissions.store')}}" method="post">
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
                    <input type="text" name="name" placeholder="name" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('information') }}</label>
                    <input type="text" name="info" placeholder="information about role" class="form-control">
                </div>
                <br>

                <button type="submit" class="btn btn-primary form-control" >{{ __('save') }}</button>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>

        </div>
    </form>

@stop
