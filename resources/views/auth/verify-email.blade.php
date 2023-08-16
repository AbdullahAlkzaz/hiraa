@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')
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
                    <a href="{{ route('login') }}" class="brand-logo">
                        <h2 class="brand-text text-primary ms-1">{{ config('app.name') }}</h2>
                    </a>

                    <h4 class="card-title mb-1">تأكيد البريد الإلكتروني </h4>
                    {{-- @if (session('status') == 'verification-link-sent') --}}
                    <div class="alert alert-success" role="alert">
                        <div class="alert-body">
                            لقد تم إرسال بريد إلكتروني يحتوي على الكود التفعيلي لحسابك, من فضلك قم بنسخه و لصقه هنا
                        </div>
                    </div>
                    {{-- @endif --}}
                    <form class="auth-login-form mt-2" method="POST" action="{{ route('verifyUser') }}">
                        @csrf
                        <div class="mb-1">
                            <label for="login-email" class="form-label">{{ __('الكود') }}</label>
                            <input type="text" class="form-control" id="login-email" name="verification_code"
                                placeholder="{{ __('كود التفعيل') }}" tabindex="1" autofocus
                                value="{{ old('verification_code') }}" />
                        </div>
                        <div class="mb-1">
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}">
                                    {{ __('لديك حساب بالفعل') }}
                                </a>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary w-100" tabindex="4">{{ __('تفعيل') }}</button>
                    </form>
                    {{-- <div class="mt-4 d-flex justify-content-between">
            <form method="POST" action="{{ route('verification.send') }}">
              @csrf
              <button type="submit"
                class="btn btn-link btn-flat-secondary">{{ __('click here to request another') }}</button>
            </form>

            <form method="POST" action="/logout">
              @csrf

              <button type="submit" class="btn btn-danger">
                Log Out
              </button>
            </form>
          </div> --}}
                </div>
            </div>
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
                timer: 3000,
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
        </script>
    @endif
@endsection
