@extends('layouts.app')

@section('title', __('Offers Statistics'))
@push('style')
@endpush

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h4 class="mb-0">{{ __('Offers stats') }}</h4>
                </div>
                <div class="card-content">
                    <table id="datatable" class="display nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th>supplier </th>
                            <th>offer id</th>
                            <th>offer price</th>
                            <th>offer quantity</th>
                            <th>offer title</th>
                            <th>minimum order quantity </th>
                            <th>maximum order quantity </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productOffers as $product)
                            <tr>
                                <td>{{$product['supplier']}}</td>
                                <td>{{$product['offer_id']}}</td>
                                <td>{{$product['offer_price']}}</td>
                                <td>{{$product['offer_quantity']}}</td>
                                <td>{{$product['offer']['offer_title']}}</td>
                                <td>{{$product['minimum_order_quantity']}}</td>
                                <td>{{$product['maximum_order_quantity']}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@section('page-script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        //ajax call

        $(document).ready(function() {

            $('#datatable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        });

        //end of ajax call
    </script>

@endsection

