@extends('layouts.app')

@section('content-header')
    @unless(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('Offers'))
  <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless


                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">{{ __('offers_offers') }}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('offers.index') }}">{{ __('offers_offers') }}</a>
                                    </li>


								     <li class="breadcrumb-item active">{{ __('Add new offers_offer') }}
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


                     <form class="form-horizontal" role="form" method="POST" action="{{ url('/offers') }}"   enctype="multipart/form-data"  novalidate>
                        {!! csrf_field() !!}

                           <div class="form-body">
                                                <div class="row">








           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('offers_seller_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('seller_id')   }}" data-placement="left"  data-content="{{ __('offers_seller_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offers_seller_id_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('seller_id') ? 'is-invalid' : '' }}" name="seller_id" placeholder="{{ __('offers_seller_id') }}" data-validation-required-message="{{ __('This field is required') }}" >
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
                                                                <span>{{ __('offers_offer_title') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('offer_title')   }}" data-placement="left"  data-content="{{ __('offers_offer_title_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offers_offer_title_data-original-title') }}"
                                                                     type="text"   class="form-control {{ $errors->has('offer_title') ? 'is-invalid' : '' }}" name="offer_title" placeholder="{{ __('offers_offer_title') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('offer_title'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('offer_title') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>






           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('offers_offer_expiry_date') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('offer_expiry_date')   }}" data-placement="left"  data-content="{{ __('offers_offer_expiry_date_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offers_offer_expiry_date_data-original-title') }}"
                                                                     type="date"   class="form-control {{ $errors->has('offer_expiry_date') ? 'is-invalid' : '' }}" name="offer_expiry_date" placeholder="{{ __('offers_offer_expiry_date') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('offer_expiry_date'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('offer_expiry_date') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>






           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('offers_image') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('image')   }}" data-placement="left"  data-content="{{ __('offers_image_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offers_image_data-original-title') }}"
                                                                     type="file"   class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image" placeholder="{{ __('offers_image') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-image"></i>
                                                                    </div>

                                                                    @if ($errors->has('image'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('image') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>





           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('offers_minimum_order_quantity') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('minimum_order_quantity')   }}" data-placement="left"  data-content="{{ __('offers_minimum_order_quantity_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offers_minimum_order_quantity_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('minimum_order_quantity') ? 'is-invalid' : '' }}" name="minimum_order_quantity" placeholder="{{ __('offers_minimum_order_quantity') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('minimum_order_quantity'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('minimum_order_quantity') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>






           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('offers_minimum_order_amount') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('minimum_order_amount')   }}" data-placement="left"  data-content="{{ __('offers_minimum_order_amount_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offers_minimum_order_amount_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('minimum_order_amount') ? 'is-invalid' : '' }}" name="minimum_order_amount" placeholder="{{ __('offers_minimum_order_amount') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('minimum_order_amount'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('minimum_order_amount') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>









       <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>@lang('offers_offer_specifications')</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <textarea  data-toggle="popover"   data-placement="left"  data-content="{{ __('offers_offer_specifications_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offers_offer_specifications_data-original-title') }}"    class="form-control {{ $errors->has('offer_specifications') ? 'is-invalid' : '' }}" name="offer_specifications" placeholder="@lang('offers_offer_specifications')"   >{{ old('offer_specifications') }}</textarea>
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-text"></i>
                                                                    </div>


                                @if ($errors->has('offer_specifications'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('offer_specifications') }}
                                                </div>
                                              @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>





           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('offers_offer_type_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">

                                                                     <select   data-toggle="popover"   data-placement="left"  data-content="{{ __('offers_offer_type_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offers_offer_type_id_data-original-title') }}"  class="form-control {{ $errors->has('offer_type_id') ? 'is-invalid' : '' }}"     data-validation-required-message="{{ __('This field is required') }}" name="offer_type_id" >

                            @foreach($offer_types as $offer_type)
                             <option    value="{{ $offer_type->id }}" >{{ $offer_type->name }}</option>
                             @endforeach
                            </select>

                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('offer_type_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('offer_type_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



    <div class="col-12">
        <div class="form-group row">
            <div class="col-md-4">
                <span>@lang('offers_is_active')  </span>
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


