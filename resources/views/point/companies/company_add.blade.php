@extends('layouts.app')
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">

@section('content-header')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{ __('إضافة شركة') }}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">{{ __('الشركات') }}</a>
                        </li>


                        <li class="breadcrumb-item active">{{ __('إضافة شركة') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('content')


    <section class="simple-validation">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 col-sm-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{ route("companies.store") }}"
                                    enctype="multipart/form-data" novalidate>
                                    {!! csrf_field() !!}

                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                    <label for="register-username" class="form-label">اسم الشركة</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="register-username" name="name" placeholder="john doe"
                                                        aria-describedby="register-username" tabindex="1" autofocus
                                                        value="{{ old('name') }}" required />
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label for="register-email" class="form-label">البريد الإلكتروني</label>
                                                    <input type="text"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        id="register-email" name="email" placeholder=""
                                                        aria-describedby="register-email" tabindex="2"
                                                        value="{{ old('email') }}" required />
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                    <label for="register-password" class="form-label">كلمة المرور</label>
                                                    <div
                                                        class="input-group input-group-merge form-password-toggle @error('password') is-invalid @enderror">
                                                        <input type="password"
                                                            class="form-control form-control-merge @error('password') is-invalid @enderror"
                                                            id="register-password" name="password" placeholder=""
                                                            aria-describedby="register-password" tabindex="3" required />
                                                        <span class="input-group-text cursor-pointer"><i
                                                                data-feather="eye"></i></span>
                                                    </div>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label for="register-password-confirm" class="form-label">تأكيد كلمة
                                                        المرور</label>
                                                    <div class="input-group input-group-merge form-password-toggle">
                                                        <input type="password" class="form-control form-control-merge"
                                                            id="register-password-confirm" name="password_confirmation"
                                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                            aria-describedby="register-password" tabindex="3"
                                                            required />
                                                        <span class="input-group-text cursor-pointer"><i
                                                                data-feather="eye"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                    <label for="phone" class="form-label">رقم الهاتف</label>
                                                    <div class="input-group input-group-merge ">
                                                        <input type="text" class="form-control form-control-merge"
                                                            value="{{ old('phone') }}" id="phone" name="phone"
                                                            placeholder="رقم الهاتف" aria-describedby="phone"
                                                            tabindex="3" required />
                                                    </div>
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label for="tax_number" class="form-label">الرقم الضريبي</label>
                                                    <div class="input-group input-group-merge ">
                                                        <input type="text"
                                                            class="form-control form-control-merge dt-date flatpickr-range dt-input"
                                                            value="{{ old('tax_number') }}" id="tax_number"
                                                            name="tax_number" placeholder="الرقم الضريبي"
                                                            aria-describedby="tax_number" tabindex="3" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <h1 class="text-center">العنوان</h1>
                                            <br>
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                    <label for="address_1" class="form-label">أدخل الشارع</label>
                                                    <div class="input-group input-group-merge ">
                                                        <input type="text" class="form-control form-control-merge"
                                                            value="{{ old('address_1') }}" id="address_1"
                                                            name="address_1" placeholder="أدخل الشارع"
                                                            aria-describedby="address_1" tabindex="3" required />
                                                    </div>
                                                </div>
                                                <div class="mb-1 col-md-6" margin-left: 10px;>
                                                    <label for="address_2" class="form-label">أدخل شارع آخر</label>
                                                    <div class="input-group input-group-merge ">
                                                        <input type="text" class="form-control form-control-merge"
                                                            value="{{ old('address_2') }}" id="address_2"
                                                            name="address_2" placeholder="أدخل شارع آخر"
                                                            aria-describedby="address_2" tabindex="3" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                    <label for="government" class="form-label">المحافظة</label>
                                                    <div class="input-group input-group-merge ">
                                                        <select class="form-select select2" id="user-type"
                                                            class="form-control text-center"
                                                            data-placeholder="نوع المستخدم" name="government" required>
                                                            <option value="" class="fs-4 text-center" disabled
                                                                selected>
                                                                <span>إختر المحافظة</span>
                                                            </option>
                                                            <option value="البحيرة" class="fs-4 text-center">
                                                                <span>البحيرة</span>
                                                            </option>
                                                            <option value="الأسكندرية" class="fs-4 text-center">
                                                                <span>الأسكندرية</span>
                                                            </option>
                                                            <option value="القاهرة" class="fs-4 text-center">
                                                                <span>القاهرة</span>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label for="city" class="form-label">المدينة</label>
                                                    <div class="input-group input-group-merge ">
                                                        <input type="text" class="form-control form-control-merge"
                                                            value="{{ old('city') }}" id="city" name="city"
                                                            placeholder="المدينة" aria-describedby="city" tabindex="3"
                                                            required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                    <label for="area" class="form-label">المنطقة</label>
                                                    <div class="input-group input-group-merge ">
                                                        <input type="text" class="form-control form-control-merge"
                                                            value="{{ old('area') }}" id="area" name="area"
                                                            placeholder="المنطقة" aria-describedby="area" tabindex="3"
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label for="postal_code" class="form-label">الرمز البريدي</label>
                                                    <div class="input-group input-group-merge ">
                                                        <input type="text" class="form-control form-control-merge"
                                                            value="{{ old('postal_code') }}" id="postal_code"
                                                            name="postal_code" placeholder="الرمز البريدي"
                                                            aria-describedby="postal_code" tabindex="3" required />
                                                    </div>
                                                </div>
                                            </div>

                                            <br>
                                            <h1 class="text-center">بيانات المدير</h1>
                                            <br>
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                    <label for="manager_name" class="form-label">اسم المدير</label>
                                                    <div class="input-group input-group-merge ">
                                                        <input type="text" class="form-control form-control-merge"
                                                            value="{{ old('manager_name') }}" id="manager_name"
                                                            name="manager_name" placeholder="اسم المدير"
                                                            aria-describedby="manager_name" tabindex="3" required />
                                                    </div>
                                                </div>
                                                <div class="mb-1 col-md-6" margin-left: 10px;>
                                                    <label for="manager_email" class="form-label">البريد الالكتروني</label>
                                                    <div class="input-group input-group-merge ">
                                                        <input type="text" class="form-control form-control-merge"
                                                            value="{{ old('manager_email') }}" id="manager_email"
                                                            name="manager_email" placeholder="البريد الالكتروني"
                                                            aria-describedby="manager_email" tabindex="3" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                    <label for="manager_phone" class="form-label">هاتف المدير</label>
                                                    <div class="input-group input-group-merge ">
                                                        <input type="text" class="form-control form-control-merge"
                                                            value="{{ old('manager_phone') }}" id="manager_phone"
                                                            name="manager_phone" placeholder="هاتف المدير"
                                                            aria-describedby="manager_phone" tabindex="3" required />
                                                    </div>
                                                </div>
                                                <div class="mb-1 col-md-6" margin-left: 10px;>
                                                    <label for="manager_national_number" class="form-label">الرقم القومي</label>
                                                    <div class="input-group input-group-merge ">
                                                        <input type="text" class="form-control form-control-merge"
                                                            value="{{ old('manager_national_number') }}" id="manager_national_number"
                                                            name="manager_national_number" placeholder="الرقم القومي"
                                                            aria-describedby="manager_national_number" tabindex="3" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 offset-md-5">
                                                <br>
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

@section('page-script')
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script> <!-- END: Page Vendor JS-->


    {{-- show shop details inputs if the user is seller --}}
    <script>
        $("#user-type").on("change", function() {
            let userType = $(this).val();
            if (userType == 1) {
                $(".seller").removeClass("hidden");
            } else {
                $(".seller").addClass("hidden");
            }
        });

        $("#sign-up").click(function(e) {
            e.preventDefault();
            if ($('#terms').is(":checked")) {
                $(".auth-register-form").submit();
            } else {
                toastr['error']("من فضلك قم بالموافقة على الشروط و الأحكام 👋", "الشروط و الأحكام", {
                    closeButton: true,
                    tapToDismiss: false,
                    rtl: true
                })
                return;
            }

        });
    </script>
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
