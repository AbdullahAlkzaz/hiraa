@extends('layouts.app')
@section('title', __('Advertisements'))

@section('breadcrumb-right')
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            @if ($previous)
                <li class="page-item ">
                    <a class="page-link" href="/ads/{{ $previous }}" tabindex="-1"
                        aria-disabled="true">{{ __('Previous') }}</a>
                </li>
            @endif
            @if ($next)
                <li class="page-item">
                    <a class="page-link" href="/ads/{{ $next }}">{{ __('Next') }}</a>
                </li>
            @endif
        </ul>
    </nav>
@endsection
@section('content')
    <section class="simple-validation">
        <div class="row">
            <div class="col-md-12">

                @if (Session::has('message'))

                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                       <p class="mb-0">
                           {!! session('message') !!}
                       </p>
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">×</span>
                       </button>
                   </div>

                   @endif

                   
                <div class="col-md-8 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form-horizontal" role="form" method="POST"
                                    action="{{ route('ads.update' , $advertisement->id) }}" enctype="multipart/form-data"
                                    novalidate>
                                    {!! csrf_field() !!}
                                    {{ method_field('PUT') }}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('advertisements_image') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <img src="{{ asset($advertisement->image) }}" alt="image"
                                                                style="height:200px; width:100%"
                                                                class="img-fluid rounded-sm mb-2" />
                                                        </div>
                                                        <div class="position-relative has-icon-left">
                                                            <input data-toggle="popover" value="{{ old('image') }}"
                                                                data-placement="left"
                                                                data-content="{{ __('advertisements_image_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('advertisements_image_data-original-title') }}"
                                                                type="file"
                                                                class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                                                name="image"
                                                                placeholder="{{ __('advertisements_image') }}">
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
                                                            <select name="position" class="form-control"
                                                                id="advertisements-list-position">
                                                                <option value="all"
                                                                    @if ($advertisement->position == 'all') selected @endif>
                                                                    {{ __('All') }}</option>
                                                                <option value="top"
                                                                    @if ($advertisement->position == 'top') selected @endif>
                                                                    {{ __('top') }}</option>
                                                                <option value="medium"
                                                                    @if ($advertisement->position == 'medium') selected @endif>
                                                                    {{ __('medium') }}</option>
                                                                <option value="bottom"
                                                                    @if ($advertisement->position == 'bottom') selected @endif>
                                                                    {{ __('bottom') }}</option>
                                                            </select>
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
                                                        <span>@lang('advertisements_is_active') </span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="custom-control custom-switch">
                                                            <input id="is_active" name="is_active" value="1"
                                                                type="checkbox" <?php echo $advertisement->is_active == 1 ? 'checked="checked" ' : ''; ?>
                                                                class="custom-control-input">
                                                            <label class="custom-control-label" for="is_active">
                                                                <span class="switch-text-left">{{ __('Yes') }}</span>
                                                                <span class="switch-text-right">{{ __('No') }}</span>
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
                                                            <input data-toggle="popover"
                                                                value="{{ $advertisement->sorting }}"
                                                                data-placement="left"
                                                                data-content="{{ __('advertisements_sorting_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('advertisements_sorting_data-original-title') }}"
                                                                type="number"
                                                                class="form-control {{ $errors->has('sorting') ? 'is-invalid' : '' }}"
                                                                name="sorting"
                                                                placeholder="{{ __('advertisements_sorting') }}">
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
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit"
                                                    class="btn btn-primary mr-1 mb-1 waves-effect waves-light ">{{ __('Submit') }}</button>
                                                <button type="reset"
                                                    class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">{{ __('Reset') }}</button>
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
@stop
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#select_all').on('click', function() {
                if (this.checked) {
                    $('.checkbox').each(function() {
                        this.checked = true;
                    });
                } else {
                    $('.checkbox').each(function() {
                        this.checked = false;
                    });
                }
            });
            $('.checkbox').on('click', function() {
                if ($('.checkbox:checked').length == $('.checkbox').length) {
                    $('#select_all').prop('checked', true);
                } else {
                    $('#select_all').prop('checked', false);
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
