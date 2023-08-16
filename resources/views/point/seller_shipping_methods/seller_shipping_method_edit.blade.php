@extends('layouts.app')

@section('content')


 			<div class="page-header">
							<h1>
							       @lang('messages.seller_shipping_methods_seller_shipping_methods')
								<small>
									<i class="ace-icon fa fa-angle-double-left"></i>
								      @lang('messages.seller_shipping_methods_update')
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">




    	<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">  <a href="/seller_shipping_methods">     @lang('messages.seller_shipping_methods_seller_shipping_methods')  </a>  </h4>

													<span class="widget-toolbar">
																	<a href="#" data-action="settings" data-toggle="dropdown">
															<i class="ace-icon fa fa-bars"></i>
														</a>

														<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
															<li>
<a href="/seller_shipping_methods/create" title = "@lang('messages.seller_shipping_methods_add_new')  "  ><i class="fa fa-plus fa-lg"></i>
@lang('messages.seller_shipping_methods_add_new') 
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/seller_shipping_methods') }}">
                        {!! csrf_field() !!}

                        


           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('seller_shipping_methods_seller_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $seller_shipping_method->seller_id  }}" data-placement="left"  data-content="{{ __('seller_shipping_methods_seller_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('seller_shipping_methods_seller_id_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('seller_id') ? 'is-invalid' : '' }}" name="seller_id" placeholder="{{ __('seller_shipping_methods_seller_id') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('seller_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('seller_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    


                        
 <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('seller_shipping_methods_shipping_method_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('seller_shipping_methods_shipping_method_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('seller_shipping_methods_shipping_method_id_data-original-title') }}"  class="form-control  {{ $errors->has('shipping_method_id') ? 'is-invalid' : '' }} "  name="shipping_method_id" >

                            @foreach($shipping_methods as $shipping_method)
                             <option  <?php echo ($seller_shipping_method->shipping_method_id == $shipping_method->id) ? 'selected="selected"' : '' ; ?>    value="{{ $shipping_method->id }}" >{{ $shipping_method->name }}</option>
                             @endforeach
                            </select>
                                                                   
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
                                                                <span>@lang('seller_shipping_methods_is_active')  </span>
                                                            </div>
                                                            <div class="col-md-8">
 
                                                                <div class="custom-control custom-switch">
                                            <input id="is_active" name="is_active" value="1" type="checkbox" <?php echo ($seller_shipping_method->is_active == 1) ? 'checked="checked" ' : '' ; ?>  class="custom-control-input"  >
                                            <label class="custom-control-label" for="is_active">
                                                <span class="switch-text-left">{{__("Yes") }}</span>
                                                <span class="switch-text-right">{{__("No") }}</span>
                                            </label>
                                        </div>
                                @if ($errors->has('is_active'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('is_active') }}
                                                </div>
                                              @endif
                                                             </div>
                                                        </div>
                                                    </div>







 <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary pull-left">
                                    <i class="fa fa-btn fa-save"></i>@lang('messages.seller_shipping_methods_update') 
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
