@php $titlePage = __('Weight') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')
    <form action="{{route('weight.update')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <input type="hidden" name="id" value="{{$weight['id']}}">
                <input type="hidden" name="deleted" value="{{$weight['deleted']}}">
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('name') }}</label>
                    <input type="text" name="name" placeholder="name" class="form-control" value="{{$weight['name']}}">
                </div>
                <br>
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('arabic name') }}</label>
                    <input type="text" name="nameAr" value="{{$weight['nameAr']}}" placeholder="arabic name" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('shipping weight') }}</label>
                    <input type="text" name="shippingWeight" value="{{$weight['shippingWeight']}}" placeholder="arabic name" class="form-control">
                </div>
                <br>

                <button type="submit" class="btn btn-primary form-control" >{{ __('update') }}</button>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>

        </div>
    </form>

@stop
