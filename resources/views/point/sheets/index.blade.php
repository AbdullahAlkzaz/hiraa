@php $titlePage = __('pickup sheet') @endphp
@extends('layouts.app')
@section('title', $titlePage . " (cities)")
@section('content')
    @unless(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('Pick-up sheet') || auth()->user()->hasPermission('Delivery sheet'))
  <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css'>
    <link rel='stylesheet' href='https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @include('QVM.sheets.search.search_with_date')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('Pick-up points') }}</h4>

                </div>
                <div class="card-content">
                    <div class="container">
                        <table data-toggle="table" data-search="true" data-filter-control="true" data-show-export="true"
                               data-click-to-select="true"
                               data-toolbar="#toolbar"
                               id="table"
                               class="table table-striped table-bordered table-responsive">
                            <thead>
                            <tr>

                                <th data-field="order id" data-sortable="true">{{ __('order id') }}</th>
                                <th data-field="seller_name" data-sortable="true">{{ __('seller name') }}</th>
                                <th data-field="shipping_price"  data-sortable="true">{{ __('shipping price') }}</th>
                                <th data-field="tax"  data-sortable="true">{{ __('tax') }}</th>
                                <th data-field="price" data-sortable="true">{{ __('price') }}</th>
                                <th data-field="total_price"  data-sortable="true">{{ __('total price') }}</th>
                                <th data-field="shipping_type_id"  data-sortable="true">{{ __('shipping type id') }}</th>
                                <th data-field="items_count"  data-sortable="true">{{ __('items count') }}</th>
                                <th data-field="approved"  data-sortable="true">{{ __('approved') }}</th>
                                <th data-field="created_at" data-sortable="true">{{ __('created at') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($pickPoints) && count($pickPoints) >0)
                                @foreach ($pickPoints['allBranches'] as $pickPoint)
                                    @if(count($pickPoint['purchase_order_items_po']) > 0)
                                    <tr>
                                        <td>{{ $pickPoint['order_id'] }}</td>
                                        <td>{{ $pickPoint['company_id'] == null ? null: $pickPoints['all_companies'][$pickPoint['company_id']]   }}</td>
                                        <td>{{ $pickPoint['shipping_price'] }}</td>
                                        <td>{{ $pickPoint['tax'] }}</td>
                                        <td>{{ $pickPoint['price'] }}</td>
                                        <td>{{ $pickPoint['total_price'] }}</td>
                                        <td>{{ $pickPoints['shipping_types'][$pickPoint['shipping_type_id']] }}</td>
                                        <td>{{ count($pickPoint['purchase_order_items_po']) }}</td>
                                        <td>{{ $pickPoint['approved'] == 0 ? "No" : "Yes" }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pickPoint['created_at'])->format('y-m-d')  }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="12">
                                            <table class="table mb-0">
                                                <thead>
                                                <tr>
                                                    <th>product id</th>
                                                    <th>seller branch name</th>
                                                    <th>price</th>
                                                    <th>quantity</th>
                                                    <th> total price</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($pickPoint['purchase_order_items_po'] as $item)
                                                        <tr>
                                                            <td>{{$pickPoints['all_products'][$item['product_id']]['product_name'] }}</td>
                                                            <td>{{$pickPoints['all_branches_names'][$item['branch_id']] }}</td>
                                                            <td>{{$item['price']}}</td>
                                                            <td>{{$item['quantity']}}</td>
                                                            <td>{{$item['total_price']}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <br>
                                    @endif
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                @if(isset($pickPoints)&& count($pickPoints) > 0)
                                    <td colspan="9">{{ ($pickPoints->links('pagination::bootstrap-5')) }} </td>
                                @endif
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('page-script')

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://unpkg.com/popper.js/dist/umd/popper.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.13.1/bootstrap-table.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.13.1/extensions/filter-control/bootstrap-table-filter-control.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.13.1/extensions/export/bootstrap-table-export.min.js'></script>
    <script src='https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        var $table = $("#table");
        $(function() {
            $("#toolbar")
                .find("select")
                .change(function() {
                    $table.bootstrapTable("refreshOptions", {
                        exportDataType: $(this).val()
                    });
                });

        });
        $(document).ready(function() {
            $('#city_id').select2({
                placeholder: 'Select city',
                allowClear: true
            });
            $('.select2-selection__arrow').hide();
        });

    </script>

@endsection
