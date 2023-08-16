@extends('layouts.app')

@section('content-header')
 


                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">{{ __('purchase_order_invoices_purchase_order_invoices') }}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">
									{{ __('purchase_order_invoices_purchase_order_invoices') }} 
                                    </li>
                                   
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                       
                            <a title="{{ __('Add new') }}" class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" href="{{ route('purchase_order_invoices.create') }}"  >
                            <i class="feather icon-plus"></i></a>
                          
                      
                    </div>
                </div>
 
@endsection


 

@push('style')


@endpush


@section('content')

 

@include('QVM.purchase_order_invoices.search.search')

<div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0">{{ __('purchase_order_invoices_purchase_order_invoices') }}</h4>
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
           
<th  >{{ __('purchase_order_invoices_id') }}</th>
<th  >{{ __('purchase_order_invoices_invoice_number') }}</th>
<th  >{{ __('purchase_order_invoices_purchase_order_id') }}</th>
<th  >{{ __('purchase_order_invoices_payment_status_id') }}</th>
<th  >{{ __('purchase_order_invoices_invoice_type') }}</th>
<th  >{{ __('purchase_order_invoices_price') }}</th>
<th  >{{ __('purchase_order_invoices_shipping_price') }}</th>
<th  >{{ __('purchase_order_invoices_tax') }}</th>
<th  >{{ __('purchase_order_invoices_total_price') }}</th>
<th  >{{ __('purchase_order_invoices_notes') }}</th>
<th  >{{ __('purchase_order_invoices_created_at') }}</th>
<th  >{{ __('purchase_order_invoices_updated_at') }}</th> <th >{{ __('Action') }}</th>
    </tr>
     </thead>
          <tbody>
          @foreach ($purchase_order_invoices as $key => $purchase_order_invoice)
            <tr>
            <td>{{ $purchase_order_invoice->firstItem + $key + 1 }}</td>
            
<td>{{ $purchase_order_invoice->id }}</td>
<td>{{ $purchase_order_invoice->invoice_number }}</td>
<td>{{ $purchase_order_invoice->purchase_order_id }}</td>
<td>{{ $purchase_order_invoice->payment_status_id }}</td>
<td>{{ $purchase_order_invoice->invoice_type }}</td>
<td>{{ $purchase_order_invoice->price }}</td>
<td>{{ $purchase_order_invoice->shipping_price }}</td>
<td>{{ $purchase_order_invoice->tax }}</td>
<td>{{ $purchase_order_invoice->total_price }}</td>
<td>{{ $purchase_order_invoice->notes }}</td>
<td>{{ $purchase_order_invoice->created_at }}</td>
<td>{{ $purchase_order_invoice->updated_at }}</td>         <td>

           <a href="{{ route('purchase_order_invoices.show', $purchase_order_invoice->id) }}"
                                                    class="btn btn-success mr-1 mb-1 btn-sm"><i
                                                        class="fa fa-edit"></i></a>
           
 
            <button value="{{  $purchase_order_invoice->id }}" class="btn btn-danger mr-1 mb-1 btn-sm delete-this"   ><i class="fa fa-trash"></i></button>
   
                                               
                                                <form id="destroy-purchase_order_invoice_{{  $purchase_order_invoice->id }}"
                                                    action="{{ route('purchase_order_invoices.destroy', $purchase_order_invoice->id) }}" method="POST"
                                                    style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
           
           </td>
        </tr>
 @endforeach
   </tbody>
        <tfoot>
       <tr><td   dir="rtl"  colspan="13"  >{{$purchase_order_invoices->links("pagination::bootstrap-4")}} </td></tr>
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
    

     document.getElementById('destroy-purchase_order_invoice_'+id).submit();

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
