@extends('layouts.app')

@section('title', __('Most searched products'))

@push('style')
@endpush
@section('content')
    @include('QVM.search_reports.search.search_with_offset')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('Most searched products') }}</h4>
                </div>


                <div class="card-content">
                    <table class="table table-hover-animation mb-0" id="searched_products">
                        <thead>
                        <tr>
                            <th>{{ __('product id') }}</th>
                            <th>{{ __('product name') }}</th>
                            <th>{{ __('search count') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($products))
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product['brandId'] }}</td>
                                    <td>{{ $product['brandName'] . " / " . $product['brandNameAr'] }}</td>
                                    <td>{{ $product['numberSearch'] }}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            @if(count($products) > 0)
                                <td colspan="9">{{ ($products->links('pagination::bootstrap-5')) }} </td>
                            @endif
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop



