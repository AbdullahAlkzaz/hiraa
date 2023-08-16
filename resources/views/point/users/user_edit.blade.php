@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h1>
            @lang('messages.users_users')
            <small>
                <i class="ace-icon fa fa-angle-double-left"></i>
                @lang('messages.users_update')
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">




            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"> <a href="/users"> @lang('messages.users_users') </a> </h4>

                    <span class="widget-toolbar">
                        <a href="#" data-action="settings" data-toggle="dropdown">
                            <i class="ace-icon fa fa-bars"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
                            <li>
                                <a href="/users/create" title="@lang('messages.users_add_new')  "><i class="fa fa-plus fa-lg"></i>
                                    @lang('messages.users_add_new')
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

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/users') }}">
                            {!! csrf_field() !!}




                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>{{ __('users_name') }}</span>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="position-relative has-icon-left">
                                            <input data-toggle="popover" value="{{ $user->name }}" data-placement="left"
                                                data-content="{{ __('users_name_data-content') }}" data-trigger="hover"
                                                data-original-title="{{ __('users_name_data-original-title') }}"
                                                type="text"
                                                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                name="name" placeholder="{{ __('users_name') }}">
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
                                        <span>{{ __('users_email') }}</span>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="position-relative has-icon-left">
                                            <input data-toggle="popover" value="{{ $user->email }}" data-placement="left"
                                                data-content="{{ __('users_email_data-content') }}" data-trigger="hover"
                                                data-original-title="{{ __('users_email_data-original-title') }}"
                                                type="text"
                                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                name="email" placeholder="{{ __('users_email') }}">
                                            <div class="form-control-position">
                                                <i class="feather icon-file-minus"></i>
                                            </div>

                                            @if ($errors->has('email'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>{{ __('users_two_factor_confirmed_at') }}</span>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="position-relative has-icon-left">
                                            <input data-toggle="popover" value="{{ $user->two_factor_confirmed_at }}"
                                                data-placement="left"
                                                data-content="{{ __('users_two_factor_confirmed_at_data-content') }}"
                                                data-trigger="hover"
                                                data-original-title="{{ __('users_two_factor_confirmed_at_data-original-title') }}"
                                                type="date"
                                                class="form-control {{ $errors->has('two_factor_confirmed_at') ? 'is-invalid' : '' }}"
                                                name="two_factor_confirmed_at"
                                                placeholder="{{ __('users_two_factor_confirmed_at') }}">
                                            <div class="form-control-position">
                                                <i class="feather icon-file-minus"></i>
                                            </div>

                                            @if ($errors->has('two_factor_confirmed_at'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('two_factor_confirmed_at') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary pull-left">
                                        <i class="fa fa-btn fa-save"></i>@lang('messages.users_update')
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
