@php $titlePage = __('Dimensions') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')

    <form action="{{route('dimensions.update')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <input type="hidden" name="id" value="{{$dimensions['id']}}">
                <input type="hidden" name="deleted" value="{{$dimensions['deleted']}}">
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('name') }}</label>
                    <input type="text" name="name" placeholder="name" class="form-control" value="{{$dimensions['name']}}">
                </div>
                <br>
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('arabic name') }}</label>
                    <input type="text" name="nameAr" value="{{$dimensions['nameAr']}}" placeholder="arabic name" class="form-control">
                </div>
                <br>

                <button type="submit" class="btn btn-primary form-control" >{{ __('update') }}</button>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>

        </div>
    </form>

@stop
