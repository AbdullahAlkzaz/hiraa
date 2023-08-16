@extends('layouts.app')

@section('content')
    @unless(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('Orders'))
  <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless

 			<div class="page-header">
							<h1>
							       @lang('messages.orders_orders')
								<small>
									<i class="ace-icon fa fa-angle-double-left"></i>
								      @lang('messages.orders_update')
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">




    	<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">  <a href="/orders">     @lang('messages.orders_orders')  </a>  </h4>

													<span class="widget-toolbar">
																	<a href="#" data-action="settings" data-toggle="dropdown">
															<i class="ace-icon fa fa-bars"></i>
														</a>

														<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
															<li>
<a href="/orders/create" title = "@lang('messages.orders_add_new')  "  ><i class="fa fa-plus fa-lg"></i>
@lang('messages.orders_add_new')
</a>
															</li>



														</ul>

														<a href="#" data-action="reload">
															<i class="ace-icon fa fa-refresh"></i>
														</a>

                                                        		<a href="#" data-action="fullscreen" class="orange2">
														<i class="ace-icon fa fa-expand"></i>
													</a>

														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>

														<a href="#" data-action="close">
															<i class="ace-icon fa fa-times"></i>
														</a>
													</span>
												</div>

												<div class="widget-body">
													<div class="widget-main">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/orders') }}">
                        {!! csrf_field() !!}




           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('orders_subscriber_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $order->subscriber_id  }}" data-placement="left"  data-content="{{ __('orders_subscriber_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_subscriber_id_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('subscriber_id') ? 'is-invalid' : '' }}" name="subscriber_id" placeholder="{{ __('orders_subscriber_id') }}">
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

                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('orders_order_status_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('orders_order_status_id_data-original-title') }}"  class="form-control  {{ $errors->has('order_status_id') ? 'is-invalid' : '' }} "  name="order_status_id" >

                            @foreach($order_statuses as $order_status)
                             <option  <?php echo ($order->order_status_id == $order_status->id) ? 'selected="selected"' : '' ; ?>    value="{{ $order_status->id }}" >{{ $order_status->name }}</option>
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
                                                                    <input  data-toggle="popover" value="{{ $order->company_id  }}" data-placement="left"  data-content="{{ __('orders_company_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_company_id_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('company_id') ? 'is-invalid' : '' }}" name="company_id" placeholder="{{ __('orders_company_id') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $order->company_distance  }}" data-placement="left"  data-content="{{ __('orders_company_distance_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_company_distance_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('company_distance') ? 'is-invalid' : '' }}" name="company_distance" placeholder="{{ __('orders_company_distance') }}">
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

                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('orders_distance_unit_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('orders_distance_unit_id_data-original-title') }}"  class="form-control  {{ $errors->has('distance_unit_id') ? 'is-invalid' : '' }} "  name="distance_unit_id" >

                            @foreach($distance_units as $distance_unit)
                             <option  <?php echo ($order->distance_unit_id == $distance_unit->id) ? 'selected="selected"' : '' ; ?>    value="{{ $distance_unit->id }}" >{{ $distance_unit->name }}</option>
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

                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('orders_payment_type_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('orders_payment_type_id_data-original-title') }}"  class="form-control  {{ $errors->has('payment_type_id') ? 'is-invalid' : '' }} "  name="payment_type_id" >

                            @foreach($payment_types as $payment_type)
                             <option  <?php echo ($order->payment_type_id == $payment_type->id) ? 'selected="selected"' : '' ; ?>    value="{{ $payment_type->id }}" >{{ $payment_type->name }}</option>
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

                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('orders_payment_method_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('orders_payment_method_id_data-original-title') }}"  class="form-control  {{ $errors->has('payment_method_id') ? 'is-invalid' : '' }} "  name="payment_method_id" >

                            @foreach($payment_methods as $payment_method)
                             <option  <?php echo ($order->payment_method_id == $payment_method->id) ? 'selected="selected"' : '' ; ?>    value="{{ $payment_method->id }}" >{{ $payment_method->name }}</option>
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

                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('orders_order_items_availability_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('orders_order_items_availability_id_data-original-title') }}"  class="form-control  {{ $errors->has('order_items_availability_id') ? 'is-invalid' : '' }} "  name="order_items_availability_id" >

                            @foreach($order_items_availabilities as $order_items_availability)
                             <option  <?php echo ($order->order_items_availability_id == $order_items_availability->id) ? 'selected="selected"' : '' ; ?>    value="{{ $order_items_availability->id }}" >{{ $order_items_availability->name }}</option>
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

                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('orders_shipping_type_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('orders_shipping_type_id_data-original-title') }}"  class="form-control  {{ $errors->has('shipping_type_id') ? 'is-invalid' : '' }} "  name="shipping_type_id" >

                            @foreach($shipping_types as $shipping_type)
                             <option  <?php echo ($order->shipping_type_id == $shipping_type->id) ? 'selected="selected"' : '' ; ?>    value="{{ $shipping_type->id }}" >{{ $shipping_type->name }}</option>
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
                                                                    <input  data-toggle="popover" value="{{ $order->shipping_method_id  }}" data-placement="left"  data-content="{{ __('orders_shipping_method_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_shipping_method_id_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('shipping_method_id') ? 'is-invalid' : '' }}" name="shipping_method_id" placeholder="{{ __('orders_shipping_method_id') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $order->shipping_price  }}" data-placement="left"  data-content="{{ __('orders_shipping_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_shipping_price_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('shipping_price') ? 'is-invalid' : '' }}" name="shipping_price" placeholder="{{ __('orders_shipping_price') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $order->tax  }}" data-placement="left"  data-content="{{ __('orders_tax_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_tax_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" name="tax" placeholder="{{ __('orders_tax') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $order->default_sales_tax  }}" data-placement="left"  data-content="{{ __('orders_default_sales_tax_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_default_sales_tax_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('default_sales_tax') ? 'is-invalid' : '' }}" name="default_sales_tax" placeholder="{{ __('orders_default_sales_tax') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $order->price  }}" data-placement="left"  data-content="{{ __('orders_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_price_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" placeholder="{{ __('orders_price') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $order->total_price  }}" data-placement="left"  data-content="{{ __('orders_total_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_total_price_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('total_price') ? 'is-invalid' : '' }}" name="total_price" placeholder="{{ __('orders_total_price') }}">
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
                                                                    <textarea  data-toggle="popover"   data-placement="left"  data-content="{{ __('orders_notes_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_notes_data-original-title') }}"    class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" placeholder="@lang('orders_notes')"   >{{ $order->notes   }}</textarea>
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
                                                                    <input  data-toggle="popover" value="{{ $order->order_longitude  }}" data-placement="left"  data-content="{{ __('orders_order_longitude_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_order_longitude_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('order_longitude') ? 'is-invalid' : '' }}" name="order_longitude" placeholder="{{ __('orders_order_longitude') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $order->order_latitude  }}" data-placement="left"  data-content="{{ __('orders_order_latitude_data-content') }}" data-trigger="hover"  data-original-title="{{ __('orders_order_latitude_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('order_latitude') ? 'is-invalid' : '' }}" name="order_latitude" placeholder="{{ __('orders_order_latitude') }}">
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




 <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary pull-left">
                                    <i class="fa fa-btn fa-save"></i>@lang('messages.orders_update')
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>

               </div>
                </div>
                </div>







@endsection
