@php $titlePage = __('Sub Category') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')
    <div>
        <div class="row">
            <div>
                <a href="{{ url('sub-category/create') }}"
                   class="btn btn-info mr-1 mb-1 btn-sm"><i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive mt-1">
        <table class="table table-hover-animation mb-0">
            <tr>
                <th>#</th>
                <th>{{ __('Sub category name') }}</th>
                <th>{{ __('Sub category name arabic') }}</th>
                <th>{{ __('Service') }}</th>
                <th>My options</th>
            </tr>
            @foreach ($categories as $key => $category)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $category->subCategoryName }}</td>
                    <td>{{ $category->subcategoryNameAr }}</td>
                    <td>{{ $category->mainCategoryId }}</td>
                    <td>
                        <a href="{{ url('sub-category/'.$category->id) }}"
                           class="btn btn-danger mr-1 mb-1 btn-sm"><i class="fa fa-trash"></i></a>
                        <a href="{{ url('sub-category/edit/'.$category->id) }}"
                           class="btn btn-warning mr-1 mb-1 btn-sm"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@stop
