@extends('layouts.app')

@section('content')


 			<div class="page-header">
							<h1>
							       @lang('messages.order_platforms_order_platforms')
								<small>
									<i class="ace-icon fa fa-angle-double-left"></i>
								      @lang('messages.order_platforms_update')
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">




    	<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">  <a href="/order_platforms">     @lang('messages.order_platforms_order_platforms')  </a>  </h4>

													<span class="widget-toolbar">
																	<a href="#" data-action="settings" data-toggle="dropdown">
															<i class="ace-icon fa fa-bars"></i>
														</a>

														<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
															<li>
<a href="/order_platforms/create" title = "@lang('messages.order_platforms_add_new')  "  ><i class="fa fa-plus fa-lg"></i>
@lang('messages.order_platforms_add_new') 
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/order_platforms') }}">
                        {!! csrf_field() !!}

                        


           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('order_platforms_name') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $order_platform->name  }}" data-placement="left"  data-content="{{ __('order_platforms_name_data-content') }}" data-trigger="hover"  data-original-title="{{ __('order_platforms_name_data-original-title') }}" 
                                                                     type="text"   class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" placeholder="{{ __('order_platforms_name') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('name'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('name') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('order_platforms_en_name') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $order_platform->en_name  }}" data-placement="left"  data-content="{{ __('order_platforms_en_name_data-content') }}" data-trigger="hover"  data-original-title="{{ __('order_platforms_en_name_data-original-title') }}" 
                                                                     type="text"   class="form-control {{ $errors->has('en_name') ? 'is-invalid' : '' }}" name="en_name" placeholder="{{ __('order_platforms_en_name') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('en_name'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('en_name') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    


     

         <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>@lang('order_platforms_is_active')  </span>
                                                            </div>
                                                            <div class="col-md-8">
 
                                                                <div class="custom-control custom-switch">
                                            <input id="is_active" name="is_active" value="1" type="checkbox" <?php echo ($order_platform->is_active == 1) ? 'checked="checked" ' : '' ; ?>  class="custom-control-input"  >
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
                                    <i class="fa fa-btn fa-save"></i>@lang('messages.order_platforms_update') 
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
