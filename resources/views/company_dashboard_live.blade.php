@extends('layouts/contentLayoutMaster')

@section('title', __("Tabby sales"))


@section('content')


    {{-- [{"companyView":{"name_ar":"Mina","name":"Mina","tabbyEnabled":true,"id":24},"totalTabbySales":62.37,"totalAllSales":475.3649999999999,"tabbyOrdereNum":3,"allOrderNum":20}, --}}

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('Tabby sales') }}</h4>
                </div>
                <div class="card-content">
                    <div class="table-responsive mt-1">
                        <table class="table table-hover-animation mb-0">
                            <thead>
                            <tr>

                                <th>{{ __('order number') }}</th>
                                <th>{{ __('customer code') }}</th>
                                <th>{{ __('customer name') }}</th>
                                <th>{{ __('created date') }}</th>
                                <th>{{ __('total') }}</th>
                                <th>{{ __('payment status') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($companies_tabby_sales as $key => $tabby_sale)
                                <tr>

                                    <td>{{ $tabby_sale['tabbyPaymentId'] }}</td>
                                    <td>{{ $tabby_sale['customer']['id']}}</td>
                                    <td>{{ $tabby_sale['customer']['nameAr'] }}  /  {{ $tabby_sale['customer']['name']  }}</td>
                                    <td>{{ date("d/m/Y", ($tabby_sale['created'])/1000 ) }}</td>
                                    <td>{{ $tabby_sale['total'] }}</td>
                                    <td>{{ $tabby_sale['paymentStatus'] }}</td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        {{ __('No data found') }}
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
