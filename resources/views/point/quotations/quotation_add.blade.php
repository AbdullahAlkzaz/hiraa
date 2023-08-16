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
                                    <li class="breadcrumb-item"><a href="{{ route('quotations.index') }}">{{ __('quotations_quotations') }}</a>
                                    </li>
                                   

								     <li class="breadcrumb-item active">{{ __('Add new quotations_quotation') }} 
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
                                        
                                       
                     <form class="form-horizontal" role="form" method="POST" action="{{ url('/quotations') }}"   enctype="multipart/form-data"  novalidate>
                        {!! csrf_field() !!}

                           <div class="form-body">
                                                <div class="row">                


                 

 



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotations_subscriber_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('subscriber_id')   }}" data-placement="left"  data-content="{{ __('quotations_subscriber_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_subscriber_id_data-original-title') }}" 
                                                                     type="text"   class="form-control {{ $errors->has('subscriber_id') ? 'is-invalid' : '' }}" name="subscriber_id" placeholder="{{ __('quotations_subscriber_id') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('subscriber_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('subscriber_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotations_customer_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('customer_id')   }}" data-placement="left"  data-content="{{ __('quotations_customer_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_customer_id_data-original-title') }}" 
                                                                     type="text"   class="form-control {{ $errors->has('customer_id') ? 'is-invalid' : '' }}" name="customer_id" placeholder="{{ __('quotations_customer_id') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('customer_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('customer_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotations_customer_address') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('customer_address')   }}" data-placement="left"  data-content="{{ __('quotations_customer_address_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_customer_address_data-original-title') }}" 
                                                                     type="text"   class="form-control {{ $errors->has('customer_address') ? 'is-invalid' : '' }}" name="customer_address" placeholder="{{ __('quotations_customer_address') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('customer_address'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('customer_address') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotations_customer_latitude') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('customer_latitude')   }}" data-placement="left"  data-content="{{ __('quotations_customer_latitude_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_customer_latitude_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('customer_latitude') ? 'is-invalid' : '' }}" name="customer_latitude" placeholder="{{ __('quotations_customer_latitude') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('customer_latitude'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('customer_latitude') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotations_customer_longitude') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('customer_longitude')   }}" data-placement="left"  data-content="{{ __('quotations_customer_longitude_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_customer_longitude_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('customer_longitude') ? 'is-invalid' : '' }}" name="customer_longitude" placeholder="{{ __('quotations_customer_longitude') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('customer_longitude'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('customer_longitude') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotations_number_of_required_pieces') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('number_of_required_pieces')   }}" data-placement="left"  data-content="{{ __('quotations_number_of_required_pieces_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_number_of_required_pieces_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('number_of_required_pieces') ? 'is-invalid' : '' }}" name="number_of_required_pieces" placeholder="{{ __('quotations_number_of_required_pieces') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('number_of_required_pieces'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('number_of_required_pieces') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotations_number_of_available_pieces') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('number_of_available_pieces')   }}" data-placement="left"  data-content="{{ __('quotations_number_of_available_pieces_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_number_of_available_pieces_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('number_of_available_pieces') ? 'is-invalid' : '' }}" name="number_of_available_pieces" placeholder="{{ __('quotations_number_of_available_pieces') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('number_of_available_pieces'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('number_of_available_pieces') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotations_number_of_collection_areas') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('number_of_collection_areas')   }}" data-placement="left"  data-content="{{ __('quotations_number_of_collection_areas_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_number_of_collection_areas_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('number_of_collection_areas') ? 'is-invalid' : '' }}" name="number_of_collection_areas" placeholder="{{ __('quotations_number_of_collection_areas') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('number_of_collection_areas'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('number_of_collection_areas') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

     


           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotations_part_type_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                   
                                                                     <select   data-toggle="popover"   data-placement="left"  data-content="{{ __('quotations_part_type_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_part_type_id_data-original-title') }}"  class="form-control {{ $errors->has('part_type_id') ? 'is-invalid' : '' }}"     data-validation-required-message="{{ __('This field is required') }}" name="part_type_id" >

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
                                                                <span>{{ __('quotations_expected_delivery_time_min') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('expected_delivery_time_min')   }}" data-placement="left"  data-content="{{ __('quotations_expected_delivery_time_min_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_expected_delivery_time_min_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('expected_delivery_time_min') ? 'is-invalid' : '' }}" name="expected_delivery_time_min" placeholder="{{ __('quotations_expected_delivery_time_min') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('expected_delivery_time_min'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('expected_delivery_time_min') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotations_expected_delivery_time_max') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('expected_delivery_time_max')   }}" data-placement="left"  data-content="{{ __('quotations_expected_delivery_time_max_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_expected_delivery_time_max_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('expected_delivery_time_max') ? 'is-invalid' : '' }}" name="expected_delivery_time_max" placeholder="{{ __('quotations_expected_delivery_time_max') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('expected_delivery_time_max'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('expected_delivery_time_max') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotations_order_cost') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('order_cost')   }}" data-placement="left"  data-content="{{ __('quotations_order_cost_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_order_cost_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('order_cost') ? 'is-invalid' : '' }}" name="order_cost" placeholder="{{ __('quotations_order_cost') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('order_cost'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('order_cost') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotations_tax') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('tax')   }}" data-placement="left"  data-content="{{ __('quotations_tax_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_tax_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" name="tax" placeholder="{{ __('quotations_tax') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('tax'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('tax') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotations_total_order') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('total_order')   }}" data-placement="left"  data-content="{{ __('quotations_total_order_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_total_order_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('total_order') ? 'is-invalid' : '' }}" name="total_order" placeholder="{{ __('quotations_total_order') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('total_order'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('total_order') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotations_shipping_cost') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('shipping_cost')   }}" data-placement="left"  data-content="{{ __('quotations_shipping_cost_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_shipping_cost_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('shipping_cost') ? 'is-invalid' : '' }}" name="shipping_cost" placeholder="{{ __('quotations_shipping_cost') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('shipping_cost'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('shipping_cost') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotations_profit_ratio') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('profit_ratio')   }}" data-placement="left"  data-content="{{ __('quotations_profit_ratio_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_profit_ratio_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('profit_ratio') ? 'is-invalid' : '' }}" name="profit_ratio" placeholder="{{ __('quotations_profit_ratio') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('profit_ratio'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('profit_ratio') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotations_profit_amount') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('profit_amount')   }}" data-placement="left"  data-content="{{ __('quotations_profit_amount_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_profit_amount_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('profit_amount') ? 'is-invalid' : '' }}" name="profit_amount" placeholder="{{ __('quotations_profit_amount') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('profit_amount'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('profit_amount') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

      



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotations_quotation_amount') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('quotation_amount')   }}" data-placement="left"  data-content="{{ __('quotations_quotation_amount_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_quotation_amount_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('quotation_amount') ? 'is-invalid' : '' }}" name="quotation_amount" placeholder="{{ __('quotations_quotation_amount') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('quotation_amount'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('quotation_amount') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

     


           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotations_quotation_process_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                   
                                                                     <select   data-toggle="popover"   data-placement="left"  data-content="{{ __('quotations_quotation_process_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_quotation_process_id_data-original-title') }}"  class="form-control {{ $errors->has('quotation_process_id') ? 'is-invalid' : '' }}"     data-validation-required-message="{{ __('This field is required') }}" name="quotation_process_id" >

                            @foreach($quotation_processes as $quotation_process)
                             <option    value="{{ $quotation_process->id }}" >{{ $quotation_process->name }}</option>
                             @endforeach
                            </select>
                                                                   
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('quotation_process_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('quotation_process_id') }}
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


  