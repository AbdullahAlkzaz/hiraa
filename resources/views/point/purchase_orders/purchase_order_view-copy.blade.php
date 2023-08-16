@extends('layouts.app')
@section('content-header')

                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">{{ __('purchase_orders_purchase_orders') }}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('purchase_orders.index') }}">{{ __('purchase_orders_purchase_orders') }}</a>
                                    </li>
								     <li class="breadcrumb-item active">  @lang('purchase_orders_show_title') {{$purchase_order->id}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!--div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
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
                                        
                                       
                     <form class="form-horizontal" role="form" method="POST" action="/purchase_orders/{{$purchase_order->id}}"   enctype="multipart/form-data"  novalidate>

  {!! csrf_field() !!}
                    {{ method_field('PUT') }}
                                       
                                         <div class="form-body">
                                                <div class="row">



                 



                        


           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('purchase_orders_order_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order->order_id  }}" data-placement="left"  data-content="{{ __('purchase_orders_order_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_orders_order_id_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('order_id') ? 'is-invalid' : '' }}" name="order_id" placeholder="{{ __('purchase_orders_order_id') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('order_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('order_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('purchase_orders_subscriber_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order->subscriber_id  }}" data-placement="left"  data-content="{{ __('purchase_orders_subscriber_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_orders_subscriber_id_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('subscriber_id') ? 'is-invalid' : '' }}" name="subscriber_id" placeholder="{{ __('purchase_orders_subscriber_id') }}">
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
                                                                <span>{{ __('purchase_orders_purchase_order_status_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('purchase_orders_purchase_order_status_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('purchase_orders_purchase_order_status_id_data-original-title') }}"  class="form-control  {{ $errors->has('purchase_order_status_id') ? 'is-invalid' : '' }} "  name="purchase_order_status_id" >

                            @foreach($purchase_order_statuses as $purchase_order_status)
                             <option  <?php echo ($purchase_order->purchase_order_status_id == $purchase_order_status->id) ? 'selected="selected"' : '' ; ?>    value="{{ $purchase_order_status->id }}" >{{ $purchase_order_status->name }}</option>
                             @endforeach
                            </select>
                                                                   
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('purchase_order_status_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('purchase_order_status_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    


           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('purchase_orders_company_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order->company_id  }}" data-placement="left"  data-content="{{ __('purchase_orders_company_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_orders_company_id_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('company_id') ? 'is-invalid' : '' }}" name="company_id" placeholder="{{ __('purchase_orders_company_id') }}">
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
                                                                <span>{{ __('purchase_orders_payment_type_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('purchase_orders_payment_type_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('purchase_orders_payment_type_id_data-original-title') }}"  class="form-control  {{ $errors->has('payment_type_id') ? 'is-invalid' : '' }} "  name="payment_type_id" >

                            @foreach($payment_types as $payment_type)
                             <option  <?php echo ($purchase_order->payment_type_id == $payment_type->id) ? 'selected="selected"' : '' ; ?>    value="{{ $payment_type->id }}" >{{ $payment_type->name }}</option>
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
                                                                <span>{{ __('purchase_orders_payment_status_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('purchase_orders_payment_status_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('purchase_orders_payment_status_id_data-original-title') }}"  class="form-control  {{ $errors->has('payment_status_id') ? 'is-invalid' : '' }} "  name="payment_status_id" >

                            @foreach($payment_statuses as $payment_status)
                             <option  <?php echo ($purchase_order->payment_status_id == $payment_status->id) ? 'selected="selected"' : '' ; ?>    value="{{ $payment_status->id }}" >{{ $payment_status->name }}</option>
                             @endforeach
                            </select>
                                                                   
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('payment_status_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('payment_status_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

                        
 <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('purchase_orders_payment_method_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('purchase_orders_payment_method_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('purchase_orders_payment_method_id_data-original-title') }}"  class="form-control  {{ $errors->has('payment_method_id') ? 'is-invalid' : '' }} "  name="payment_method_id" >

                            @foreach($payment_methods as $payment_method)
                             <option  <?php echo ($purchase_order->payment_method_id == $payment_method->id) ? 'selected="selected"' : '' ; ?>    value="{{ $payment_method->id }}" >{{ $payment_method->name }}</option>
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
                                                                <span>{{ __('purchase_orders_shipping_type_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('purchase_orders_shipping_type_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('purchase_orders_shipping_type_id_data-original-title') }}"  class="form-control  {{ $errors->has('shipping_type_id') ? 'is-invalid' : '' }} "  name="shipping_type_id" >

                            @foreach($shipping_types as $shipping_type)
                             <option  <?php echo ($purchase_order->shipping_type_id == $shipping_type->id) ? 'selected="selected"' : '' ; ?>    value="{{ $shipping_type->id }}" >{{ $shipping_type->name }}</option>
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
                                                                <span>{{ __('purchase_orders_shipping_method_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order->shipping_method_id  }}" data-placement="left"  data-content="{{ __('purchase_orders_shipping_method_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_orders_shipping_method_id_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('shipping_method_id') ? 'is-invalid' : '' }}" name="shipping_method_id" placeholder="{{ __('purchase_orders_shipping_method_id') }}">
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
                                                                <span>{{ __('purchase_orders_shipping_price') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order->shipping_price  }}" data-placement="left"  data-content="{{ __('purchase_orders_shipping_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_orders_shipping_price_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('shipping_price') ? 'is-invalid' : '' }}" name="shipping_price" placeholder="{{ __('purchase_orders_shipping_price') }}">
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
                                                                <span>{{ __('purchase_orders_tax') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order->tax  }}" data-placement="left"  data-content="{{ __('purchase_orders_tax_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_orders_tax_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" name="tax" placeholder="{{ __('purchase_orders_tax') }}">
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
                                                                <span>{{ __('purchase_orders_default_sales_tax') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order->default_sales_tax  }}" data-placement="left"  data-content="{{ __('purchase_orders_default_sales_tax_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_orders_default_sales_tax_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('default_sales_tax') ? 'is-invalid' : '' }}" name="default_sales_tax" placeholder="{{ __('purchase_orders_default_sales_tax') }}">
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
                                                                <span>{{ __('purchase_orders_price') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order->price  }}" data-placement="left"  data-content="{{ __('purchase_orders_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_orders_price_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" placeholder="{{ __('purchase_orders_price') }}">
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
                                                                <span>{{ __('purchase_orders_total_price') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order->total_price  }}" data-placement="left"  data-content="{{ __('purchase_orders_total_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_orders_total_price_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('total_price') ? 'is-invalid' : '' }}" name="total_price" placeholder="{{ __('purchase_orders_total_price') }}">
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
                                                                <span>@lang('purchase_orders_notes')</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <textarea  data-toggle="popover"   data-placement="left"  data-content="{{ __('purchase_orders_notes_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_orders_notes_data-original-title') }}"    class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" placeholder="@lang('purchase_orders_notes')"   >{{ $purchase_order->notes   }}</textarea>
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
                                                                <span>{{ __('purchase_orders_order_longitude') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order->order_longitude  }}" data-placement="left"  data-content="{{ __('purchase_orders_order_longitude_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_orders_order_longitude_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('order_longitude') ? 'is-invalid' : '' }}" name="order_longitude" placeholder="{{ __('purchase_orders_order_longitude') }}">
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
                                                                <span>{{ __('purchase_orders_order_latitude') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order->order_latitude  }}" data-placement="left"  data-content="{{ __('purchase_orders_order_latitude_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_orders_order_latitude_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('order_latitude') ? 'is-invalid' : '' }}" name="order_latitude" placeholder="{{ __('purchase_orders_order_latitude') }}">
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


  <!--ul class="pager">
                 @if($previous)
											<li class="previous">
												<a href="/purchase_orders/{{$previous}}"><i class="ace-icon fa fa-angle-double-right"></i> @lang('messages.previous')   </a>
											</li>
                @endif
                @if($next)
											<li class="next">
												<a href="/purchase_orders/{{$next}}"> @lang('messages.next')   <i class="ace-icon fa fa-angle-double-left"></i> </a>
											</li>
                @endif
	</ul-->

  
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
 
 

    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="/app-assets/js/scripts/forms/number-input.js"></script>
    <!-- END: Page JS-->
     
    
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
  
