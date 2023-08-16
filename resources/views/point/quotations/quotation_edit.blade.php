@extends('layouts.app')

@section('content')


 			<div class="page-header">
							<h1>
							       @lang('messages.quotations_quotations')
								<small>
									<i class="ace-icon fa fa-angle-double-left"></i>
								      @lang('messages.quotations_update')
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">




    	<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">  <a href="/quotations">     @lang('messages.quotations_quotations')  </a>  </h4>

													<span class="widget-toolbar">
																	<a href="#" data-action="settings" data-toggle="dropdown">
															<i class="ace-icon fa fa-bars"></i>
														</a>

														<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
															<li>
<a href="/quotations/create" title = "@lang('messages.quotations_add_new')  "  ><i class="fa fa-plus fa-lg"></i>
@lang('messages.quotations_add_new') 
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/quotations') }}">
                        {!! csrf_field() !!}

                        


           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotations_subscriber_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $quotation->subscriber_id  }}" data-placement="left"  data-content="{{ __('quotations_subscriber_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_subscriber_id_data-original-title') }}" 
                                                                     type="text"   class="form-control {{ $errors->has('subscriber_id') ? 'is-invalid' : '' }}" name="subscriber_id" placeholder="{{ __('quotations_subscriber_id') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $quotation->customer_id  }}" data-placement="left"  data-content="{{ __('quotations_customer_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_customer_id_data-original-title') }}" 
                                                                     type="text"   class="form-control {{ $errors->has('customer_id') ? 'is-invalid' : '' }}" name="customer_id" placeholder="{{ __('quotations_customer_id') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $quotation->customer_address  }}" data-placement="left"  data-content="{{ __('quotations_customer_address_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_customer_address_data-original-title') }}" 
                                                                     type="text"   class="form-control {{ $errors->has('customer_address') ? 'is-invalid' : '' }}" name="customer_address" placeholder="{{ __('quotations_customer_address') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $quotation->customer_latitude  }}" data-placement="left"  data-content="{{ __('quotations_customer_latitude_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_customer_latitude_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('customer_latitude') ? 'is-invalid' : '' }}" name="customer_latitude" placeholder="{{ __('quotations_customer_latitude') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $quotation->customer_longitude  }}" data-placement="left"  data-content="{{ __('quotations_customer_longitude_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_customer_longitude_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('customer_longitude') ? 'is-invalid' : '' }}" name="customer_longitude" placeholder="{{ __('quotations_customer_longitude') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $quotation->number_of_required_pieces  }}" data-placement="left"  data-content="{{ __('quotations_number_of_required_pieces_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_number_of_required_pieces_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('number_of_required_pieces') ? 'is-invalid' : '' }}" name="number_of_required_pieces" placeholder="{{ __('quotations_number_of_required_pieces') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $quotation->number_of_available_pieces  }}" data-placement="left"  data-content="{{ __('quotations_number_of_available_pieces_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_number_of_available_pieces_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('number_of_available_pieces') ? 'is-invalid' : '' }}" name="number_of_available_pieces" placeholder="{{ __('quotations_number_of_available_pieces') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $quotation->number_of_collection_areas  }}" data-placement="left"  data-content="{{ __('quotations_number_of_collection_areas_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_number_of_collection_areas_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('number_of_collection_areas') ? 'is-invalid' : '' }}" name="number_of_collection_areas" placeholder="{{ __('quotations_number_of_collection_areas') }}">
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
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('quotations_part_type_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('quotations_part_type_id_data-original-title') }}"  class="form-control  {{ $errors->has('part_type_id') ? 'is-invalid' : '' }} "  name="part_type_id" >

                            @foreach($part_types as $part_type)
                             <option  <?php echo ($quotation->part_type_id == $part_type->id) ? 'selected="selected"' : '' ; ?>    value="{{ $part_type->id }}" >{{ $part_type->name }}</option>
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
                                                                    <input  data-toggle="popover" value="{{ $quotation->expected_delivery_time_min  }}" data-placement="left"  data-content="{{ __('quotations_expected_delivery_time_min_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_expected_delivery_time_min_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('expected_delivery_time_min') ? 'is-invalid' : '' }}" name="expected_delivery_time_min" placeholder="{{ __('quotations_expected_delivery_time_min') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $quotation->expected_delivery_time_max  }}" data-placement="left"  data-content="{{ __('quotations_expected_delivery_time_max_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_expected_delivery_time_max_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('expected_delivery_time_max') ? 'is-invalid' : '' }}" name="expected_delivery_time_max" placeholder="{{ __('quotations_expected_delivery_time_max') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $quotation->order_cost  }}" data-placement="left"  data-content="{{ __('quotations_order_cost_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_order_cost_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('order_cost') ? 'is-invalid' : '' }}" name="order_cost" placeholder="{{ __('quotations_order_cost') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $quotation->tax  }}" data-placement="left"  data-content="{{ __('quotations_tax_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_tax_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" name="tax" placeholder="{{ __('quotations_tax') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $quotation->total_order  }}" data-placement="left"  data-content="{{ __('quotations_total_order_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_total_order_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('total_order') ? 'is-invalid' : '' }}" name="total_order" placeholder="{{ __('quotations_total_order') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $quotation->shipping_cost  }}" data-placement="left"  data-content="{{ __('quotations_shipping_cost_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_shipping_cost_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('shipping_cost') ? 'is-invalid' : '' }}" name="shipping_cost" placeholder="{{ __('quotations_shipping_cost') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $quotation->profit_ratio  }}" data-placement="left"  data-content="{{ __('quotations_profit_ratio_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_profit_ratio_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('profit_ratio') ? 'is-invalid' : '' }}" name="profit_ratio" placeholder="{{ __('quotations_profit_ratio') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $quotation->profit_amount  }}" data-placement="left"  data-content="{{ __('quotations_profit_amount_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_profit_amount_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('profit_amount') ? 'is-invalid' : '' }}" name="profit_amount" placeholder="{{ __('quotations_profit_amount') }}">
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
                                                                    <input  data-toggle="popover" value="{{ $quotation->quotation_amount  }}" data-placement="left"  data-content="{{ __('quotations_quotation_amount_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotations_quotation_amount_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('quotation_amount') ? 'is-invalid' : '' }}" name="quotation_amount" placeholder="{{ __('quotations_quotation_amount') }}">
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
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('quotations_quotation_process_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('quotations_quotation_process_id_data-original-title') }}"  class="form-control  {{ $errors->has('quotation_process_id') ? 'is-invalid' : '' }} "  name="quotation_process_id" >

                            @foreach($quotation_processes as $quotation_process)
                             <option  <?php echo ($quotation->quotation_process_id == $quotation_process->id) ? 'selected="selected"' : '' ; ?>    value="{{ $quotation_process->id }}" >{{ $quotation_process->name }}</option>
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
                                                    


 <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary pull-left">
                                    <i class="fa fa-btn fa-save"></i>@lang('messages.quotations_update') 
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
