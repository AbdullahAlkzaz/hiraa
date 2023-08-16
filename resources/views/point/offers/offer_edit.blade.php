@extends('layouts.app')

@section('content')
    @unless(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('Offers'))
  <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless

 			<div class="page-header">
							<h1>
							       @lang('messages.offers_offers')
								<small>
									<i class="ace-icon fa fa-angle-double-left"></i>
								      @lang('messages.offers_update')
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">




    	<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">  <a href="/offers">     @lang('messages.offers_offers')  </a>  </h4>

													<span class="widget-toolbar">
																	<a href="#" data-action="settings" data-toggle="dropdown">
															<i class="ace-icon fa fa-bars"></i>
														</a>

														<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
															<li>
<a href="/offers/create" title = "@lang('messages.offers_add_new')  "  ><i class="fa fa-plus fa-lg"></i>
@lang('messages.offers_add_new')
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/offers') }}">
                        {!! csrf_field() !!}




           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('offers_seller_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $offer->seller_id  }}" data-placement="left"  data-content="{{ __('offers_seller_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offers_seller_id_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('seller_id') ? 'is-invalid' : '' }}" name="seller_id" placeholder="{{ __('offers_seller_id') }}">
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
                                                                <span>{{ __('offers_offer_title') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $offer->offer_title  }}" data-placement="left"  data-content="{{ __('offers_offer_title_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offers_offer_title_data-original-title') }}"
                                                                     type="text"   class="form-control {{ $errors->has('offer_title') ? 'is-invalid' : '' }}" name="offer_title" placeholder="{{ __('offers_offer_title') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('offer_title'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('offer_title') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>




           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('offers_offer_expiry_date') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $offer->offer_expiry_date  }}" data-placement="left"  data-content="{{ __('offers_offer_expiry_date_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offers_offer_expiry_date_data-original-title') }}"
                                                                     type="date"   class="form-control {{ $errors->has('offer_expiry_date') ? 'is-invalid' : '' }}" name="offer_expiry_date" placeholder="{{ __('offers_offer_expiry_date') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('offer_expiry_date'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('offer_expiry_date') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>






           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('offers_image') }}</span>
                                                            </div>
                                                            <div class="col-md-8">

                                                               <div class="row" >
                                                                <img src="{{ asset($offer->image) }}" alt="image" style="height:200px; width:100%" class="img-fluid rounded-sm mb-2" />

                                                                </div>

                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{  old('image')   }}" data-placement="left"  data-content="{{ __('offers_image_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offers_image_data-original-title') }}"
                                                                     type="file"   class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image" placeholder="{{ __('offers_image') }}"  >
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
                                                                <span>{{ __('offers_minimum_order_quantity') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $offer->minimum_order_quantity  }}" data-placement="left"  data-content="{{ __('offers_minimum_order_quantity_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offers_minimum_order_quantity_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('minimum_order_quantity') ? 'is-invalid' : '' }}" name="minimum_order_quantity" placeholder="{{ __('offers_minimum_order_quantity') }}">
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
                                                                <span>{{ __('offers_minimum_order_amount') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $offer->minimum_order_amount  }}" data-placement="left"  data-content="{{ __('offers_minimum_order_amount_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offers_minimum_order_amount_data-original-title') }}"
                                                                     type="number"   class="form-control {{ $errors->has('minimum_order_amount') ? 'is-invalid' : '' }}" name="minimum_order_amount" placeholder="{{ __('offers_minimum_order_amount') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('minimum_order_amount'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('minimum_order_amount') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>







       <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>@lang('offers_offer_specifications')</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <textarea  data-toggle="popover"   data-placement="left"  data-content="{{ __('offers_offer_specifications_data-content') }}" data-trigger="hover"  data-original-title="{{ __('offers_offer_specifications_data-original-title') }}"    class="form-control {{ $errors->has('offer_specifications') ? 'is-invalid' : '' }}" name="offer_specifications" placeholder="@lang('offers_offer_specifications')"   >{{ $offer->offer_specifications   }}</textarea>
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-text"></i>
                                                                    </div>


                                @if ($errors->has('offer_specifications'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('offer_specifications') }}
                                                </div>
                                              @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>




 <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('offers_offer_type_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">

                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('offers_offer_type_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('offers_offer_type_id_data-original-title') }}"  class="form-control  {{ $errors->has('offer_type_id') ? 'is-invalid' : '' }} "  name="offer_type_id" >

                            @foreach($offer_types as $offer_type)
                             <option  <?php echo ($offer->offer_type_id == $offer_type->id) ? 'selected="selected"' : '' ; ?>    value="{{ $offer_type->id }}" >{{ $offer_type->name }}</option>
                             @endforeach
                            </select>

                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('offer_type_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('offer_type_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>




         <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>@lang('offers_is_active')  </span>
                                                            </div>
                                                            <div class="col-md-8">

                                                                <div class="custom-control custom-switch">
                                            <input id="is_active" name="is_active" value="1" type="checkbox" <?php echo ($offer->is_active == 1) ? 'checked="checked" ' : '' ; ?>  class="custom-control-input"  >
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
                                    <i class="fa fa-btn fa-save"></i>@lang('messages.offers_update')
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
