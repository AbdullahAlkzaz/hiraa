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
                                    <li class="breadcrumb-item"><a href="{{ route('quotation_item_alternatives.index') }}">{{ __('quotation_item_alternatives_quotation_item_alternatives') }}</a>
                                    </li>
                                   

								     <li class="breadcrumb-item active">{{ __('Add new quotation_item_alternatives_quotation_item_alternative') }} 
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!--div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-plus"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                        </div>
                    </div>
                </div-->
 
@endsection

@section('content')


  <section class="simple-validation">
                    <div class="row">
                        <div class="col-md-12">
                           <div class="col-md-8 col-sm-12">

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"></h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

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
                                        
                                       
                     <form class="form-horizontal" role="form" method="POST" action="{{ url('/quotation_item_alternatives') }}"   enctype="multipart/form-data"  novalidate>
                        {!! csrf_field() !!}

                           <div class="form-body">
                                                <div class="row">                


                 




           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotation_item_alternatives_quotation_item_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                   
                                                                     <select   data-toggle="popover"   data-placement="left"  data-content="{{ __('quotation_item_alternatives_quotation_item_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_item_alternatives_quotation_item_id_data-original-title') }}"  class="form-control {{ $errors->has('quotation_item_id') ? 'is-invalid' : '' }}"     data-validation-required-message="{{ __('This field is required') }}" name="quotation_item_id" >

                            @foreach($quotation_items as $quotation_item)
                             <option    value="{{ $quotation_item->id }}" >{{ $quotation_item->quotation_id }}</option>
                             @endforeach
                            </select>
                                                                   
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('quotation_item_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('quotation_item_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

                                                 
 



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotation_item_alternatives_product_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('product_id')   }}" data-placement="left"  data-content="{{ __('quotation_item_alternatives_product_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_item_alternatives_product_id_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('product_id') ? 'is-invalid' : '' }}" name="product_id" placeholder="{{ __('quotation_item_alternatives_product_id') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('product_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('product_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotation_item_alternatives_price') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('price')   }}" data-placement="left"  data-content="{{ __('quotation_item_alternatives_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_item_alternatives_price_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" placeholder="{{ __('quotation_item_alternatives_price') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('price'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('price') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotation_item_alternatives_quantity') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('quantity')   }}" data-placement="left"  data-content="{{ __('quotation_item_alternatives_quantity_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_item_alternatives_quantity_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" name="quantity" placeholder="{{ __('quotation_item_alternatives_quantity') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('quantity'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('quantity') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotation_item_alternatives_shipping_price') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('shipping_price')   }}" data-placement="left"  data-content="{{ __('quotation_item_alternatives_shipping_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_item_alternatives_shipping_price_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('shipping_price') ? 'is-invalid' : '' }}" name="shipping_price" placeholder="{{ __('quotation_item_alternatives_shipping_price') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('shipping_price'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('shipping_price') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotation_item_alternatives_branch_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('branch_id')   }}" data-placement="left"  data-content="{{ __('quotation_item_alternatives_branch_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_item_alternatives_branch_id_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('branch_id') ? 'is-invalid' : '' }}" name="branch_id" placeholder="{{ __('quotation_item_alternatives_branch_id') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('branch_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('branch_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

     


           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotation_item_alternatives_part_type_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                   
                                                                     <select   data-toggle="popover"   data-placement="left"  data-content="{{ __('quotation_item_alternatives_part_type_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_item_alternatives_part_type_id_data-original-title') }}"  class="form-control {{ $errors->has('part_type_id') ? 'is-invalid' : '' }}"     data-validation-required-message="{{ __('This field is required') }}" name="part_type_id" >

                            @foreach($part_types as $part_type)
                             <option    value="{{ $part_type->id }}" >{{ $part_type->name }}</option>
                             @endforeach
                            </select>
                                                                   
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('part_type_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('part_type_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

                                                 



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotation_item_alternatives_payment_type_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                   
                                                                     <select   data-toggle="popover"   data-placement="left"  data-content="{{ __('quotation_item_alternatives_payment_type_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_item_alternatives_payment_type_id_data-original-title') }}"  class="form-control {{ $errors->has('payment_type_id') ? 'is-invalid' : '' }}"     data-validation-required-message="{{ __('This field is required') }}" name="payment_type_id" >

                            @foreach($payment_types as $payment_type)
                             <option    value="{{ $payment_type->id }}" >{{ $payment_type->name }}</option>
                             @endforeach
                            </select>
                                                                   
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('payment_type_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('payment_type_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

                                                 



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotation_item_alternatives_order_items_availability_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                   
                                                                     <select   data-toggle="popover"   data-placement="left"  data-content="{{ __('quotation_item_alternatives_order_items_availability_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_item_alternatives_order_items_availability_id_data-original-title') }}"  class="form-control {{ $errors->has('order_items_availability_id') ? 'is-invalid' : '' }}"     data-validation-required-message="{{ __('This field is required') }}" name="order_items_availability_id" >

                            @foreach($order_items_availabilities as $order_items_availability)
                             <option    value="{{ $order_items_availability->id }}" >{{ $order_items_availability->name }}</option>
                             @endforeach
                            </select>
                                                                   
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('order_items_availability_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('order_items_availability_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

                                                 
 



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotation_item_alternatives_is_selected') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('is_selected')   }}" data-placement="left"  data-content="{{ __('quotation_item_alternatives_is_selected_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_item_alternatives_is_selected_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('is_selected') ? 'is-invalid' : '' }}" name="is_selected" placeholder="{{ __('quotation_item_alternatives_is_selected') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('is_selected'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('is_selected') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

     
        <div class="col-md-8 offset-md-4">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light ">{{ __('Submit') }}</button>
                                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">{{ __('Reset') }}</button>
                                                    </div>

                                                    
                                                    </div>
                                                    </div>

                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


  	
@stop

@push('scripts')



<script type="text/javascript">
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>
     <!-- BEGIN: Page JS-->
     <script src="/app-assets/js/scripts/popover/popover.js"></script>
    <!-- END: Page JS-->
  

     <!-- BEGIN: Page Vendor JS-->
 <script src="/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
     <!-- END: Page Vendor JS-->
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


  