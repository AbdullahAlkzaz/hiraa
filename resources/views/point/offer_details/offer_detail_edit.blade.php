@extends('layouts.app')

@section('content')


 			<div class="page-header">
							<h1>
							       @lang('messages.offer_details_offer_details')
								<small>
									<i class="ace-icon fa fa-angle-double-left"></i>
								      @lang('messages.offer_details_update')
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">




    	<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">  <a href="/offer_details">     @lang('messages.offer_details_offer_details')  </a>  </h4>

													<span class="widget-toolbar">
																	<a href="#" data-action="settings" data-toggle="dropdown">
															<i class="ace-icon fa fa-bars"></i>
														</a>

														<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
															<li>
<a href="/offer_details/create" title = "@lang('messages.offer_details_add_new')  "  ><i class="fa fa-plus fa-lg"></i>
@lang('messages.offer_details_add_new') 
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/offer_details') }}">
                        {!! csrf_field() !!}

                        

                        
 <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('offer_details_offer_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('offer_details_offer_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('offer_details_offer_id_data-original-title') }}"  class="form-control  {{ $errors->has('offer_id') ? 'is-invalid' : '' }} "  name="offer_id" >

                            @foreach($offers as $offer)
                             <option  <?php echo ($offer_detail->offer_id == $offer->id) ? 'selected="selected"' : '' ; ?>    value="{{ $offer->id }}" >{{ $offer->seller_id }}</option>
                             @endforeach
                            </select>
                                                                   
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('offer_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('offer_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    


           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('offer_details_company_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $offer_detail->company_id  }}" data-placement="left"  data-content="{{ __('offer_details_company_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offer_details_company_id_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('company_id') ? 'is-invalid' : '' }}" name="company_id" placeholder="{{ __('offer_details_company_id') }}">
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
                                                                <span>{{ __('offer_details_branch_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $offer_detail->branch_id  }}" data-placement="left"  data-content="{{ __('offer_details_branch_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offer_details_branch_id_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('branch_id') ? 'is-invalid' : '' }}" name="branch_id" placeholder="{{ __('offer_details_branch_id') }}">
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
                                                                <span>{{ __('offer_details_product_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $offer_detail->product_id  }}" data-placement="left"  data-content="{{ __('offer_details_product_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offer_details_product_id_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('product_id') ? 'is-invalid' : '' }}" name="product_id" placeholder="{{ __('offer_details_product_id') }}">
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
                                                                <span>{{ __('offer_details_offer_price') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $offer_detail->offer_price  }}" data-placement="left"  data-content="{{ __('offer_details_offer_price_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offer_details_offer_price_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('offer_price') ? 'is-invalid' : '' }}" name="offer_price" placeholder="{{ __('offer_details_offer_price') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('offer_price'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('offer_price') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('offer_details_offer_quantity') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $offer_detail->offer_quantity  }}" data-placement="left"  data-content="{{ __('offer_details_offer_quantity_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offer_details_offer_quantity_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('offer_quantity') ? 'is-invalid' : '' }}" name="offer_quantity" placeholder="{{ __('offer_details_offer_quantity') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('offer_quantity'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('offer_quantity') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('offer_details_minimum_order_quantity') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $offer_detail->minimum_order_quantity  }}" data-placement="left"  data-content="{{ __('offer_details_minimum_order_quantity_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offer_details_minimum_order_quantity_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('minimum_order_quantity') ? 'is-invalid' : '' }}" name="minimum_order_quantity" placeholder="{{ __('offer_details_minimum_order_quantity') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('minimum_order_quantity'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('minimum_order_quantity') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('offer_details_maximum_order_quantity') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $offer_detail->maximum_order_quantity  }}" data-placement="left"  data-content="{{ __('offer_details_maximum_order_quantity_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offer_details_maximum_order_quantity_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('maximum_order_quantity') ? 'is-invalid' : '' }}" name="maximum_order_quantity" placeholder="{{ __('offer_details_maximum_order_quantity') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('maximum_order_quantity'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('maximum_order_quantity') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    



 <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary pull-left">
                                    <i class="fa fa-btn fa-save"></i>@lang('messages.offer_details_update') 
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
