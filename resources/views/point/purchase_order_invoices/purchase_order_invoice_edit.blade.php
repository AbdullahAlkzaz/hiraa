@extends('layouts.app')

@section('content')


 			<div class="page-header">
							<h1>
							       @lang('messages.purchase_order_invoices_purchase_order_invoices')
								<small>
									<i class="ace-icon fa fa-angle-double-left"></i>
								      @lang('messages.purchase_order_invoices_update')
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">




    	<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">  <a href="/purchase_order_invoices">     @lang('messages.purchase_order_invoices_purchase_order_invoices')  </a>  </h4>

													<span class="widget-toolbar">
																	<a href="#" data-action="settings" data-toggle="dropdown">
															<i class="ace-icon fa fa-bars"></i>
														</a>

														<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
															<li>
<a href="/purchase_order_invoices/create" title = "@lang('messages.purchase_order_invoices_add_new')  "  ><i class="fa fa-plus fa-lg"></i>
@lang('messages.purchase_order_invoices_add_new') 
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/purchase_order_invoices') }}">
                        {!! csrf_field() !!}

                        


           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('purchase_order_invoices_invoice_number') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order_invoice->invoice_number  }}" data-placement="left"  data-content="{{ __('purchase_order_invoices_invoice_number_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_order_invoices_invoice_number_data-original-title') }}" 
                                                                     type="text"   class="form-control {{ $errors->has('invoice_number') ? 'is-invalid' : '' }}" name="invoice_number" placeholder="{{ __('purchase_order_invoices_invoice_number') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('invoice_number'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('invoice_number') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    


                        
 <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('purchase_order_invoices_purchase_order_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('purchase_order_invoices_purchase_order_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('purchase_order_invoices_purchase_order_id_data-original-title') }}"  class="form-control  {{ $errors->has('purchase_order_id') ? 'is-invalid' : '' }} "  name="purchase_order_id" >

                            @foreach($purchase_orders as $purchase_order)
                             <option  <?php echo ($purchase_order_invoice->purchase_order_id == $purchase_order->id) ? 'selected="selected"' : '' ; ?>    value="{{ $purchase_order->id }}" >{{ $purchase_order->order_id }}</option>
                             @endforeach
                            </select>
                                                                   
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('purchase_order_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('purchase_order_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

                        
 <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('purchase_order_invoices_payment_status_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('purchase_order_invoices_payment_status_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('purchase_order_invoices_payment_status_id_data-original-title') }}"  class="form-control  {{ $errors->has('payment_status_id') ? 'is-invalid' : '' }} "  name="payment_status_id" >

                            @foreach($payment_statuses as $payment_status)
                             <option  <?php echo ($purchase_order_invoice->payment_status_id == $payment_status->id) ? 'selected="selected"' : '' ; ?>    value="{{ $payment_status->id }}" >{{ $payment_status->name }}</option>
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
                                                                <span>{{ __('purchase_order_invoices_invoice_type') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order_invoice->invoice_type  }}" data-placement="left"  data-content="{{ __('purchase_order_invoices_invoice_type_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_order_invoices_invoice_type_data-original-title') }}" 
                                                                     type="text"   class="form-control {{ $errors->has('invoice_type') ? 'is-invalid' : '' }}" name="invoice_type" placeholder="{{ __('purchase_order_invoices_invoice_type') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('invoice_type'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('invoice_type') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('purchase_order_invoices_price') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order_invoice->price  }}" data-placement="left"  data-content="{{ __('purchase_order_invoices_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_order_invoices_price_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" placeholder="{{ __('purchase_order_invoices_price') }}">
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
                                                                <span>{{ __('purchase_order_invoices_shipping_price') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order_invoice->shipping_price  }}" data-placement="left"  data-content="{{ __('purchase_order_invoices_shipping_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_order_invoices_shipping_price_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('shipping_price') ? 'is-invalid' : '' }}" name="shipping_price" placeholder="{{ __('purchase_order_invoices_shipping_price') }}">
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
                                                                <span>{{ __('purchase_order_invoices_tax') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order_invoice->tax  }}" data-placement="left"  data-content="{{ __('purchase_order_invoices_tax_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_order_invoices_tax_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" name="tax" placeholder="{{ __('purchase_order_invoices_tax') }}">
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
                                                                <span>{{ __('purchase_order_invoices_total_price') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order_invoice->total_price  }}" data-placement="left"  data-content="{{ __('purchase_order_invoices_total_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_order_invoices_total_price_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('total_price') ? 'is-invalid' : '' }}" name="total_price" placeholder="{{ __('purchase_order_invoices_total_price') }}">
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
                                                                <span>{{ __('purchase_order_invoices_notes') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order_invoice->notes  }}" data-placement="left"  data-content="{{ __('purchase_order_invoices_notes_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_order_invoices_notes_data-original-title') }}" 
                                                                     type="text"   class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" placeholder="{{ __('purchase_order_invoices_notes') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
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
                                                    



 <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary pull-left">
                                    <i class="fa fa-btn fa-save"></i>@lang('messages.purchase_order_invoices_update') 
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
