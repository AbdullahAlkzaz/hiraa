@extends('layouts.app')

@section('content')


 			<div class="page-header">
							<h1>
							       @lang('messages.offer_terms_offer_terms')
								<small>
									<i class="ace-icon fa fa-angle-double-left"></i>
								      @lang('messages.offer_terms_update')
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">




    	<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">  <a href="/offer_terms">     @lang('messages.offer_terms_offer_terms')  </a>  </h4>

													<span class="widget-toolbar">
																	<a href="#" data-action="settings" data-toggle="dropdown">
															<i class="ace-icon fa fa-bars"></i>
														</a>

														<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
															<li>
<a href="/offer_terms/create" title = "@lang('messages.offer_terms_add_new')  "  ><i class="fa fa-plus fa-lg"></i>
@lang('messages.offer_terms_add_new') 
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/offer_terms') }}">
                        {!! csrf_field() !!}

                        

                        
 <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('offer_terms_offer_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('offer_terms_offer_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('offer_terms_offer_id_data-original-title') }}"  class="form-control  {{ $errors->has('offer_id') ? 'is-invalid' : '' }} "  name="offer_id" >

                            @foreach($offers as $offer)
                             <option  <?php echo ($offer_term->offer_id == $offer->id) ? 'selected="selected"' : '' ; ?>    value="{{ $offer->id }}" >{{ $offer->seller_id }}</option>
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
                                                                <span>{{ __('offer_terms_offer_term') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $offer_term->offer_term  }}" data-placement="left"  data-content="{{ __('offer_terms_offer_term_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offer_terms_offer_term_data-original-title') }}" 
                                                                     type="text"   class="form-control {{ $errors->has('offer_term') ? 'is-invalid' : '' }}" name="offer_term" placeholder="{{ __('offer_terms_offer_term') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('offer_term'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('offer_term') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    



 <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary pull-left">
                                    <i class="fa fa-btn fa-save"></i>@lang('messages.offer_terms_update') 
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
