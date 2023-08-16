@extends('layouts.app')

@section('content-header')
 


                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">{{ __('transaction_operations_transaction_operations') }}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">
									{{ __('transaction_operations_transaction_operations') }} 
                                    </li>
                                   
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                       
                            <a title="{{ __('Add new') }}" class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" href="{{ route('transaction_operations.create') }}"  >
                            <i class="feather icon-plus"></i></a>
                          
                      
                    </div>
                </div>
 
@endsection


 

@push('style')


@endpush


@section('content')

 

@include('QVM.transaction_operations.search.search')

<div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0">{{ __('transaction_operations_transaction_operations') }}</h4>
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
           
<th  >{{ __('transaction_operations_id') }}</th>
<th  >{{ __('transaction_operations_transaction_id') }}</th>
<th  >{{ __('transaction_operations_user_id') }}</th>
<th  >{{ __('transaction_operations_created_at') }}</th>
<th  >{{ __('transaction_operations_updated_at') }}</th> <th >{{ __('Action') }}</th>
    </tr>
     </thead>
          <tbody>
          @foreach ($transaction_operations as $key => $transaction_operation)
            <tr>
            <td>{{ $transaction_operation->firstItem + $key + 1 }}</td>
            
<td>{{ $transaction_operation->id }}</td>
<td>{{ $transaction_operation->transaction_id }}</td>
<td>{{ $transaction_operation->user_id }}</td>
<td>{{ $transaction_operation->created_at }}</td>
<td>{{ $transaction_operation->updated_at }}</td>         <td>

           <a href="{{ route('transaction_operations.show', $transaction_operation->id) }}"
                                                    class="btn btn-success mr-1 mb-1 btn-sm"><i
                                                        class="fa fa-edit"></i></a>
           
 
            <button value="{{  $transaction_operation->id }}" class="btn btn-danger mr-1 mb-1 btn-sm delete-this"   ><i class="fa fa-trash"></i></button>
   
                                               
                                                <form id="destroy-transaction_operation_{{  $transaction_operation->id }}"
                                                    action="{{ route('transaction_operations.destroy', $transaction_operation->id) }}" method="POST"
                                                    style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
           
           </td>
        </tr>
 @endforeach
   </tbody>
        <tfoot>
       <tr><td   dir="rtl"  colspan="6"  >{{$transaction_operations->links("pagination::bootstrap-4")}} </td></tr>
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
    

     document.getElementById('destroy-transaction_operation_'+id).submit();

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
