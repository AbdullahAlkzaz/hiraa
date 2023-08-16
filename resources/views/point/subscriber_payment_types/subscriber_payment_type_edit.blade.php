@extends('layouts.app')

@section('content')


 			<div class="page-header">
							<h1>
							       @lang('messages.subscriber_payment_types_subscriber_payment_types')
								<small>
									<i class="ace-icon fa fa-angle-double-left"></i>
								      @lang('messages.subscriber_payment_types_update')
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">




    	<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">  <a href="/subscriber_payment_types">     @lang('messages.subscriber_payment_types_subscriber_payment_types')  </a>  </h4>

													<span class="widget-toolbar">
																	<a href="#" data-action="settings" data-toggle="dropdown">
															<i class="ace-icon fa fa-bars"></i>
														</a>

														<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
															<li>
<a href="/subscriber_payment_types/create" title = "@lang('messages.subscriber_payment_types_add_new')  "  ><i class="fa fa-plus fa-lg"></i>
@lang('messages.subscriber_payment_types_add_new') 
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/subscriber_payment_types') }}">
                        {!! csrf_field() !!}

                        


           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('subscriber_payment_types_seller_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $subscriber_payment_type->seller_id  }}" data-placement="left"  data-content="{{ __('subscriber_payment_types_seller_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('subscriber_payment_types_seller_id_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('seller_id') ? 'is-invalid' : '' }}" name="seller_id" placeholder="{{ __('subscriber_payment_types_seller_id') }}">
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
                                                                <span>{{ __('subscriber_payment_types_subscriber_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $subscriber_payment_type->subscriber_id  }}" data-placement="left"  data-content="{{ __('subscriber_payment_types_subscriber_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('subscriber_payment_types_subscriber_id_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('subscriber_id') ? 'is-invalid' : '' }}" name="subscriber_id" placeholder="{{ __('subscriber_payment_types_subscriber_id') }}">
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
                                                                <span>{{ __('subscriber_payment_types_payment_type_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('subscriber_payment_types_payment_type_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('subscriber_payment_types_payment_type_id_data-original-title') }}"  class="form-control  {{ $errors->has('payment_type_id') ? 'is-invalid' : '' }} "  name="payment_type_id" >

                            @foreach($payment_types as $payment_type)
                             <option  <?php echo ($subscriber_payment_type->payment_type_id == $payment_type->id) ? 'selected="selected"' : '' ; ?>    value="{{ $payment_type->id }}" >{{ $payment_type->name }}</option>
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
                                                                <span>@lang('subscriber_payment_types_is_active')  </span>
                                                            </div>
                                                            <div class="col-md-8">
 
                                                                <div class="custom-control custom-switch">
                                            <input id="is_active" name="is_active" value="1" type="checkbox" <?php echo ($subscriber_payment_type->is_active == 1) ? 'checked="checked" ' : '' ; ?>  class="custom-control-input"  >
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
                                    <i class="fa fa-btn fa-save"></i>@lang('messages.subscriber_payment_types_update') 
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
