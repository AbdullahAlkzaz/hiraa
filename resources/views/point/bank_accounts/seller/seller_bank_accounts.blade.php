@php $titlePage = __('Bank Accounts') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')


    <div class="table-responsive mt-1">
        <table class="table table-hover-animation mb-0">
            <tr>
                <th>#</th>
                <th>{{ __('Bank Name') }}</th>
                <th>{{ __('Description') }}</th>
                <th>{{ __('Account Type') }}</th>
                <th>{{ __('Account Name') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
            @foreach ($supplierBankAccounts as $key => $supplierBankAccount)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $supplierBankAccount['bankName'] }}</td>
                    <td>{{ $supplierBankAccount['description'] }}</td>
                    <td>{{ $supplierBankAccount['accountType'] }}</td>
                    <td>{{ $supplierBankAccount['accountName'] }}</td>
                    <td>
                        <a href="{{ route('supplier_bank_accounts.edit', $supplierBankAccount['id']) }}"
                           class="btn btn-success mr-1 mb-1 btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('supplier_bank_accounts.delete',  $supplierBankAccount['id']) }}"
                           class="btn btn-outline-danger mr-1 mb-1 btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@stop
