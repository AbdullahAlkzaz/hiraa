@extends('layouts/fullLayoutMaster')

@section('title', 'Reset Password')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
  <div class="auth-wrapper auth-basic px-2">
    <div class="auth-inner my-2">
      <!-- Reset Password basic -->
      <div class="card mb-0">
        <div class="card-body">
          <a href="{{ route('dashboard') }}" class="brand-logo">
            <h2 class="brand-text text-primary ms-1">{{ config("app.name") }}</h2>
          </a>

          <h4 class="card-title mb-1">إعادة تعيين كلمة المرور 🔒</h4>
          <p class="card-text mb-2">ننصح باستخدام كلمة مرور لم تستعملها هنا من قبل</p>

          <form class="auth-reset-password-form mt-2" method="POST" action="{{ route('changePassword') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-1">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="reset-password-new">كلمة المرور الجديدة</label>
              </div>
              <div class="input-group input-group-merge form-password-toggle @error('password') is-invalid @enderror">
                <input type="password" class="form-control form-control-merge @error('password') is-invalid @enderror"
                  id="reset-password-new" name="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="reset-password-new" tabindex="2" autofocus required />
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
              </div>
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="mb-1">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="reset-password-confirm">تأكيد كلمة المرور</label>
              </div>
              <div class="input-group input-group-merge form-password-toggle">
                <input type="password" class="form-control form-control-merge" id="reset-password-confirm"
                  name="password_confirmation" autocomplete="new-password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="reset-password-confirm" tabindex="3" />
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
              </div>
            </div>
            <button type="submit" class="btn btn-primary w-100" tabindex="4">تعيين</button>
          </form>

          <p class="text-center mt-2">
            @if (Route::has('login'))
              <a href="{{ route('login') }}">
                <i data-feather="chevron-left"></i> Back to login
              </a>
            @endif
          </p>
        </div>
      </div>
      <!-- /Reset Password basic -->
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