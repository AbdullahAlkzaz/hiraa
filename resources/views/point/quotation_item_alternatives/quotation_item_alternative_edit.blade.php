@extends('layouts.app')

@section('content')


 			<div class="page-header">
							<h1>
							       @lang('messages.quotation_item_alternatives_quotation_item_alternatives')
								<small>
									<i class="ace-icon fa fa-angle-double-left"></i>
								      @lang('messages.quotation_item_alternatives_update')
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">




    	<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">  <a href="/quotation_item_alternatives">     @lang('messages.quotation_item_alternatives_quotation_item_alternatives')  </a>  </h4>

													<span class="widget-toolbar">
																	<a href="#" data-action="settings" data-toggle="dropdown">
															<i class="ace-icon fa fa-bars"></i>
														</a>

														<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
															<li>
<a href="/quotation_item_alternatives/create" title = "@lang('messages.quotation_item_alternatives_add_new')  "  ><i class="fa fa-plus fa-lg"></i>
@lang('messages.quotation_item_alternatives_add_new') 
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/quotation_item_alternatives') }}">
                        {!! csrf_field() !!}

                        

                        
 <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotation_item_alternatives_quotation_item_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('quotation_item_alternatives_quotation_item_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('quotation_item_alternatives_quotation_item_id_data-original-title') }}"  class="form-control  {{ $errors->has('quotation_item_id') ? 'is-invalid' : '' }} "  name="quotation_item_id" >

                            @foreach($quotation_items as $quotation_item)
                             <option  <?php echo ($quotation_item_alternative->quotation_item_id == $quotation_item->id) ? 'selected="selected"' : '' ; ?>    value="{{ $quotation_item->id }}" >{{ $quotation_item->quotation_id }}</option>
                             @endforeach
                            </select>
                                                                   
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('quotation_item_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('quotation_item_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    


           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotation_item_alternatives_product_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $quotation_item_alternative->product_id  }}" data-placement="left"  data-content="{{ __('quotation_item_alternatives_product_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_item_alternatives_product_id_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('product_id') ? 'is-invalid' : '' }}" name="product_id" placeholder="{{ __('quotation_item_alternatives_product_id') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('product_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('product_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotation_item_alternatives_price') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $quotation_item_alternative->price  }}" data-placement="left"  data-content="{{ __('quotation_item_alternatives_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_item_alternatives_price_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" placeholder="{{ __('quotation_item_alternatives_price') }}">
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
                                                                <span>{{ __('quotation_item_alternatives_quantity') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $quotation_item_alternative->quantity  }}" data-placement="left"  data-content="{{ __('quotation_item_alternatives_quantity_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_item_alternatives_quantity_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" name="quantity" placeholder="{{ __('quotation_item_alternatives_quantity') }}">
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
                                                                <span>{{ __('quotation_item_alternatives_shipping_price') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $quotation_item_alternative->shipping_price  }}" data-placement="left"  data-content="{{ __('quotation_item_alternatives_shipping_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_item_alternatives_shipping_price_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('shipping_price') ? 'is-invalid' : '' }}" name="shipping_price" placeholder="{{ __('quotation_item_alternatives_shipping_price') }}">
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
                                                                <span>{{ __('quotation_item_alternatives_branch_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $quotation_item_alternative->branch_id  }}" data-placement="left"  data-content="{{ __('quotation_item_alternatives_branch_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_item_alternatives_branch_id_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('branch_id') ? 'is-invalid' : '' }}" name="branch_id" placeholder="{{ __('quotation_item_alternatives_branch_id') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('branch_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('branch_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    


                        
 <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotation_item_alternatives_part_type_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('quotation_item_alternatives_part_type_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('quotation_item_alternatives_part_type_id_data-original-title') }}"  class="form-control  {{ $errors->has('part_type_id') ? 'is-invalid' : '' }} "  name="part_type_id" >

                            @foreach($part_types as $part_type)
                             <option  <?php echo ($quotation_item_alternative->part_type_id == $part_type->id) ? 'selected="selected"' : '' ; ?>    value="{{ $part_type->id }}" >{{ $part_type->name }}</option>
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
                                                                <span>{{ __('quotation_item_alternatives_payment_type_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('quotation_item_alternatives_payment_type_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('quotation_item_alternatives_payment_type_id_data-original-title') }}"  class="form-control  {{ $errors->has('payment_type_id') ? 'is-invalid' : '' }} "  name="payment_type_id" >

                            @foreach($payment_types as $payment_type)
                             <option  <?php echo ($quotation_item_alternative->payment_type_id == $payment_type->id) ? 'selected="selected"' : '' ; ?>    value="{{ $payment_type->id }}" >{{ $payment_type->name }}</option>
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
                                                                <span>{{ __('quotation_item_alternatives_order_items_availability_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('quotation_item_alternatives_order_items_availability_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('quotation_item_alternatives_order_items_availability_id_data-original-title') }}"  class="form-control  {{ $errors->has('order_items_availability_id') ? 'is-invalid' : '' }} "  name="order_items_availability_id" >

                            @foreach($order_items_availabilities as $order_items_availability)
                             <option  <?php echo ($quotation_item_alternative->order_items_availability_id == $order_items_availability->id) ? 'selected="selected"' : '' ; ?>    value="{{ $order_items_availability->id }}" >{{ $order_items_availability->name }}</option>
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
                                                                <span>{{ __('quotation_item_alternatives_is_selected') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $quotation_item_alternative->is_selected  }}" data-placement="left"  data-content="{{ __('quotation_item_alternatives_is_selected_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_item_alternatives_is_selected_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('is_selected') ? 'is-invalid' : '' }}" name="is_selected" placeholder="{{ __('quotation_item_alternatives_is_selected') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('is_selected'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('is_selected') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    



 <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary pull-left">
                                    <i class="fa fa-btn fa-save"></i>@lang('messages.quotation_item_alternatives_update') 
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
