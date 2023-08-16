@extends('layouts.app')

@section('content-header')



                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">{{ __('wallets_wallets') }}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('wallets.index') }}">{{ __('wallets_wallets') }}</a>
                                    </li>
                                   

								     <li class="breadcrumb-item active">{{ __('Add new wallets_wallet') }} 
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
                                        
                                       
                     <form class="form-horizontal" role="form" method="POST" action="{{ url('/wallets') }}"   enctype="multipart/form-data"  novalidate>
                        {!! csrf_field() !!}

                           <div class="form-body">
                                                <div class="row">                


                 

 



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('wallets_user_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('user_id')   }}" data-placement="left"  data-content="{{ __('wallets_user_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('wallets_user_id_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('user_id') ? 'is-invalid' : '' }}" name="user_id" placeholder="{{ __('wallets_user_id') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('user_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('user_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('wallets_user_type') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('user_type')   }}" data-placement="left"  data-content="{{ __('wallets_user_type_data-content') }}" data-trigger="hover"  data-original-title="{{ __('wallets_user_type_data-original-title') }}" 
                                                                     type="text"   class="form-control {{ $errors->has('user_type') ? 'is-invalid' : '' }}" name="user_type" placeholder="{{ __('wallets_user_type') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('user_type'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('user_type') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('wallets_current_balance') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('current_balance')   }}" data-placement="left"  data-content="{{ __('wallets_current_balance_data-content') }}" data-trigger="hover"  data-original-title="{{ __('wallets_current_balance_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('current_balance') ? 'is-invalid' : '' }}" name="current_balance" placeholder="{{ __('wallets_current_balance') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('current_balance'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('current_balance') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('wallets_pending_balance') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('pending_balance')   }}" data-placement="left"  data-content="{{ __('wallets_pending_balance_data-content') }}" data-trigger="hover"  data-original-title="{{ __('wallets_pending_balance_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('pending_balance') ? 'is-invalid' : '' }}" name="pending_balance" placeholder="{{ __('wallets_pending_balance') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('pending_balance'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('pending_balance') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('wallets_transferable_balance') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('transferable_balance')   }}" data-placement="left"  data-content="{{ __('wallets_transferable_balance_data-content') }}" data-trigger="hover"  data-original-title="{{ __('wallets_transferable_balance_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('transferable_balance') ? 'is-invalid' : '' }}" name="transferable_balance" placeholder="{{ __('wallets_transferable_balance') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('transferable_balance'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('transferable_balance') }}
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


  