@extends('layouts.app')

@section('content-header')
 


                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">{{ __('quotation_item_alternatives_quotation_item_alternatives') }}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">
									{{ __('quotation_item_alternatives_quotation_item_alternatives') }} 
                                    </li>
                                   
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                       
                            <a title="{{ __('Add new') }}" class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" href="{{ route('quotation_item_alternatives.create') }}"  >
                            <i class="feather icon-plus"></i></a>
                          
                      
                    </div>
                </div>
 
@endsection


 

@push('style')


@endpush


@section('content')

 

@include('QVM.quotation_item_alternatives.search.search')

<div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0">{{ __('quotation_item_alternatives_quotation_item_alternatives') }}</h4>
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
           
<th  >{{ __('quotation_item_alternatives_id') }}</th>
<th  >{{ __('quotation_item_alternatives_quotation_item_id') }}</th>
<th  >{{ __('quotation_item_alternatives_product_id') }}</th>
<th  >{{ __('quotation_item_alternatives_price') }}</th>
<th  >{{ __('quotation_item_alternatives_quantity') }}</th>
<th  >{{ __('quotation_item_alternatives_shipping_price') }}</th>
<th  >{{ __('quotation_item_alternatives_branch_id') }}</th>
<th  >{{ __('quotation_item_alternatives_part_type_id') }}</th>
<th  >{{ __('quotation_item_alternatives_payment_type_id') }}</th>
<th  >{{ __('quotation_item_alternatives_order_items_availability_id') }}</th>
<th  >{{ __('quotation_item_alternatives_is_selected') }}</th>
<th  >{{ __('quotation_item_alternatives_created_at') }}</th>
<th  >{{ __('quotation_item_alternatives_updated_at') }}</th> <th >{{ __('Action') }}</th>
    </tr>
     </thead>
          <tbody>
          @foreach ($quotation_item_alternatives as $key => $quotation_item_alternative)
            <tr>
            <td>{{ $quotation_item_alternative->firstItem + $key + 1 }}</td>
            
<td>{{ $quotation_item_alternative->id }}</td>
<td>{{ $quotation_item_alternative->quotation_item_id }}</td>
<td>{{ $quotation_item_alternative->product_id }}</td>
<td>{{ $quotation_item_alternative->price }}</td>
<td>{{ $quotation_item_alternative->quantity }}</td>
<td>{{ $quotation_item_alternative->shipping_price }}</td>
<td>{{ $quotation_item_alternative->branch_id }}</td>
<td>{{ $quotation_item_alternative->part_type_id }}</td>
<td>{{ $quotation_item_alternative->payment_type_id }}</td>
<td>{{ $quotation_item_alternative->order_items_availability_id }}</td>
<td>{{ $quotation_item_alternative->is_selected }}</td>
<td>{{ $quotation_item_alternative->created_at }}</td>
<td>{{ $quotation_item_alternative->updated_at }}</td>         <td>

           <a href="{{ route('quotation_item_alternatives.show', $quotation_item_alternative->id) }}"
                                                    class="btn btn-success mr-1 mb-1 btn-sm"><i
                                                        class="fa fa-edit"></i></a>
           
 
            <button value="{{  $quotation_item_alternative->id }}" class="btn btn-danger mr-1 mb-1 btn-sm delete-this"   ><i class="fa fa-trash"></i></button>
   
                                               
                                                <form id="destroy-quotation_item_alternative_{{  $quotation_item_alternative->id }}"
                                                    action="{{ route('quotation_item_alternatives.destroy', $quotation_item_alternative->id) }}" method="POST"
                                                    style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
           
           </td>
        </tr>
 @endforeach
   </tbody>
        <tfoot>
       <tr><td   dir="rtl"  colspan="14"  >{{$quotation_item_alternatives->links("pagination::bootstrap-4")}} </td></tr>
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
    

     document.getElementById('destroy-quotation_item_alternative_'+id).submit();

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
