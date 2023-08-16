@extends('layouts.fullLayoutMaster')
@section('title', 'Register Page')
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@section('page-style')
    {{-- Page Css files --}}
@endsection
@section('content')
    <div class="px-2">
        <div class="my-2">
            <!-- Register Basic -->
            <div class="card mb-0">
                <div class="card-body">
                    <a href="#" class="brand-logo">
                        <h2 class="brand-text text-primary ms-1">{{ config('app.name') }}</h2>
                    </a>
                    <h4 class="card-title mb-1">🚀 المتعة تبدأ الآن </h4>
                    <p class="card-text mb-2">إجعل عملك أسهل و ألطف</p>

                    @error('auth_failed')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <form class="auth-register-form" method="POST" action="{{ route('register') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-1 col-md-6" style="margin-right:25%;">
                            <label for="register-username" class="form-label">نوع المستخدم</label>
                            <select class="form-select select2" id="user-type" class="form-control text-center"
                                data-placeholder="نوع المستخدم" name="is_seller" required>
                                <option value="0" class="fs-4 text-center" selected>
                                    <span>مندوب بوينت</span>
                                </option>
                                <option value="2" class="fs-4 text-center">
                                    <span> مندوب لشركة أخرى</span>
                                </option>
                                <option value="1" class="fs-4 text-center">
                                    <span>عميل</span>
                                </option>
                            </select>
                        </div>
                        <div class="col-md-12" style="display:flex;">
                            <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                <label for="register-username" class="form-label">اسم المستخدم</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
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
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    id="register-email" name="email" placeholder="" aria-describedby="register-email"
                                    tabindex="2" value="{{ old('email') }}" required />
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
                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-1 col-md-6">
                                <label for="register-password-confirm" class="form-label">تأكيد كلمة المرور</label>
                                <div class="input-group input-group-merge form-password-toggle">
                                    <input type="password" class="form-control form-control-merge"
                                        id="register-password-confirm" name="password_confirmation"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="register-password" tabindex="3" required />
                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="display:flex;">
                            <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                <label for="phone" class="form-label">رقم الهاتف</label>
                                <div class="input-group input-group-merge ">
                                    <input type="text" class="form-control form-control-merge"
                                        value="{{ old('phone') }}" id="phone" name="phone"
                                        placeholder="رقم الهاتف" aria-describedby="phone" tabindex="3" required />
                                </div>
                            </div>
                            <div class="mb-1 col-md-6">
                                <label for="date_of_pirth" class="form-label">تاريخ الميلاد</label>
                                <div class="input-group input-group-merge ">
                                    <input type="date"
                                        class="form-control form-control-merge dt-date flatpickr-range dt-input"
                                        value="{{ old('date_of_pirth') }}" id="date_of_pirth" name="date_of_pirth"
                                        placeholder="تاريخ الميلاد" aria-describedby="date_of_pirth" tabindex="3"
                                        required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="display:flex;">
                            <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                <label for="id_image_back" class="form-label">صورة البطاقى من الخلف</label>
                                <div class="input-group input-group-merge ">
                                    <input type="file" class="form-control form-control-merge"
                                        value="{{ old('id_image_back') }}" id="id_image_back" name="id_image_back"
                                        placeholder="صورة البطاقى من الخلف" aria-describedby="id_image_back"
                                        tabindex="3" required />
                                </div>
                            </div>
                            <div class="mb-1 col-md-6">
                                <label for="id_image_front" class="form-label">صورة البطاقى من الأمام</label>
                                <div class="input-group input-group-merge ">
                                    <input type="file"
                                        class="form-control form-control-merge dt-date flatpickr-range dt-input"
                                        value="{{ old('id_image_front') }}" id="id_image_front" name="id_image_front"
                                        placeholder="صورة البطاقى من الأمام" aria-describedby="id_image_front"
                                        tabindex="3" required />
                                </div>
                            </div>
                        </div>
                        <br>
                        <h1 class="text-center">النوع</h1>
                        <br>
                        <div class="col-md-12" style="display:flex;">
                            <div class="mb-1 col-md-4" style="margin-left: 10px;">
                                <div class="form-check form-check-inline mp-1">
                                    <input type="radio" value="0" class="form-check-input" name="gender"
                                        required>
                                    <label class="form-check-label" for="collapsible-payment-cash">ذكر</label>
                                </div>
                            </div>
                            <div class="mb-1 col-md-4" margin-left: 10px;>
                                <div class="form-check form-check-inline ">
                                    <input type="radio" value="1" class="form-check-input" name="gender">
                                    <label class="form-check-label" for="collapsible-payment-cash">أنثى</label>
                                </div>
                            </div>
                            <div class="mb-1 col-md-4">
                                <div class="form-check form-check-inline ">
                                    <input type="radio" value="2" class="form-check-input" name="gender">
                                    <label class="form-check-label" for="collapsible-payment-cash">افضل عدم القول</label>
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
                                        value="{{ old('address_1') }}" id="address_1" name="address_1"
                                        placeholder="أدخل الشارع" aria-describedby="address_1" tabindex="3" required />
                                </div>
                            </div>
                            <div class="mb-1 col-md-6" margin-left: 10px;>
                                <label for="address_2" class="form-label">أدخل شارع آخر</label>
                                <div class="input-group input-group-merge ">
                                    <input type="text" class="form-control form-control-merge"
                                        value="{{ old('address_2') }}" id="address_2" name="address_2"
                                        placeholder="أدخل شارع آخر" aria-describedby="address_2" tabindex="3"
                                        required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="display:flex;">
                            <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                <label for="government" class="form-label">المحافظة</label>
                                <div class="input-group input-group-merge ">
                                    <select class="form-select select2" id="government-select"
                                        class="form-control text-center"
                                        data-placeholder="نوع المستخدم" name="government"
                                        required>
                                        <option value="government" class="fs-4 text-center" selected>
                                            <span>إختر المحافظة</span>
                                        </option>
                                        @foreach ($governments as $one_gevernment)
                                            <option value="{{ $one_gevernment }}"
                                                class="fs-4 text-center">
                                                <span>{{ $one_gevernment }}</span>
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mb-1 col-md-6">
                                <label for="city" class="form-label">المدينة</label>
                                <div class="input-group input-group-merge ">
                                    <input type="text" class="form-control form-control-merge"
                                        value="{{ old('city') }}" id="city" name="city" placeholder="المدينة"
                                        aria-describedby="city" tabindex="3" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="display:flex;">
                            <div class="mb-1 col-md-6 area-select">
                                <label for="area" class="form-label">المنطقة</label>
                                <div class="input-group input-group-merge ">
                                    <input type="text"
                                        class="form-control area-selected form-control-merge"
                                        value="" id="area" name="area"
                                        placeholder="المنطقة" aria-describedby="area" tabindex="3"
                                        required readonly />
                                </div>
                            </div>
                            <div class="mb-1 col-md-6">
                                <label for="postal_code" class="form-label">الرمز البريدي</label>
                                <div class="input-group input-group-merge ">
                                    <input type="text" class="form-control form-control-merge"
                                        value="{{ old('postal_code') }}" id="postal_code" name="postal_code"
                                        placeholder="الرمز البريدي" aria-describedby="postal_code" tabindex="3"
                                        required />
                                </div>
                            </div>
                        </div>
                        <div class="company-agent hidden">
                            <br>
                            <h1 class="text-center">بيانات الشركة و المكتب </h1>
                            <br>
                            <div class="company-details">
                                <div class="mb-1 col-md-6" style="margin-right:25%;">
                                    <label for="register-username" class="form-label">إختر الشركة</label>
                                    <select class="form-select select2" id="company-id" class="form-control text-center"
                                        name="company_id" required>
                                        <option value="" class="fs-4 text-center" disabled selected>
                                            <span>إختر الشركة</span>
                                        </option>
                                        @foreach ($companies as $company)
                                                <option value="{{ $company->id }}" class="fs-4 text-center">
                                                    <span>{{ $company->name }}</span>
                                                </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="office-details">
                                <div class="mb-1 col-md-6" style="margin-right:25%;">
                                    <label for="register-username" class="form-label">إخترالمكتب</label>
                                    <select class="form-select select2" id="company-id" class="form-control text-center"
                                        name="company_id" required>
                                        <option value="" class="fs-4 text-center" disabled selected>
                                            <span>إختر إخترالمكتب</span>
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="seller hidden">
                            <br>
                            <h1 class="text-center">معلومات المتحر </h1>
                            <br>
                            <div class="col-md-12" style="display:flex;">
                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                    <label for="shop_name" class="form-label">اسم المتجر</label>
                                    <div class="input-group input-group-merge ">
                                        <input type="text" class="form-control form-control-merge"
                                            value="{{ old('shop_name') }}" id="shop_name" name="shop_name"
                                            placeholder="اسم المتجر" aria-describedby="shop_name" tabindex="3"
                                            required />
                                    </div>
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label for="product_category" class="form-label">نوع المنتج</label>
                                    <div class="input-group input-group-merge ">
                                        <input type="text" class="form-control form-control-merge"
                                            value="{{ old('product_category') }}" id="product_category"
                                            name="product_category" placeholder="نوع المنتج"
                                            aria-describedby="product_category" tabindex="3" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="display:flex;">
                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                    <label for="shop_address" class="form-label">عنوان المتجر</label>
                                    <div class="input-group input-group-merge ">
                                        <input type="text" class="form-control form-control-merge"
                                            value="{{ old('shop_address') }}" id="shop_address" name="shop_address"
                                            placeholder="عنوان المتجر" aria-describedby="shop_address" tabindex="3"
                                            required />
                                    </div>
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label for="product_category" class="form-label">شعار المتجر</label>
                                    <div class="input-group input-group-merge ">
                                        <input type="file" class="form-control form-control-merge"
                                            value="{{ old('shop_logo') }}" id="shop_logo" name="shop_logo"
                                            placeholder="شعار المتجر" aria-describedby="shop_logo" tabindex="3"
                                            required />
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h1 class="text-center">مكان النشاط</h1>
                            <br>
                            <div class="col-md-12" style="display:flex;">
                                <div class="mb-1 col-md-4" style="margin-left: 10px;">
                                    <div class="form-check form-check-inline mp-1">
                                        <input type="radio" value="0" class="form-check-input"
                                            name="activity_type" required>
                                        <label class="form-check-label" for="collapsible-payment-cash">أونلاين</label>
                                    </div>
                                </div>
                                <div class="mb-1 col-md-4" margin-left: 10px;>
                                    <div class="form-check form-check-inline ">
                                        <input type="radio" value="1" class="form-check-input"
                                            name="activity_type">
                                        <label class="form-check-label" for="collapsible-payment-cash">محل </label>
                                    </div>
                                </div>
                                <div class="mb-1 col-md-4">
                                    <div class="form-check form-check-inline ">
                                        <input type="radio" value="2" class="form-check-input"
                                            name="activity_type">
                                        <label class="form-check-label" for="collapsible-payment-cash">محل &
                                            أونلاين</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h1 class="text-center">هل المنتج قابل للكسر؟</h1>
                            <br>
                            <div class="col-md-12" style="display:flex;">
                                <div class="mb-1 col-md-4" style="margin-left: 10px;">
                                    <div class="form-check form-check-inline mp-1">
                                        <input type="radio" value="0" class="form-check-input"
                                            name="breakable_product" required>
                                        <label class="form-check-label" for="collapsible-payment-cash">غير قابل
                                            للكسر</label>
                                    </div>
                                </div>
                                <div class="mb-1 col-md-4" margin-left: 10px;>
                                    <div class="form-check form-check-inline ">
                                        <input type="radio" value="1" class="form-check-input"
                                            name="breakable_product">
                                        <label class="form-check-label" for="collapsible-payment-cash">نعم قابل
                                            للكسر</label>
                                    </div>
                                </div>
                                <div class="mb-1 col-md-4">
                                    <div class="form-check form-check-inline ">
                                        <input type="radio" value="2" class="form-check-input"
                                            name="breakable_product">
                                        <label class="form-check-label" for="collapsible-payment-cash">مختلط</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-1 col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms" name="terms"
                                    tabindex="4" />
                                <label class="form-check-label" for="terms">
                                    أوافق على <a href="{{ route('terms.show') }}" target="_blank">الشروط و الأحكام</a> و
                                    <a href="{{ route('policy.show') }}" target="_blank">الخصوصية</a>
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" id="sign-up" tabindex="5">تسجيل
                            الحساب</button>
                    </form>
                </div>
            </div>
            <!-- /Register basic -->
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script> <!-- END: Page Vendor JS-->


    {{-- show shop details inputs if the user is seller --}}
    <script>
        $("#government-select").on("change", function() {
            let government = $(this).val();

            var url = "{{ URL::to('/') }}" + '/government/areas' + "/" + government + "?signup=1";
            console.log(url);
            $.ajax({
                type: 'get',
                dataType: 'html',
                url: url,
                success: function(data) {
                    $(".area-select").html(data);
                },
                error: function(err) {
                    alert(1);
                    console.log(err);
                }
            });
        });
        $("#user-type").on("change", function() {
            let userType = $(this).val();
            if (userType == 1) {
                $(".seller").removeClass("hidden");
                $(".company-agent").addClass("hidden");
            } else if (userType == 0) {
                $(".seller").addClass("hidden");
                $(".company-agent").addClass("hidden");
            } else if (userType == 2) {
                $(".seller").addClass("hidden");
                $(".company-agent").removeClass("hidden");
            }
        });
        $("#company-id").on("change", function() {
            let company_id = $(this).val();
            
            var url = "{{URL::to('/')}}" + '/company/offices' +"/"+ parseInt(company_id);
            console.log(url);
            $.ajax({
                type: 'get',
                dataType: 'html',
                url: url,
                success: function (data) {
                    $(".office-details").html(data);
                },
                error: function (err){
                    alert(1);
                    console.log(err);
                }
            });
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
