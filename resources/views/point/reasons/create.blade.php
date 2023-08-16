@php $titlePage = __('Create new reason') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')
    <form action="{{route('reasons-crud.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label class="input-label" for="reason">{{ __('reason') }}</label>
                    <input type="text" name="reason" placeholder="reason" class="form-control">
                </div>
                <br>
                <button type="submit" class="btn btn-primary form-control" >{{ __('save') }}</button>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>

        </div>
    </form>

@stop
