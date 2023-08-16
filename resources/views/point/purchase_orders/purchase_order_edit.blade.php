@extends('layouts.app')

@section('content')
    @unless(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Purchase orders'))
  <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless

 			<div class="page-header">
							<h1>
							       @lang('messages.purchase_orders_purchase_orders')
								<small>
									<i class="ace-icon fa fa-angle-double-left"></i>
								      @lang('messages.purchase_orders_update')
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">




    	<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">  <a href="/purchase_orders">     @lang('messages.purchase_orders_purchase_orders')  </a>  </h4>

													<span class="widget-toolbar">
																	<a href="#" data-action="settings" data-toggle="dropdown">
															<i class="ace-icon fa fa-bars"></i>
														</a>

														<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
															<li>
<a href="/purchase_orders/create" title = "@lang('messages.purchase_orders_add_new')  "  ><i class="fa fa-plus fa-lg"></i>
@lang('messages.purchase_orders_add_new')
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/purchase_orders') }}">
                        {!! csrf_field() !!}




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




 <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary pull-left">
                                    <i class="fa fa-btn fa-save"></i>@lang('messages.purchase_orders_update')
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
