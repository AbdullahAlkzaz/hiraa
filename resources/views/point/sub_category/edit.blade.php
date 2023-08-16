@php $titlePage = __('Sub Category') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')
    <form action="{{route('sub-category.update')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <input type="hidden" name="id" value="{{$subcategory['id']}}">
                <input type="hidden" name="deleted" value="{{$subcategory['deleted']}}">
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('name') }}</label>
                    <input type="text" name="subCategoryName" value="{{$subcategory['subCategoryName']}}" placeholder="name" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('arabic name') }}</label>
                    <input type="text" name="subcategoryNameAr" value="{{$subcategory['subcategoryNameAr']}}" placeholder="arabic name" class="form-control">
                </div>
                <br>

                <div class="form-group">
                    <label class="input-label" for="exampleFormControlInput1">{{ __('Main Category (parent)') }}</label>
                    <select class="form-select" aria-label="service" name="mainCategoryId">
                        <option selected value="{{$mainCategory['id']}}">{{$mainCategory['mainCategoryName']}}</option>

                    @foreach($categories as $category)
                            <option  value="{{$category['id']}}">{{$category['mainCategoryName']}}</option>
                        @endforeach
                    </select>
                </div>
                <br>

                <button type="submit" class="btn btn-primary form-control" >{{ __('update') }}</button>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>

        </div>
    </form>

@stop
