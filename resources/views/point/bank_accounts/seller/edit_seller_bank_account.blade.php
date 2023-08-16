@php $titlePage = __('Edit Bank Account') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')
    <form action="{{route('seller_bank_account.update')}}" method="post">
        @csrf
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('failed'))
            <div class="alert alert-success">
                {{ session('failed') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <input type="hidden" name="id" value="{{$bankAccount['id']}}">
                <input type="hidden" name="companyId" value="{{$bankAccount['companyId']}}">
                <div class="form-group">
                    <label class="input-label" for="bankName">{{ __('bank name') }}</label>
                    <input type="text" name="bankName" placeholder="name" class="form-control" value="{{$bankAccount['bankName']}}">
                </div>
                <br>
                <div class="form-group">
                    <label class="input-label" for="description">{{ __('description') }}</label>
                    <input type="text" name="description" placeholder="description" class="form-control" value="{{$bankAccount['description']}}">
                </div>
                <br>

                <div class="form-group">
                    <label class="input-label" for="accountType">{{ __('account type') }}</label>
                    <input type="text" name="accountType" placeholder="accountType" class="form-control" value="{{$bankAccount['accountType']}}">
                </div>
                <br>

                <div class="form-group">
                    <label class="input-label" for="accountName">{{ __('account name') }}</label>
                    <input type="text" name="accountName" placeholder="accountName" class="form-control" value="{{$bankAccount['accountName']}}">
                </div>
                <br>

                <div class="form-group">
                    <label class="input-label" for="accountName">{{ __('account key') }}</label>
                    <input type="text" name="accountKey" placeholder="accountKey" class="form-control" value="{{$bankAccount['accountKey']}}">
                </div>
                <br>

                <div class="form-group">
                    <label class="input-label" for="accountName">{{ __('currency type') }}</label>
                    <input type="text" name="currencyType" placeholder="currencyType" class="form-control" value="{{$bankAccount['currencyType']}}">
                </div>
                <br>
                <button type="submit" class="btn btn-primary form-control" >{{ __('update') }}</button>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>

        </div>
    </form>

@stop
