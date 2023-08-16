@extends('layouts.app')

@section('content')


 			<div class="page-header">
							<h1>
							       @lang('messages.quotation_items_quotation_items')
								<small>
									<i class="ace-icon fa fa-angle-double-left"></i>
								      @lang('messages.quotation_items_update')
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">




    	<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">  <a href="/quotation_items">     @lang('messages.quotation_items_quotation_items')  </a>  </h4>

													<span class="widget-toolbar">
																	<a href="#" data-action="settings" data-toggle="dropdown">
															<i class="ace-icon fa fa-bars"></i>
														</a>

														<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
															<li>
<a href="/quotation_items/create" title = "@lang('messages.quotation_items_add_new')  "  ><i class="fa fa-plus fa-lg"></i>
@lang('messages.quotation_items_add_new') 
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/quotation_items') }}">
                        {!! csrf_field() !!}

                        

                        
 <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotation_items_quotation_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('quotation_items_quotation_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('quotation_items_quotation_id_data-original-title') }}"  class="form-control  {{ $errors->has('quotation_id') ? 'is-invalid' : '' }} "  name="quotation_id" >

                            @foreach($quotations as $quotation)
                             <option  <?php echo ($quotation_item->quotation_id == $quotation->id) ? 'selected="selected"' : '' ; ?>    value="{{ $quotation->id }}" >{{ $quotation->subscriber_id }}</option>
                             @endforeach
                            </select>
                                                                   
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('quotation_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('quotation_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    


           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotation_items_product_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $quotation_item->product_id  }}" data-placement="left"  data-content="{{ __('quotation_items_product_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_items_product_id_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('product_id') ? 'is-invalid' : '' }}" name="product_id" placeholder="{{ __('quotation_items_product_id') }}">
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
                                                                <span>{{ __('quotation_items_price') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $quotation_item->price  }}" data-placement="left"  data-content="{{ __('quotation_items_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_items_price_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" placeholder="{{ __('quotation_items_price') }}">
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
                                                                <span>{{ __('quotation_items_quantity') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $quotation_item->quantity  }}" data-placement="left"  data-content="{{ __('quotation_items_quantity_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_items_quantity_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" name="quantity" placeholder="{{ __('quotation_items_quantity') }}">
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
                                                                <span>{{ __('quotation_items_total_price') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $quotation_item->total_price  }}" data-placement="left"  data-content="{{ __('quotation_items_total_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_items_total_price_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('total_price') ? 'is-invalid' : '' }}" name="total_price" placeholder="{{ __('quotation_items_total_price') }}">
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
                                                                <span>{{ __('quotation_items_branch_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $quotation_item->branch_id  }}" data-placement="left"  data-content="{{ __('quotation_items_branch_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_items_branch_id_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('branch_id') ? 'is-invalid' : '' }}" name="branch_id" placeholder="{{ __('quotation_items_branch_id') }}">
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
                                                                <span>{{ __('quotation_items_selling_price') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $quotation_item->selling_price  }}" data-placement="left"  data-content="{{ __('quotation_items_selling_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_items_selling_price_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('selling_price') ? 'is-invalid' : '' }}" name="selling_price" placeholder="{{ __('quotation_items_selling_price') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('selling_price'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('selling_price') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotation_items_profit_ratio') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $quotation_item->profit_ratio  }}" data-placement="left"  data-content="{{ __('quotation_items_profit_ratio_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_items_profit_ratio_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('profit_ratio') ? 'is-invalid' : '' }}" name="profit_ratio" placeholder="{{ __('quotation_items_profit_ratio') }}">
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
                                                    



 <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary pull-left">
                                    <i class="fa fa-btn fa-save"></i>@lang('messages.quotation_items_update') 
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
