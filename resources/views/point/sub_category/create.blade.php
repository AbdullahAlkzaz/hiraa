@php $titlePage = __('Sub Category') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')
    <form action="{{route('sub-category.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('name') }}</label>
                    <input type="text" name="subCategoryName" placeholder="name" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('arabic name') }}</label>
                    <input type="text" name="subcategoryNameAr" placeholder="arabic name" class="form-control">
                </div>
                <br>

                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('Main Category (parent)') }}</label>
                    <select class="form-select" aria-label="service" name="mainCategoryId">
                        @foreach($categories as $category)
                        <option selected value="{{$category['id']}}">{{$category['mainCategoryName']}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary form-control" >{{ __('save') }}</button>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>

        </div>
    </form>

@stop
