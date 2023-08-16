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
                        <th>Product id</th>
                        <th>Product number</th>
                        <th>Name</th>
                        <th>Name arabic</th>
                        <th>No of orders</th>
                        <th>class</th>
                        <th>Brand name</th>
                        <th>Brand name arabic</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product['productId']}}</td>
                        <td>{{$product['productNumber']}}</td>
                        <td>{{$product['name']}}</td>
                        <td>{{$product['nameAr']}}</td>
                        <td>{{$product['count']}}</td>
                        <td>{{$product['brandClassName']}}</td>
                        <td>{{$product['brandName']}}</td>
                        <td>{{$product['brandNameAr']}}</td>
                        <td>
                            <a href="{{ url('get-offers/'.$product['productId']) }}"
                               class="btn btn-info mr-1 mb-1 btn-sm"><i class="fa fa-eye"></i>
                            </a>
                        </td>
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

