@php $titlePage = __('Main Category') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')
    <form action="{{route('main-category.update')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <input type="hidden" name="id" value="{{$mainCategory['id']}}">
                <input type="hidden" name="deleted" value="{{$mainCategory['deleted']}} ">
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('name') }}</label>
                    <input type="text" name="mainCategoryName" placeholder="name" class="form-control" value="{{$mainCategory['mainCategoryName']}}">
                </div>
                <br>
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('arabic name') }}</label>
                    <input type="text" name="mainCategoryNameAr" value="{{$mainCategory['mainCategoryNameAr']}}" placeholder="arabic name" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('Is it service?') }}</label>
                    <select class="form-select" aria-label="service" name="isService">
                        <option selected value="{{$mainCategory['isService']}}">{{ $mainCategory['isService'] ? "yes" : "no" }}</option>
                        <option  value="true">Yes</option>
                        <option value="false">No</option>
                    </select>
                </div>
                <br>

                <button type="submit" class="btn btn-primary form-control" >{{ __('update') }}</button>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>

        </div>
    </form>

@stop
