@extends('layouts.app')

@section('content-header')
    @unless(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('Orders'))
  <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless


                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">{{ __('orders_orders') }}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">{{ __('orders_orders') }}</a>
                                    </li>


								     <li class="breadcrumb-item active">{{ __('Add new orders_order') }}
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


                     <form class="form-horizontal" role="form" method="POST" action="{{ url('/orders') }}"   enctype="multipart/form-data"  novalidate>
                        {!! csrf_field() !!}

                           <div class="form-body">
                                                <div class="row">








           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('orders_subscriber_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('subscriber_id')   }}" data-placement="left"  data-content="{{ __('orders_subscriber_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_subscriber_id_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('subscriber_id') ? 'is-invalid' : '' }}" name="subscriber_id" placeholder="{{ __('orders_subscriber_id') }}" data-validation-required-message="{{ __('This field is required') }}" >
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
                                                                <span>{{ __('orders_order_status_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">

                                                                     <select   data-toggle="popover"   data-placement="left"  data-content="{{ __('orders_order_status_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_order_status_id_data-original-title') }}"  class="form-control {{ $errors->has('order_status_id') ? 'is-invalid' : '' }}"     data-validation-required-message="{{ __('This field is required') }}" name="order_status_id" >

                            @foreach($order_statuses as $order_status)
                             <option    value="{{ $order_status->id }}" >{{ $order_status->name }}</option>
                             @endforeach
                            </select>

                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('order_status_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('order_status_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>







           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('orders_company_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('company_id')   }}" data-placement="left"  data-content="{{ __('orders_company_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_company_id_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('company_id') ? 'is-invalid' : '' }}" name="company_id" placeholder="{{ __('orders_company_id') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('company_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('company_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>






           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('orders_company_distance') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('company_distance')   }}" data-placement="left"  data-content="{{ __('orders_company_distance_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_company_distance_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('company_distance') ? 'is-invalid' : '' }}" name="company_distance" placeholder="{{ __('orders_company_distance') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('company_distance'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('company_distance') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>





           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('orders_distance_unit_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">

                                                                     <select   data-toggle="popover"   data-placement="left"  data-content="{{ __('orders_distance_unit_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_distance_unit_id_data-original-title') }}"  class="form-control {{ $errors->has('distance_unit_id') ? 'is-invalid' : '' }}"     data-validation-required-message="{{ __('This field is required') }}" name="distance_unit_id" >

                            @foreach($distance_units as $distance_unit)
                             <option    value="{{ $distance_unit->id }}" >{{ $distance_unit->name }}</option>
                             @endforeach
                            </select>

                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('distance_unit_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('distance_unit_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>






           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('orders_payment_type_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">

                                                                     <select   data-toggle="popover"   data-placement="left"  data-content="{{ __('orders_payment_type_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_payment_type_id_data-original-title') }}"  class="form-control {{ $errors->has('payment_type_id') ? 'is-invalid' : '' }}"     data-validation-required-message="{{ __('This field is required') }}" name="payment_type_id" >

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
                                                                <span>{{ __('orders_payment_method_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">

                                                                     <select   data-toggle="popover"   data-placement="left"  data-content="{{ __('orders_payment_method_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_payment_method_id_data-original-title') }}"  class="form-control {{ $errors->has('payment_method_id') ? 'is-invalid' : '' }}"     data-validation-required-message="{{ __('This field is required') }}" name="payment_method_id" >

                            @foreach($payment_methods as $payment_method)
                             <option    value="{{ $payment_method->id }}" >{{ $payment_method->name }}</option>
                             @endforeach
                            </select>

                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('payment_method_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('payment_method_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>






           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('orders_order_items_availability_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">

                                                                     <select   data-toggle="popover"   data-placement="left"  data-content="{{ __('orders_order_items_availability_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_order_items_availability_id_data-original-title') }}"  class="form-control {{ $errors->has('order_items_availability_id') ? 'is-invalid' : '' }}"     data-validation-required-message="{{ __('This field is required') }}" name="order_items_availability_id" >

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
                                                                <span>{{ __('orders_shipping_type_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">

                                                                     <select   data-toggle="popover"   data-placement="left"  data-content="{{ __('orders_shipping_type_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_shipping_type_id_data-original-title') }}"  class="form-control {{ $errors->has('shipping_type_id') ? 'is-invalid' : '' }}"     data-validation-required-message="{{ __('This field is required') }}" name="shipping_type_id" >

                            @foreach($shipping_types as $shipping_type)
                             <option    value="{{ $shipping_type->id }}" >{{ $shipping_type->name }}</option>
                             @endforeach
                            </select>

                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('shipping_type_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('shipping_type_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>







           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('orders_shipping_method_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('shipping_method_id')   }}" data-placement="left"  data-content="{{ __('orders_shipping_method_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_shipping_method_id_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('shipping_method_id') ? 'is-invalid' : '' }}" name="shipping_method_id" placeholder="{{ __('orders_shipping_method_id') }}" data-validation-required-message="{{ __('This field is required') }}" >
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
                                                                <span>{{ __('orders_shipping_price') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('shipping_price')   }}" data-placement="left"  data-content="{{ __('orders_shipping_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_shipping_price_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('shipping_price') ? 'is-invalid' : '' }}" name="shipping_price" placeholder="{{ __('orders_shipping_price') }}" data-validation-required-message="{{ __('This field is required') }}" >
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
                                                                <span>{{ __('orders_tax') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('tax')   }}" data-placement="left"  data-content="{{ __('orders_tax_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_tax_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" name="tax" placeholder="{{ __('orders_tax') }}" data-validation-required-message="{{ __('This field is required') }}" >
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
                                                                <span>{{ __('orders_default_sales_tax') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('default_sales_tax')   }}" data-placement="left"  data-content="{{ __('orders_default_sales_tax_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_default_sales_tax_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('default_sales_tax') ? 'is-invalid' : '' }}" name="default_sales_tax" placeholder="{{ __('orders_default_sales_tax') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('default_sales_tax'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('default_sales_tax') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>






           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('orders_price') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('price')   }}" data-placement="left"  data-content="{{ __('orders_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_price_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" placeholder="{{ __('orders_price') }}" data-validation-required-message="{{ __('This field is required') }}" >
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
                                                                <span>{{ __('orders_total_price') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('total_price')   }}" data-placement="left"  data-content="{{ __('orders_total_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_total_price_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('total_price') ? 'is-invalid' : '' }}" name="total_price" placeholder="{{ __('orders_total_price') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('total_price'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('total_price') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>









       <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>@lang('orders_notes')</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <textarea  data-toggle="popover"   data-placement="left"  data-content="{{ __('orders_notes_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_notes_data-original-title') }}"    class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" placeholder="@lang('orders_notes')"   >{{ old('notes') }}</textarea>
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-text"></i>
                                                                    </div>


                                @if ($errors->has('notes'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('notes') }}
                                                </div>
                                              @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>






           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('orders_order_longitude') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('order_longitude')   }}" data-placement="left"  data-content="{{ __('orders_order_longitude_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_order_longitude_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('order_longitude') ? 'is-invalid' : '' }}" name="order_longitude" placeholder="{{ __('orders_order_longitude') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('order_longitude'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('order_longitude') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>






           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('orders_order_latitude') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('order_latitude')   }}" data-placement="left"  data-content="{{ __('orders_order_latitude_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_order_latitude_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('order_latitude') ? 'is-invalid' : '' }}" name="order_latitude" placeholder="{{ __('orders_order_latitude') }}" data-validation-required-message="{{ __('This field is required') }}" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('order_latitude'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('order_latitude') }}
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


