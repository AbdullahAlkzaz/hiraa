@extends('layouts.app')
@push('style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endpush
@section('content-header')

    {{-- <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{ __('shipping_types_shipping_types') }}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('shipping-types.index') }}">{{ __('shipping_types_shipping_types') }}</a>
                        </li>
                        <li class="breadcrumb-item active"> @lang('shipping_types_show_title') {{ $shipping_type->id }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div> --}}
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
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{ __('Shipping Types') }}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('shipping-types.index') }}">{{ __('Shipping Types') }}</a>
                        </li>
                        <li class="breadcrumb-item active"> {{ __('Show Shipping Type') }} {{ $shipping_type->id }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
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
                                    action="/shipping-types/{{ $shipping_type->id }}" enctype="multipart/form-data"
                                    novalidate>

                                    {!! csrf_field() !!}
                                    {{ method_field('PUT') }}

                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{ __('shipping_types_name') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <input data-toggle="popover" value="{{ $shipping_type->name }}"
                                                                data-placement="left"
                                                                data-content="{{ __('shipping_types_name_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('shipping_types_name_data-original-title') }}"
                                                                type="text"
                                                                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                                name="name"
                                                                placeholder="{{ __('shipping_types_name') }}" required>
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
                                                        <span>{{ __('shipping_types_en_name') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <input data-toggle="popover"
                                                                value="{{ $shipping_type->en_name }}" data-placement="left"
                                                                data-content="{{ __('shipping_types_en_name_data-content') }}"
                                                                data-trigger="hover"
                                                                data-original-title="{{ __('shipping_types_en_name_data-original-title') }}"
                                                                type="text"
                                                                class="form-control {{ $errors->has('en_name') ? 'is-invalid' : '' }}"
                                                                name="en_name"
                                                                placeholder="{{ __('shipping_types_en_name') }}" required>
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
                                                        <span>{{ __('Status') }}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="position-relative has-icon-left">
                                                            <select name="status" class="select2 form-select" required>
                                                                <option value="0"
                                                                    {{ $shipping_type->status == 0 ? 'selected' : '' }}>
                                                                    Pending </option>
                                                                <option value="1"
                                                                    {{ $shipping_type->status == 1 ? 'selected' : '' }}>
                                                                    Active </option>
                                                                <option value="2"
                                                                    {{ $shipping_type->status == 2 ? 'selected' : '' }}>
                                                                    Hidden </option>
                                                            </select>
                                                            <div class="form-control-position">
                                                                <i class="feather icon-file-minus"></i>
                                                            </div>

                                                            @if ($errors->has('statsus'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('en_name') }}
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


    <ul class="pager">
        @if ($previous)
            <li class="previous">
                <a href="/shipping-types/{{ $previous }}"><i class="ace-icon fa fa-angle-double-right"></i>
                    {{ __('Previous') }} </a>
            </li>
        @endif
        @if ($next)
            <li class="next">
                <a href="/shipping-types/{{ $next }}"> {{ __('Next') }} <i
                        class="ace-icon fa fa-angle-double-left"></i> </a>
            </li>
        @endif
    </ul>
@stop

@section('page-script')



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


    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script> <!-- END: Page Vendor JS-->

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
@endsection
