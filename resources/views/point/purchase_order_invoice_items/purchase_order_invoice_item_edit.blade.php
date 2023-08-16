@extends('layouts.app')

@section('content')


 			<div class="page-header">
							<h1>
							       @lang('messages.purchase_order_invoice_items_purchase_order_invoice_items')
								<small>
									<i class="ace-icon fa fa-angle-double-left"></i>
								      @lang('messages.purchase_order_invoice_items_update')
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">




    	<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">  <a href="/purchase_order_invoice_items">     @lang('messages.purchase_order_invoice_items_purchase_order_invoice_items')  </a>  </h4>

													<span class="widget-toolbar">
																	<a href="#" data-action="settings" data-toggle="dropdown">
															<i class="ace-icon fa fa-bars"></i>
														</a>

														<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
															<li>
<a href="/purchase_order_invoice_items/create" title = "@lang('messages.purchase_order_invoice_items_add_new')  "  ><i class="fa fa-plus fa-lg"></i>
@lang('messages.purchase_order_invoice_items_add_new') 
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/purchase_order_invoice_items') }}">
                        {!! csrf_field() !!}

                        

                        
 <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('purchase_order_invoice_items_purchase_order_invoice_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('purchase_order_invoice_items_purchase_order_invoice_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('purchase_order_invoice_items_purchase_order_invoice_id_data-original-title') }}"  class="form-control  {{ $errors->has('purchase_order_invoice_id') ? 'is-invalid' : '' }} "  name="purchase_order_invoice_id" >

                            @foreach($purchase_order_invoices as $purchase_order_invoice)
                             <option  <?php echo ($purchase_order_invoice_item->purchase_order_invoice_id == $purchase_order_invoice->id) ? 'selected="selected"' : '' ; ?>    value="{{ $purchase_order_invoice->id }}" >{{ $purchase_order_invoice->invoice_number }}</option>
                             @endforeach
                            </select>
                                                                   
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('purchase_order_invoice_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('purchase_order_invoice_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    

                        
 <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('purchase_order_invoice_items_purchase_order_item_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('purchase_order_invoice_items_purchase_order_item_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('purchase_order_invoice_items_purchase_order_item_id_data-original-title') }}"  class="form-control  {{ $errors->has('purchase_order_item_id') ? 'is-invalid' : '' }} "  name="purchase_order_item_id" >

                            @foreach($purchase_order_items as $purchase_order_item)
                             <option  <?php echo ($purchase_order_invoice_item->purchase_order_item_id == $purchase_order_item->id) ? 'selected="selected"' : '' ; ?>    value="{{ $purchase_order_item->id }}" >{{ $purchase_order_item->branch_id }}</option>
                             @endforeach
                            </select>
                                                                   
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('purchase_order_item_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('purchase_order_item_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    


           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('purchase_order_invoice_items_price') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order_invoice_item->price  }}" data-placement="left"  data-content="{{ __('purchase_order_invoice_items_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_order_invoice_items_price_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" placeholder="{{ __('purchase_order_invoice_items_price') }}">
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
                                                                <span>{{ __('purchase_order_invoice_items_quantity') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order_invoice_item->quantity  }}" data-placement="left"  data-content="{{ __('purchase_order_invoice_items_quantity_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_order_invoice_items_quantity_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" name="quantity" placeholder="{{ __('purchase_order_invoice_items_quantity') }}">
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
                                                                <span>{{ __('purchase_order_invoice_items_total_price') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order_invoice_item->total_price  }}" data-placement="left"  data-content="{{ __('purchase_order_invoice_items_total_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_order_invoice_items_total_price_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('total_price') ? 'is-invalid' : '' }}" name="total_price" placeholder="{{ __('purchase_order_invoice_items_total_price') }}">
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
                                                                <span>{{ __('purchase_order_invoice_items_product_is_damaged') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $purchase_order_invoice_item->product_is_damaged  }}" data-placement="left"  data-content="{{ __('purchase_order_invoice_items_product_is_damaged_data-content') }}" data-trigger="hover"  data-original-title="{{ __('purchase_order_invoice_items_product_is_damaged_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('product_is_damaged') ? 'is-invalid' : '' }}" name="product_is_damaged" placeholder="{{ __('purchase_order_invoice_items_product_is_damaged') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('product_is_damaged'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('product_is_damaged') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    



 <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary pull-left">
                                    <i class="fa fa-btn fa-save"></i>@lang('messages.purchase_order_invoice_items_update') 
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
