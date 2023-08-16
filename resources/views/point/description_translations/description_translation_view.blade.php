@extends('layouts.app')
@section('content-header')

                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">{{ __('description_translations_description_translations') }}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('description_translations.index') }}">{{ __('description_translations_description_translations') }}</a>
                                    </li>
								     <li class="breadcrumb-item active">  @lang('description_translations_show_title') {{$description_translation->id}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!--div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                        </div>
                    </div>
                </div-->
 
@endsection

@section('content')
  <section class="simple-validation">
                    <div class="row">
                        <div class="col-md-12">
                                                    <div class="col-md-8 col-sm-12">

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"></h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                      @if (Session::has('message'))

                                     <!--div class="alert alert-primary alert-dismissible fade show" role="alert">
                                            <p class="mb-0">
                                                {!! session('message') !!}
                                            </p>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div-->

                                        @endif
                                        
                                       
                     <form class="form-horizontal" role="form" method="POST" action="/description_translations/{{$description_translation->id}}"   enctype="multipart/form-data"  novalidate>

  {!! csrf_field() !!}
                    {{ method_field('PUT') }}
                                       
                                         <div class="form-body">
                                                <div class="row">



                 



                        

                        
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
                                                 


  


     



         <div class="col-md-8 offset-md-4">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light ">{{ __('Submit') }}</button>
                                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">{{ __('Reset') }}</button>
                                                    </div>


              </div>
              </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


  <!--ul class="pager">
                 @if($previous)
											<li class="previous">
												<a href="/description_translations/{{$previous}}"><i class="ace-icon fa fa-angle-double-right"></i> @lang('messages.previous')   </a>
											</li>
                @endif
                @if($next)
											<li class="next">
												<a href="/description_translations/{{$next}}"> @lang('messages.next')   <i class="ace-icon fa fa-angle-double-left"></i> </a>
											</li>
                @endif
	</ul-->

  
@stop

@push('scripts')



<script type="text/javascript">
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>
 
 

    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="/app-assets/js/scripts/forms/number-input.js"></script>
    <!-- END: Page JS-->
     
    
        <!-- BEGIN: Page JS-->
        <script src="/app-assets/js/scripts/popover/popover.js"></script>
    <!-- END: Page JS-->

      <!-- BEGIN: Page Vendor JS-->
 <script src="/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
     <!-- END: Page Vendor JS-->
  
    @if (Session::has('message'))
<script>
        Swal.fire({
      position: 'top-end',
      type: 'success',
      html: '{!! session('message') !!}',
      showConfirmButton: false,
      timer: 3000,
      confirmButtonClass: 'btn btn-primary',
      buttonsStyling: false,
    })
</script>

   @endif
@endpush
  
