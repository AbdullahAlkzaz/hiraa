@extends('layouts.app')
@section('title', __('Shipping methods'))
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
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
                                <form class="form-horizontal" role="form" method="POST"
                                    action="{{ route('shipping_methods.update' , $shipping_method->id) }}" >
                                    {!! csrf_field() !!}
                                    {{ method_field('PUT') }}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('shipping_methods_name') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <input data-toggle="popover"
                                                                value="{{ $shipping_method->name }}" data-placement="left"
                                                                data-content="{{ __('shipping_methods_name_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('shipping_methods_name_data-original-title') }}"
                                                                type="text"
                                                                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                                name="name"
                                                                placeholder="{{ __('shipping_methods_name') }}">
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
                                                        <span>{{ __('shipping_methods_en_name') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <input data-toggle="popover"
                                                                value="{{ $shipping_method->en_name }}"
                                                                data-placement="left"
                                                                data-content="{{ __('shipping_methods_en_name_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('shipping_methods_en_name_data-original-title') }}"
                                                                type="text"
                                                                class="form-control {{ $errors->has('en_name') ? 'is-invalid' : '' }}"
                                                                name="en_name"
                                                                placeholder="{{ __('shipping_methods_en_name') }}">
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
                                                        <span>{{ __('shipping_methods_code') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <input data-toggle="popover"
                                                                   disabled
                                                                   value="{{ $shipping_method->code }}"
                                                                   data-placement="left"
                                                                   data-content="{{ __('shipping_methods_code_data-content') }}"
                                                                   data-trigger="hover"
                                                                   data-original-title="{{ __('shipping_methods_code_data-original-title') }}"
                                                                   type="text"
                                                                   class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}"
                                                                   name="code"
                                                                   placeholder="{{ __('shipping_methods_code') }}">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-file-minus"></i>
                                                            </div>
                                                            @if ($errors->has('code'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('code') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('shipping_methods_fixed_price') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <input data-toggle="popover"
                                                                value="{{ $shipping_method->fixed_price }}"
                                                                data-placement="left"
                                                                data-content="{{ __('shipping_methods_fixed_price_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('shipping_methods_fixed_price_data-original-title') }}"
                                                                type="number"
                                                                class="form-control {{ $errors->has('fixed_price') ? 'is-invalid' : '' }}"
                                                                name="fixed_price"
                                                                placeholder="{{ __('shipping_methods_fixed_price') }}">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-file-minus"></i>
                                                            </div>
                                                            @if ($errors->has('fixed_price'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('fixed_price') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('shipping_methods_is_active') }}</span>
                                                    </div>
                                                    <div class="col-md-8 mb-2 mt-2">
                                                        <div class="form-check form-switch">
                                                            <input <?php echo $shipping_method->is_active == 1 ? 'checked="checked" ' : ''; ?> value="1" name="is_active"
                                                                @if ($shipping_method->is_active == '1') checked @endif
                                                                type="checkbox" class="form-check-input" id="is_active" />
                                                            <label class="form-check-label"
                                                                for="is_active">{{ __('Yes') }}</label>
                                                        </div>
                                                        @if ($errors->has('is_active'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('is_active') }}
                                                            </div>
                                                        @endif
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
@endsection
@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@endsection
@section('page-script')
    <script src="{{ asset(mix('js/scripts/extensions/ext-component-sweet-alerts.js')) }}"></script>
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
@endsection
