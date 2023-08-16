@extends('layouts.app')
@section('content-header')

                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">{{ __('quotation_item_collection_areas_quotation_item_collection_areas') }}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('quotation_item_collection_areas.index') }}">{{ __('quotation_item_collection_areas_quotation_item_collection_areas') }}</a>
                                    </li>
								     <li class="breadcrumb-item active">  @lang('quotation_item_collection_areas_show_title') {{$quotation_item_collection_area->id}}
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
                                        
                                       
                     <form class="form-horizontal" role="form" method="POST" action="/quotation_item_collection_areas/{{$quotation_item_collection_area->id}}"   enctype="multipart/form-data"  novalidate>

  {!! csrf_field() !!}
                    {{ method_field('PUT') }}
                                       
                                         <div class="form-body">
                                                <div class="row">



                 



                        

                        
 <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotation_item_collection_areas_quotation_item_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    
                                                                     <select data-toggle="popover"   data-placement="left"  data-content="{{ __('quotation_item_collection_areas_quotation_item_id_data-content') }}" data-trigger="hover" data-original-title="{{ __('quotation_item_collection_areas_quotation_item_id_data-original-title') }}"  class="form-control  {{ $errors->has('quotation_item_id') ? 'is-invalid' : '' }} "  name="quotation_item_id" >

                            @foreach($quotation_items as $quotation_item)
                             <option  <?php echo ($quotation_item_collection_area->quotation_item_id == $quotation_item->id) ? 'selected="selected"' : '' ; ?>    value="{{ $quotation_item->id }}" >{{ $quotation_item->quotation_id }}</option>
                             @endforeach
                            </select>
                                                                   
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('quotation_item_id'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('quotation_item_id') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    


           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotation_item_collection_areas_product_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $quotation_item_collection_area->product_id  }}" data-placement="left"  data-content="{{ __('quotation_item_collection_areas_product_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_item_collection_areas_product_id_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('product_id') ? 'is-invalid' : '' }}" name="product_id" placeholder="{{ __('quotation_item_collection_areas_product_id') }}">
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
                                                                <span>{{ __('quotation_item_collection_areas_branch_id') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $quotation_item_collection_area->branch_id  }}" data-placement="left"  data-content="{{ __('quotation_item_collection_areas_branch_id_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_item_collection_areas_branch_id_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('branch_id') ? 'is-invalid' : '' }}" name="branch_id" placeholder="{{ __('quotation_item_collection_areas_branch_id') }}">
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
                                                                <span>{{ __('quotation_item_collection_areas_quantity') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $quotation_item_collection_area->quantity  }}" data-placement="left"  data-content="{{ __('quotation_item_collection_areas_quantity_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_item_collection_areas_quantity_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" name="quantity" placeholder="{{ __('quotation_item_collection_areas_quantity') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('quantity'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('quantity') }}
                                                </div>
                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    



           <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>{{ __('quotation_item_collection_areas_average_cost') }}</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input  data-toggle="popover" value="{{ $quotation_item_collection_area->average_cost  }}" data-placement="left"  data-content="{{ __('quotation_item_collection_areas_average_cost_data-content') }}" data-trigger="hover"  data-original-title="{{ __('quotation_item_collection_areas_average_cost_data-original-title') }}" 
                                                                     type="number"   class="form-control {{ $errors->has('average_cost') ? 'is-invalid' : '' }}" name="average_cost" placeholder="{{ __('quotation_item_collection_areas_average_cost') }}">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-file-minus"></i>
                                                                    </div>

                                                                    @if ($errors->has('average_cost'))
                                                                    <div class="invalid-feedback">
                                                                    {{ $errors->first('average_cost') }}
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
												<a href="/quotation_item_collection_areas/{{$previous}}"><i class="ace-icon fa fa-angle-double-right"></i> @lang('messages.previous')   </a>
											</li>
                @endif
                @if($next)
											<li class="next">
												<a href="/quotation_item_collection_areas/{{$next}}"> @lang('messages.next')   <i class="ace-icon fa fa-angle-double-left"></i> </a>
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
  
