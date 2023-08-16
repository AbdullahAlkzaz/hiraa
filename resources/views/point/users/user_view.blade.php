@extends('layouts.app')
<style>
    .full-size {
        z-index: 999 !important;
        cursor: zoom-out !important;
        display: block !important;
        width: 100% !important;
        height: 100% !important;
        /* position: fixed !important; */
        text-align: center;
    }

    .image {
        cursor: zoom-in;
        height: 100px;
        width: 100px;
    }
</style>
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@section('content-header')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{ __('users_users') }}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('users_users') }}</a>
                        </li>
                        <li class="breadcrumb-item active"> @lang('users_show_title') {{ $user->id }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
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
    <section class="simple-validation">
        <div class="row">
            <div class="col-md-12">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

                                {{-- @if (session('message'))
                                    <div class="alert alert-info">
                                        {{ session('message') }}
                                    </div>
                                @endif --}}


                                <form class="form-horizontal" role="form" method="POST"
                                    action="{{ route('users.update', $user) }}" enctype="multipart/form-data" novalidate>

                                    {!! csrf_field() !!}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" name="id" value="{{$user->id}}">

                                    <div class="form-body">
                                        @csrf
                                        <div class="mb-1 col-md-6" style="margin-right:25%;">
                                            <label for="register-username" class="form-label">نوع المستخدم</label>
                                            <select class="form-select select2" id="user-type"
                                                class="form-control text-center" data-placeholder="نوع المستخدم"
                                                name="is_seller" required>
                                                <option value="0" class="fs-4 text-center"
                                                    @if ($user->type_id == 4) selected @endif>
                                                    <span>مندوب</span>
                                                </option>
                                                <option value="1" class="fs-4 text-center"
                                                    @if ($user->type_id == 3) selected @endif>
                                                    <span>بائع</span>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-12" style="display:flex;">
                                            <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                <label for="register-username" class="form-label">اسم المستخدم</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="register-username" name="name" placeholder="john doe"
                                                    aria-describedby="register-username" tabindex="1" autofocus
                                                    value="{{ old('name', $user->name) }}" required />
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
                                                    value="{{ old('email', $user->email) }}" required />
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="display:flex;">
                                            <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                <label for="phone" class="form-label">رقم الهاتف</label>
                                                <div class="input-group input-group-merge ">
                                                    <input type="text" class="form-control form-control-merge"
                                                        value="{{ old('phone', $user->phone) }}" id="phone"
                                                        name="phone" placeholder="رقم الهاتف" aria-describedby="phone"
                                                        tabindex="3" required />
                                                </div>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label for="date_of_pirth" class="form-label">تاريخ الميلاد</label>
                                                <div class="input-group input-group-merge ">
                                                    <input type="date"
                                                        class="form-control form-control-merge dt-date flatpickr-range dt-input"
                                                        value="{{ old('date_of_pirth', $user->date_of_pirth) }}"
                                                        id="date_of_pirth" name="date_of_pirth"
                                                        placeholder="تاريخ الميلاد" aria-describedby="date_of_pirth"
                                                        tabindex="3" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="display:flex;">
                                            <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                <label for="id_image_back" class="form-label">صورة البطاقى من
                                                    الخلف</label>
                                                <div class="input-group input-group-merge ">
                                                    <input type="file" class="form-control form-control-merge"
                                                        value="{{ old('id_image_back') }}" id="id_image_back"
                                                        name="id_image_back" placeholder="صورة البطاقى من الخلف"
                                                        aria-describedby="id_image_back" tabindex="3" required />
                                                </div>
                                                <div>
                                                    <img src="{{ asset('storage/' . $user->id_image_back) }}"
                                                        class="image" alt="صورة البطاقة من الأمام"
                                                        onclick="change(this)">
                                                </div>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label for="id_image_front" class="form-label">صورة البطاقى من
                                                    الأمام</label>
                                                <div class="input-group input-group-merge ">
                                                    <input type="file"
                                                        class="form-control form-control-merge dt-date flatpickr-range dt-input"
                                                        value="{{ old('id_image_front') }}" id="id_image_front"
                                                        name="id_image_front" placeholder="صورة البطاقى من الأمام"
                                                        aria-describedby="id_image_front" tabindex="3" required />
                                                </div>
                                                <div>
                                                    <img src="{{ asset('storage/' . $user->id_image_front) }}"
                                                        class="image" alt="صورة البطاقة من الأمام"
                                                        onclick="change(this)">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <h1 class="text-center">النوع</h1>
                                        <br>
                                        <div class="col-md-12" style="display:flex;">
                                            <div class="mb-1 col-md-4" style="margin-left: 10px;">
                                                <div class="form-check form-check-inline mp-1">
                                                    <input type="radio" value="0" class="form-check-input"
                                                        name="gender" required
                                                        @if ($user->gender == 0) @checked(true) @endif>
                                                    <label class="form-check-label"
                                                        for="collapsible-payment-cash">ذكر</label>
                                                </div>
                                            </div>
                                            <div class="mb-1 col-md-4" margin-left: 10px;>
                                                <div class="form-check form-check-inline ">
                                                    <input type="radio" value="1" class="form-check-input"
                                                        name="gender"
                                                        @if ($user->gender == 1) @checked(true) @endif>
                                                    <label class="form-check-label"
                                                        for="collapsible-payment-cash">أنثى</label>
                                                </div>
                                            </div>
                                            <div class="mb-1 col-md-4">
                                                <div class="form-check form-check-inline ">
                                                    <input type="radio" value="2" class="form-check-input"
                                                        name="gender"
                                                        @if ($user->gender == 2) @checked(true) @endif>
                                                    <label class="form-check-label" for="collapsible-payment-cash">افضل
                                                        عدم القول</label>
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
                                                        value="{{ old('address_1', $user->address_1) }}" id="address_1"
                                                        name="address_1" placeholder="أدخل الشارع"
                                                        aria-describedby="address_1" tabindex="3" required />
                                                </div>
                                            </div>
                                            <div class="mb-1 col-md-6" margin-left: 10px;>
                                                <label for="address_2" class="form-label">أدخل شارع آخر</label>
                                                <div class="input-group input-group-merge ">
                                                    <input type="text" class="form-control form-control-merge"
                                                        value="{{ old('address_2', $user->address_2) }}" id="address_2"
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
                                                        class="form-control text-center" data-placeholder="نوع المستخدم"
                                                        name="government" required>
                                                        <option value="البحيرة" class="fs-4 text-center"
                                                        @selected($user->government == "البحيرة")>
                                                            <span>البحيرة</span>
                                                        </option>
                                                        <option value="الأسكندرية" class="fs-4 text-center"
                                                        @selected($user->government == "الأسكندرية")>
                                                            <span>الأسكندرية</span>
                                                        </option>
                                                        <option value="القاهرة" class="fs-4 text-center"
                                                        @selected($user->government == "القاهرة")>
                                                            <span>القاهرة</span>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label for="city" class="form-label">المدينة</label>
                                                <div class="input-group input-group-merge ">
                                                    <input type="text" class="form-control form-control-merge"
                                                        value="{{ old('city', $user->city) }}" id="city"
                                                        name="city" placeholder="المدينة" aria-describedby="city"
                                                        tabindex="3" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="display:flex;">
                                            <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                <label for="area" class="form-label">المنطقة</label>
                                                <div class="input-group input-group-merge ">
                                                    <input type="text" class="form-control form-control-merge"
                                                        value="{{ old('area', $user->area) }}" id="area"
                                                        name="area" placeholder="المنطقة" aria-describedby="area"
                                                        tabindex="3" required />
                                                </div>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label for="postal_code" class="form-label">الرمز البريدي</label>
                                                <div class="input-group input-group-merge ">
                                                    <input type="text" class="form-control form-control-merge"
                                                        value="{{ old('postal_code', $user->postal_code) }}"
                                                        id="postal_code" name="postal_code" placeholder="الرمز البريدي"
                                                        aria-describedby="postal_code" tabindex="3" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="seller @if ($user->type_id == 4) hidden @endif">
                                            <br>
                                            <h1 class="text-center">معلومات المتحر </h1>
                                            <br>
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                    <label for="shop_name" class="form-label">اسم المتجر</label>
                                                    <div class="input-group input-group-merge ">
                                                        <input type="text" class="form-control form-control-merge"
                                                            value="{{ old('shop_name', $user->shop_name) }}"
                                                            id="shop_name" name="shop_name" placeholder="اسم المتجر"
                                                            aria-describedby="shop_name" tabindex="3" required />
                                                    </div>
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label for="product_category" class="form-label">نوع المنتج</label>
                                                    <div class="input-group input-group-merge ">
                                                        <input type="text" class="form-control form-control-merge"
                                                            value="{{ old('product_category', $user->product_category) }}"
                                                            id="product_category" name="product_category"
                                                            placeholder="نوع المنتج" aria-describedby="product_category"
                                                            tabindex="3" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                    <label for="shop_address" class="form-label">عنوان المتجر</label>
                                                    <div class="input-group input-group-merge ">
                                                        <input type="text" class="form-control form-control-merge"
                                                            value="{{ old('shop_address', $user->shop_address) }}"
                                                            id="shop_address" name="shop_address"
                                                            placeholder="عنوان المتجر" aria-describedby="shop_address"
                                                            tabindex="3" required />
                                                    </div>
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label for="product_category" class="form-label">شعار المتجر</label>
                                                    <div class="input-group input-group-merge ">
                                                        <input type="file" class="form-control form-control-merge"
                                                            value="{{ old('shop_logo') }}" id="shop_logo"
                                                            name="shop_logo" placeholder="شعار المتجر"
                                                            aria-describedby="shop_logo" tabindex="3" required />
                                                    </div>
                                                    @if ($user->shop_logo)
                                                        <div>
                                                            <img src="{{ asset('storage/' . $user->shop_logo) }}"
                                                                class="image" alt="صورة البطاقة من الأمام"
                                                                onclick="change(this)">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <br>
                                            <h1 class="text-center">مكان النشاط</h1>
                                            <br>
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-4" style="margin-left: 10px;">
                                                    <div class="form-check form-check-inline mp-1">
                                                        <input type="radio" value="0" class="form-check-input"
                                                            name="activity_type" required @checked($user->activity_type == 0)>
                                                        <label class="form-check-label"
                                                            for="collapsible-payment-cash">أونلاين</label>
                                                    </div>
                                                </div>
                                                <div class="mb-1 col-md-4" margin-left: 10px;>
                                                    <div class="form-check form-check-inline ">
                                                        <input type="radio" value="1" class="form-check-input"
                                                            name="activity_type" @checked($user->activity_type == 1)>
                                                        <label class="form-check-label" for="collapsible-payment-cash">محل
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="mb-1 col-md-4">
                                                    <div class="form-check form-check-inline ">
                                                        <input type="radio" value="2" class="form-check-input"
                                                            name="activity_type" @checked($user->activity_type == 2)>
                                                        <label class="form-check-label" for="collapsible-payment-cash">محل
                                                            &
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
                                                            name="breakable_product" required @checked($user->breakable_product == 0)>
                                                        <label class="form-check-label" for="collapsible-payment-cash">غير
                                                            قابل
                                                            للكسر</label>
                                                    </div>
                                                </div>
                                                <div class="mb-1 col-md-4" margin-left: 10px;>
                                                    <div class="form-check form-check-inline ">
                                                        <input type="radio" value="1" class="form-check-input"
                                                            name="breakable_product" @checked($user->breakable_product == 1)>
                                                        <label class="form-check-label" for="collapsible-payment-cash">نعم
                                                            قابل
                                                            للكسر</label>
                                                    </div>
                                                </div>
                                                <div class="mb-1 col-md-4">
                                                    <div class="form-check form-check-inline ">
                                                        <input type="radio" value="2" class="form-check-input"
                                                            name="breakable_product" @checked($user->breakable_product == 2)>
                                                        <label class="form-check-label"
                                                            for="collapsible-payment-cash">مختلط</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                        <br>
                                        <div class="col-md-12 offset-md-5">
                                            <button type="submit"
                                                class="btn btn-primary mr-1 mb-1 waves-effect waves-light ">{{ __('تعديل') }}</button>
                                            <button type="reset"
                                                class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">{{ __('إعادة') }}</button>
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


    <ul class="pager" style="font-size: 20px;">
        @if ($previous)
            <li class="previous">
                <a href="/user/show/{{ $previous }}"><i class="ace-icon fa fa-angle-double-right"></i>
                    @lang('السابق') </a>
            </li>
        @endif
        @if ($next)
            <li class="next">
                <a href="/user/show/{{ $next }}"> @lang('التالي') <i
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
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>    <!-- END: Page Vendor JS-->
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
    <script>
        function change(element) {
            element.classList.toggle("full-size");
        }

        $("#user-type").on("change", function() {
            let userType = $(this).val();
            if (userType == 1) {
                $(".seller").removeClass("hidden");
            } else {
                $(".seller").addClass("hidden");
            }
        });
    </script>
@endsection
