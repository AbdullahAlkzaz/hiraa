@extends('layouts.app')

@section('content')


 			<div class="page-header">
							<h1>
							       @lang('messages.payment_currencies_payment_currencies')
								<small>
									<i class="ace-icon fa fa-angle-double-left"></i>
								      @lang('messages.payment_currencies_update')
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">




    	<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">  <a href="/payment_currencies">     @lang('messages.payment_currencies_payment_currencies')  </a>  </h4>

													<span class="widget-toolbar">
																	<a href="#" data-action="settings" data-toggle="dropdown">
															<i class="ace-icon fa fa-bars"></i>
														</a>

														<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
															<li>
<a href="/payment_currencies/create" title = "@lang('messages.payment_currencies_add_new')  "  ><i class="fa fa-plus fa-lg"></i>
@lang('messages.payment_currencies_add_new') 
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/payment_currencies') }}">
                        {!! csrf_field() !!}

                        


           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('payment_currencies_currency') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $payment_currency->currency  }}" data-placement="left"  data-content="{{ __('payment_currencies_currency_data-content') }}" data-trigger="hover"  data-original-title="{{ __('payment_currencies_currency_data-original-title') }}" 
                                                                     type="text"   class="form-control {{ $errors->has('currency') ? 'is-invalid' : '' }}" name="currency" placeholder="{{ __('payment_currencies_currency') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('currency'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('currency') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('payment_currencies_currency_code') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $payment_currency->currency_code  }}" data-placement="left"  data-content="{{ __('payment_currencies_currency_code_data-content') }}" data-trigger="hover"  data-original-title="{{ __('payment_currencies_currency_code_data-original-title') }}" 
                                                                     type="text"   class="form-control {{ $errors->has('currency_code') ? 'is-invalid' : '' }}" name="currency_code" placeholder="{{ __('payment_currencies_currency_code') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('currency_code'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('currency_code') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    



 <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary pull-left">
                                    <i class="fa fa-btn fa-save"></i>@lang('messages.payment_currencies_update') 
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
