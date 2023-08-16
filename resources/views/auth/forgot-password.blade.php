@extends('layouts/fullLayoutMaster')

@section('title', 'نسيت كلمة المرور')
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
  <div class="auth-wrapper auth-basic px-2">
    <div class="auth-inner my-2">
      <!-- Forgot Password basic -->
      <div class="card mb-0">
        <div class="card-body">
          <a href="{{ route("dashboard") }}" class="brand-logo">
            <h2 class="brand-text text-primary ms-1">{{ config('app.name') }}</h2>
          </a>

          <h4 class="card-title mb-1">نسيت كلمة المرور؟ 🔒</h4>
          <p class="card-text mb-2">قم بإدخال البريد الإكتروني الخاص بك لبدأ عملية إعادة تعيين كلمة المرور</p>

          @if (session('status'))
            <div class="mb-1 text-success">
              {{ session('status') }}
            </div>
          @endif

          <form class="auth-forgot-password-form mt-2" method="POST" action="{{ route('resetPassword') }}">
            @csrf
            <div class="mb-1">
              <label for="forgot-password-email" class="form-label">البريد الإكتروني</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="forgot-password-email"
                name="email" value="{{ old('email') }}" placeholder="البريد الإلكتروني"
                aria-describedby="forgot-password-email" tabindex="1" autofocus />
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100" tabindex="2">إرسال</button>
          </form>

          <p class="text-center mt-2">
            @if (Route::has('login'))
              <a href="{{ route('login') }}"> <i data-feather="chevron-left"></i> العودة لصفحة تسجيل الدخول </a>
            @endif
          </p>
        </div>
      </div>
      <!-- /Forgot Password basic -->
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