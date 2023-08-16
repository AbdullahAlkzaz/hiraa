@extends('layouts.fullLayoutMaster')
@section('title', 'Login')
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection
@section('content')
    <div class="auth-wrapper auth-basic px-2">
        <div class="auth-inner my-2">
            <!-- Login basic -->
            <div class="card mb-0">
                <div class="card-body">

                    <a href="/" class="brand-logo">
                        {{ config('app.name') }}
                        {{-- <img src="{{ asset('images/logo/logo.png') }}" alt="{{ config('app.name') }}" height="100"
                            width="100" /> --}}
                    </a>
                    <h4 class="card-title mb-1"> 👋 {{ __(':app_name يا هلا بيك في', ['app_name' => config('app.name')]) }}
                    </h4>
                    <p class="card-text mb-2">{{ __('قم بتسجيل الدخول في حسابك') }}</p>
                    @if (session('status'))
                        <div class="alert alert-success mb-1 rounded-0" role="alert">
                            <div class="alert-body">
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif



                    @error('auth_failed')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <form class="auth-login-form mt-2" method="POST" action="{{ route('signIn') }}">
                        @csrf
                        <div class="mb-1">
                            <label for="login-email" class="form-label">{{ __('Email') }}</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="login-email"
                                name="email" placeholder="{{ __('Email') }}" aria-describedby="login-email"
                                tabindex="1" autofocus value="{{ old('email') }}" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="login-password">{{ __('Password') }}</label>
                                @if (Route::has('forgot'))
                                    <a href="{{ route('forgot') }}">
                                        <small>{{ __('نسيت كلمة المرور؟') }}</small>
                                    </a>
                                @endif
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input type="password" class="form-control form-control-merge" id="login-password"
                                    name="password" tabindex="2"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="login-password" />
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                        </div>
                        <div class="mb-1">
                            <div class="form-check d-flex">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember"
                                    tabindex="3" {{ old('remember') ? 'checked' : '' }} />
                                <label class="form-check-label" for="remember">{{ __('تزكرني') }}</label>
                                <div class="ms-auto">
                                    <a href="{{ route('signUp') }}">
                                        {{ __('تسجيل حساب جديد') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="mb-1">
                            @if (Route::has('signUp'))
                                <a href="{{ route('signUp') }}">
                                    {{ __('تسجيل حساب جديد') }}
                                </a>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary w-100"
                            tabindex="4">{{ __('تسجيل الدخول') }}</button>
                    </form>
                </div>
            </div>
            <!-- /Login basic -->
        </div>
    </div>
@endsection
@section('page-script')
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script> <!-- END: Page Vendor JS-->
    @if (Session::has('message'))
        <script>
            Swal.fire({
                position: 'top-end',
                type: 'success',
                html: '{!! session('message') !!}',
                showConfirmButton: false,
                timer: 5000,
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
        </script>
    @endif
@endsection
