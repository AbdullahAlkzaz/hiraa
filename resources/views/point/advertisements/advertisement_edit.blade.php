@extends('layouts.app')

@section('content')


 			<div class="page-header">
							<h1>
							       @lang('messages.advertisements_advertisements')
								<small>
									<i class="ace-icon fa fa-angle-double-left"></i>
								      @lang('messages.advertisements_update')
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">




    	<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">  <a href="/advertisements">     @lang('messages.advertisements_advertisements')  </a>  </h4>

													<span class="widget-toolbar">
																	<a href="#" data-action="settings" data-toggle="dropdown">
															<i class="ace-icon fa fa-bars"></i>
														</a>

														<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
															<li>
<a href="/advertisements/create" title = "@lang('messages.advertisements_add_new')  "  ><i class="fa fa-plus fa-lg"></i>
@lang('messages.advertisements_add_new') 
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/advertisements') }}">
                        {!! csrf_field() !!}

                        
    
 
    

           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('advertisements_image') }}</span>
                                                            </div>
                                                            <div class="col-md-8">

                                                               <div class="row" >
                                                                <img src="{{ asset($advertisement->image) }}" alt="image" style="height:200px; width:100%" class="img-fluid rounded-sm mb-2" />

                                                                </div>

                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('image')   }}" data-placement="left"  data-content="{{ __('advertisements_image_data-content') }}" data-trigger="hover"  data-original-title="{{ __('advertisements_image_data-original-title') }}" 
                                                                     type="file"   class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image" placeholder="{{ __('advertisements_image') }}"  >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-image"></i>
                                                                    </div>

                                                                    @if ($errors->has('image'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('image') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    




           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('advertisements_position') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $advertisement->position  }}" data-placement="left"  data-content="{{ __('advertisements_position_data-content') }}" data-trigger="hover"  data-original-title="{{ __('advertisements_position_data-original-title') }}" 
                                                                     type="text"   class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" name="position" placeholder="{{ __('advertisements_position') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('position'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('position') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    


     

         <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>@lang('advertisements_is_active')  </span>
                                                            </div>
                                                            <div class="col-md-8">
 
                                                                <div class="custom-control custom-switch">
                                            <input id="is_active" name="is_active" value="1" type="checkbox" <?php echo ($advertisement->is_active == 1) ? 'checked="checked" ' : '' ; ?>  class="custom-control-input"  >
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







           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('advertisements_sorting') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $advertisement->sorting  }}" data-placement="left"  data-content="{{ __('advertisements_sorting_data-content') }}" data-trigger="hover"  data-original-title="{{ __('advertisements_sorting_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('sorting') ? 'is-invalid' : '' }}" name="sorting" placeholder="{{ __('advertisements_sorting') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('sorting'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('sorting') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    



 <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary pull-left">
                                    <i class="fa fa-btn fa-save"></i>@lang('messages.advertisements_update') 
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
