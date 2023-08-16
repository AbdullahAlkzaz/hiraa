@extends('layouts.app')
@section('title', __('Advertisements'))
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
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        <div class="alert-body">{!! session('message') !!}</div>
                    </div>
                @endif
                <div class="col-md-8 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="formform-horizontal" role="form" method="POST" action="{{ url('/ads') }}"
                                    enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row mb-2">
                                                    <div class="col-md-4">
                                                        <span>{{ __('advertisements_image') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <input data-toggle="popover" value="{{ old('image') }}"
                                                                data-placement="left"
                                                                data-content="{{ __('advertisements_image_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('advertisements_image_data-original-title') }}"
                                                                type="file"
                                                                class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                                                name="image"
                                                                placeholder="{{ __('advertisements_image') }}"
                                                                data-validation-required-message="{{ __('This field is required') }}">
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
                                                            <select name="position" class="form-select" id="position">
                                                                <option value="all"
                                                                    @if (old('position') == 'all') selected @endif>
                                                                    {{ __('All') }}</option>
                                                                <option value="top"
                                                                    @if (old('position') == 'top') selected @endif>
                                                                    {{ __('top') }}</option>
                                                                <option value="medium"
                                                                    @if (old('position') == 'medium') selected @endif>
                                                                    {{ __('medium') }}</option>
                                                                <option value="bottom"
                                                                    @if (old('position') == 'bottom') selected @endif>
                                                                    {{ __('bottom') }}</option>
                                                            </select>
                                                            @if ($errors->has('position'))
                                                                <div class="text-danger">
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
                                                        <span>{{ __('advertisements_is_active') }}</span>
                                                    </div>
                                                    <div class="col-md-8 mb-2 mt-2">
                                                        <div class="form-check form-switch">
                                                            <input value="1" name="is_active" @if (old('is_active') == '1') checked @endif type="checkbox"
                                                                class="form-check-input" id="is_active" />
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
@stop
@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@endsection
@section('page-script')
    <script src="{{ asset(mix('js/scripts/extensions/ext-component-sweet-alerts.js')) }}"></script>
@endsection
