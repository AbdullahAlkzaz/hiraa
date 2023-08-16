@extends('layouts.app')

@section('content-header')



                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">{{ __('seller_shipping_methods_seller_shipping_methods') }}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('seller_shipping_methods.index') }}">{{ __('seller_shipping_methods_seller_shipping_methods') }}</a>
                                    </li>
                                   

								     <li class="breadcrumb-item active">{{ __('Add new seller_shipping_methods_seller_shipping_method') }} 
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
                                        
                                       
                     <form class="form-horizontal" role="form" method="POST" action="{{ url('/seller_shipping_methods') }}"   enctype="multipart/form-data"  novalidate>
                        {!! csrf_field() !!}

                           <div class="form-body">
                                                <div class="row">                


                 

 



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('seller_shipping_methods_seller_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('seller_id')   }}" data-placement="left"  data-content="{{ __('seller_shipping_methods_seller_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('seller_shipping_methods_seller_id_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('seller_id') ? 'is-invalid' : '' }}" name="seller_id" placeholder="{{ __('seller_shipping_methods_seller_id') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('seller_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('seller_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

     


           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('seller_shipping_methods_shipping_method_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                   
                                                                     <select   data-toggle="popover"   data-placement="left"  data-content="{{ __('seller_shipping_methods_shipping_method_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('seller_shipping_methods_shipping_method_id_data-original-title') }}"  class="form-control {{ $errors->has('shipping_method_id') ? 'is-invalid' : '' }}"     data-validation-required-message="{{ __('This field is required') }}" name="shipping_method_id" >

                            @foreach($shipping_methods as $shipping_method)
                             <option    value="{{ $shipping_method->id }}" >{{ $shipping_method->name }}</option>
                             @endforeach
                            </select>
                                                                   
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('shipping_method_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('shipping_method_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

                                                 
    <div class="col-12">
        <div class="form-group row">
            <div class="col-md-4">
                <span>@lang('seller_shipping_methods_is_active')  </span>
            </div>
            <div class="col-md-8">
 
                <div class="custom-control custom-switch">
<input name="is_active" value="1" type="checkbox" id="is_active"   class="custom-control-input"  >
<label class="custom-control-label" for="is_active">
<span class="switch-text-left">{{__("Yes") }}</span>
<span class="switch-text-right">{{ __("No") }}</span>
</label>
</div>
@if ($errors->has('is_active'))
                    <div class="invalid-feedback">
                    {{ $errors->first('is_active') }}
</div>
@endif
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


  