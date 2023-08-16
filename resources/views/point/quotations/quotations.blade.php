@extends('layouts.app')

@section('content-header')
 


                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">{{ __('quotations_quotations') }}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">
									{{ __('quotations_quotations') }} 
                                    </li>
                                   
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                       
                            <a title="{{ __('Add new') }}" class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" href="{{ route('quotations.create') }}"  >
                            <i class="feather icon-plus"></i></a>
                          
                      
                    </div>
                </div>
 
@endsection


 

@push('style')


@endpush


@section('content')

 

@include('QVM.quotations.search.search')

<div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0">{{ __('quotations_quotations') }}</h4>
                                </div>
                                <div class="card-content">
                                   @if (Session::has('message'))

                                     <!--div class="alert alert-primary alert-dismissible fade show" role="alert">
                                            <p class="mb-0">
                                                {!! session('message') !!}
                                            </p>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div-->

                                        @endif
                                        
                                    <div class="table-responsive mt-1">
                                        <table class="table table-hover-animation mb-0">
                                            <thead>
                                                <tr>
                                                <th>#</th>
           
<th  >{{ __('quotations_id') }}</th>
<th  >{{ __('quotations_subscriber_id') }}</th>
<th  >{{ __('quotations_customer_id') }}</th>
<th  >{{ __('quotations_customer_address') }}</th>
<th  >{{ __('quotations_customer_latitude') }}</th>
<th  >{{ __('quotations_customer_longitude') }}</th>
<th  >{{ __('quotations_number_of_required_pieces') }}</th>
<th  >{{ __('quotations_number_of_available_pieces') }}</th>
<th  >{{ __('quotations_number_of_collection_areas') }}</th>
<th  >{{ __('quotations_part_type_id') }}</th>
<th  >{{ __('quotations_expected_delivery_time_min') }}</th>
<th  >{{ __('quotations_expected_delivery_time_max') }}</th>
<th  >{{ __('quotations_order_cost') }}</th>
<th  >{{ __('quotations_tax') }}</th>
<th  >{{ __('quotations_total_order') }}</th>
<th  >{{ __('quotations_shipping_cost') }}</th>
<th  >{{ __('quotations_profit_ratio') }}</th>
<th  >{{ __('quotations_profit_amount') }}</th>
<th  >{{ __('quotations_quotation_amount') }}</th>
<th  >{{ __('quotations_quotation_process_id') }}</th>
<th  >{{ __('quotations_created_at') }}</th>
<th  >{{ __('quotations_updated_at') }}</th> <th >{{ __('Action') }}</th>
    </tr>
     </thead>
          <tbody>
          @foreach ($quotations as $key => $quotation)
            <tr>
            <td>{{ $quotation->firstItem + $key + 1 }}</td>
            
<td>{{ $quotation->id }}</td>
<td>{{ $quotation->subscriber_id }}</td>
<td>{{ $quotation->customer_id }}</td>
<td>{{ $quotation->customer_address }}</td>
<td>{{ $quotation->customer_latitude }}</td>
<td>{{ $quotation->customer_longitude }}</td>
<td>{{ $quotation->number_of_required_pieces }}</td>
<td>{{ $quotation->number_of_available_pieces }}</td>
<td>{{ $quotation->number_of_collection_areas }}</td>
<td>{{ $quotation->part_type_id }}</td>
<td>{{ $quotation->expected_delivery_time_min }}</td>
<td>{{ $quotation->expected_delivery_time_max }}</td>
<td>{{ $quotation->order_cost }}</td>
<td>{{ $quotation->tax }}</td>
<td>{{ $quotation->total_order }}</td>
<td>{{ $quotation->shipping_cost }}</td>
<td>{{ $quotation->profit_ratio }}</td>
<td>{{ $quotation->profit_amount }}</td>
<td>{{ $quotation->quotation_amount }}</td>
<td>{{ $quotation->quotation_process_id }}</td>
<td>{{ $quotation->created_at }}</td>
<td>{{ $quotation->updated_at }}</td>         <td>

           <a href="{{ route('quotations.show', $quotation->id) }}"
                                                    class="btn btn-success mr-1 mb-1 btn-sm"><i
                                                        class="fa fa-edit"></i></a>
           
 
            <button value="{{  $quotation->id }}" class="btn btn-danger mr-1 mb-1 btn-sm delete-this"   ><i class="fa fa-trash"></i></button>
   
                                               
                                                <form id="destroy-quotation_{{  $quotation->id }}"
                                                    action="{{ route('quotations.destroy', $quotation->id) }}" method="POST"
                                                    style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
           
           </td>
        </tr>
 @endforeach
   </tbody>
        <tfoot>
       <tr><td   dir="rtl"  colspan="23"  >{{$quotations->links("pagination::bootstrap-4")}} </td></tr>
        </tfoot>
    
</table>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                   @stop


@push('scripts')
  <!-- BEGIN: Page Vendor JS-->
  <script src="/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
     <!-- END: Page Vendor JS-->
    <script>      
    
    $(document).ready(function () {

 
 

$('.delete-this').on('click', function () {
 

 var id = ($(this).val());

    
  Swal.fire({
    title: "{{ __('Are you sure?') }}",
    text: "{{ __('You wont be able to revert this!') }}",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: "{{ __('Yes, delete it!') }}",
    confirmButtonClass: 'btn btn-primary',
    cancelButtonClass: 'btn btn-danger ml-1',
    cancelButtonText:  "{{ __('Cancel') }}",
    buttonsStyling: false,
  }).then(function (result) {
    if (result.value) {


      Swal.fire({
        type: "success",
        title: 'Deleted!',
        text: 'Your file has been deleted.',
        confirmButtonClass: 'btn btn-success',
      })
    

     document.getElementById('destroy-quotation_'+id).submit();

    }
    else if (result.dismiss === Swal.DismissReason.cancel) {
      Swal.fire({
        title: "{{ __('Cancelled') }}",
        text: "{{ __('Your data is safe :)') }}",
        type: 'error',
        confirmButtonClass: 'btn btn-success',
      })
    }
  })
});

});


</script>

  
 
@if (Session::has('message'))
<script>
        Swal.fire({
      position: 'top-end',
      type: 'success',
      html: '{!! session('message') !!}',
      showConfirmButton: false,
      timer: 3000,
      confirmButtonClass: 'btn btn-primary',
      buttonsStyling: false,
    })
</script>

   @endif
          
 
                                            
@endpush
