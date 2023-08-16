@extends('layouts.app')

@section('content')


 			<div class="page-header">
							<h1>
							       @lang('messages.description_translations_description_translations')
								<small>
									<i class="ace-icon fa fa-angle-double-left"></i>
								      @lang('messages.description_translations_update')
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">




    	<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">  <a href="/description_translations">     @lang('messages.description_translations_description_translations')  </a>  </h4>

													<span class="widget-toolbar">
																	<a href="#" data-action="settings" data-toggle="dropdown">
															<i class="ace-icon fa fa-bars"></i>
														</a>

														<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
															<li>
<a href="/description_translations/create" title = "@lang('messages.description_translations_add_new')  "  ><i class="fa fa-plus fa-lg"></i>
@lang('messages.description_translations_add_new') 
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/description_translations') }}">
                        {!! csrf_field() !!}

                        

                        
 <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('description_translations_description_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('description_translations_description_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('description_translations_description_id_data-original-title') }}"  class="form-control  {{ $errors->has('description_id') ? 'is-invalid' : '' }} "  name="description_id" >

                            @foreach($descriptions as $description)
                             <option  <?php echo ($description_translation->description_id == $description->id) ? 'selected="selected"' : '' ; ?>    value="{{ $description->id }}" >{{ $description->key }}</option>
                             @endforeach
                            </select>
                                                                   
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('description_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('description_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    


           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('description_translations_locale') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $description_translation->locale  }}" data-placement="left"  data-content="{{ __('description_translations_locale_data-content') }}" data-trigger="hover"  data-original-title="{{ __('description_translations_locale_data-original-title') }}" 
                                                                     type="text"   class="form-control {{ $errors->has('locale') ? 'is-invalid' : '' }}" name="locale" placeholder="{{ __('description_translations_locale') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('locale'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('locale') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    


 



       <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>@lang('description_translations_description')</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <textarea  data-toggle="popover"   data-placement="left"  data-content="{{ __('description_translations_description_data-content') }}" data-trigger="hover"  data-original-title="{{ __('description_translations_description_data-original-title') }}"    class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" placeholder="@lang('description_translations_description')"   >{{ $description_translation->description   }}</textarea>
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-text"></i>
                                                                    </div>

                                
                                @if ($errors->has('description'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('description') }}
                                                </div>
                                              @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                 



 <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary pull-left">
                                    <i class="fa fa-btn fa-save"></i>@lang('messages.description_translations_update') 
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
