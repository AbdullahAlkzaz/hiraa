@extends('layouts.app')
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">

@section('content-header')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{ __('إضافة الشحنة') }}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('prices.index') }}">{{ __('الشحنات') }}</a>
                        </li>


                        <li class="breadcrumb-item active">{{ __('إضافة الشحنة') }}
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
                                <form class="form-horizontal" role="form" id="shipment-form" method="POST"
                                    action="{{ route('shipments.store') }}" novalidate>
                                    {!! csrf_field() !!}
                                    <input type="hidden" value="{{ auth()->user()->id }}" name="user_id" />
                                    @if (auth()->user()->hasRole('admin'))
                                        <input type="hidden" value="admin" name="creator_type" />
                                        <input type="hidden" value="{{ auth()->user()->id }}" name="company_id" />
                                    @elseif(auth()->user()->type_id == \App\Models\Type::OFFICE_TYPE ||
                                            auth()->user()->type_id == \App\Models\Type::SELLER_TYPE)
                                        <input type="hidden" value="regular" name="creator_type" />
                                    @endif

                                    @if (auth()->user()->type_id == \App\Models\Type::OFFICE_TYPE)
                                        <input type="hidden" value="{{ auth()->user()->id }}" name="office_id" />
                                        <input type="hidden" value="{{ auth()->user()->company_id }}" name="company_id" />
                                    @endif
                                    @if (auth()->user()->type_id == \App\Models\Type::SELLER_TYPE)
                                        <input type="hidden" value="{{ auth()->user()->id }}" name="office_id" />
                                        <input type="hidden" value="{{ auth()->user()->id }}" name="company_id" />
                                    @endif



                                    <div class="form-body">
                                        <div class="row">
                                            <h1 class="text-center">بيانات المستلم</h1>
                                            <br>
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-6">
                                                    <label for="receiver-phone" class="form-label"> رقم الهاتف</label>
                                                    <input type="text"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        id="receiver-phone" name="receiver_phone" placeholder=""
                                                        aria-describedby="receiver-phone" tabindex="2"
                                                        value="{{ old('receiver_phone') }}" required />
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                    <label for="register-username" class="form-label">اسم المستلم</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="receiver-name" name="receiver_name" placeholder="john doe"
                                                        aria-describedby="register-username" tabindex="1" autofocus
                                                        value="{{ old('receiver_name') }}" required />
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-12" style="margin-left: 10px;">
                                                    <label for="register-receiver_address" class="form-label"> العنوان
                                                    </label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="receiver-address" name="receiver_address"
                                                        placeholder="john doe" aria-describedby="register-username"
                                                        tabindex="1" autofocus value="{{ old('receiver_address') }}"
                                                        required />
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                {{-- <div class="mb-1 col-md-6">
                                                    <label for="register-phone" class="form-label"> الرقم القومي </label>
                                                    <input type="text"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        id="register-receiver_id" name="receiver_id" placeholder=""
                                                        aria-describedby="register-phone" tabindex="2"
                                                        value="{{ old('receiver_id') }}" required />
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div> --}}
                                            </div>
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                    <label for="government" class="form-label">المحافظة</label>
                                                    <div class="input-group input-group-merge ">
                                                        <select class="form-select select2" id="government-select"
                                                            class="form-control text-center"
                                                            data-placeholder="نوع المستخدم" name="receiver_government"
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
                                                <div class="mb-1 col-md-6 area-select">
                                                    <label for="area" class="form-label">المنطقة</label>
                                                    <div class="input-group input-group-merge ">
                                                        <input type="text"
                                                            class="form-control area-selected form-control-merge"
                                                            value="" id="area" name="receiver_area"
                                                            placeholder="المنطقة" aria-describedby="area" tabindex="3"
                                                            required readonly />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                    <label for="government" class="form-label">الحجم</label>
                                                    <div class="input-group input-group-merge ">
                                                        <select class="form-select select2" id="sizes-select"
                                                            class="form-control text-center" data-placeholder="نوع الشحنة"
                                                            name="shipment_size" required>
                                                            <option value="" class="fs-4 text-center" disabled
                                                                selected>
                                                                <span>إختر الحجم</span>
                                                            </option>
                                                            @foreach ($sizes as $size)
                                                                <option value="{{ $size }}"
                                                                    class="fs-4 text-center">
                                                                    <span>{{ $size }}</span>
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label for="point_price" class="form-label">مصاريف بوينت</label>
                                                    <div class="input-group input-group-merge ">
                                                        <input type="number" class="form-control form-control-merge"
                                                            value="{{ old('point_price', 0) }}" id="shipment-point_price"
                                                            name="point_price" placeholder="مصاريف بوينت"
                                                            aria-describedby="point_price" tabindex="3" required />
                                                    </div>
                                                </div>
                                            </div>
                                            @if (auth()->user()->hasRole('admin'))
                                                <h1 class="text-center">بيانات الراسل</h1>
                                                <br>
                                                <div class="col-md-12" style="display:flex;">
                                                    <div class="mb-1 col-md-6">
                                                        <label for="register-phone" class="form-label"> رقم الهاتف</label>
                                                        <input type="text"
                                                            class="form-control @error('phone') is-invalid @enderror"
                                                            id="sender-phone" name="sender_phone" placeholder=""
                                                            aria-describedby="register-phone" tabindex="2"
                                                            value="{{ old('sender_phone') }}" required />
                                                        @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                        <label for="register-username" class="form-label">اسم
                                                            الراسل</label>
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            id="sender-name" name="sender_name"
                                                            placeholder="john doe" aria-describedby="register-username"
                                                            tabindex="1" autofocus value="{{ old('sender_name') }}"
                                                            required />
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="display:flex;">
                                                    <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                        <label for="register-sender_address" class="form-label"> العنوان
                                                        </label>
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            id="sender-address" name="sender_address"
                                                            placeholder="john doe" aria-describedby="register-username"
                                                            tabindex="1" autofocus value="{{ old('sender_address') }}"
                                                            required />
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-1 col-md-6">
                                                        <label for="register-phone" class="form-label"> الرقم القومي
                                                        </label>
                                                        <input type="text"
                                                            class="form-control @error('phone') is-invalid @enderror"
                                                            id="register-sender_id" name="sender_id" placeholder=""
                                                            aria-describedby="register-phone" tabindex="2"
                                                            value="{{ old('sender_id') }}" required />
                                                        @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="display:flex;">
                                                    <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                        <label for="government" class="form-label">المحافظة</label>
                                                        <div class="input-group input-group-merge ">
                                                            <select class="form-select select2"
                                                                id="sender-government-select"
                                                                class="form-control text-center"
                                                                data-placeholder="نوع المستخدم" name="sender_government"
                                                                required>
                                                                <option value="government" class="fs-4 text-center"
                                                                    selected disabled>
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
                                                    <div class="mb-1 col-md-6 sender-area-select">
                                                        <label for="area" class="form-label">المنطقة</label>
                                                        <div class="input-group input-group-merge ">
                                                            <input type="text"
                                                                class="form-control sender-area-selected form-control-merge"
                                                                value="" id="area" name="sender_area"
                                                                placeholder="المنطقة" aria-describedby="area"
                                                                tabindex="3" required disabled />
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <input type="hidden" name="sender_name"
                                                    value="{{ auth()->user()->name }}" />
                                                <input type="hidden" name="sender_phone"
                                                    value="{{ auth()->user()->phone }}" />
                                                <input type="hidden" name="sender_address"
                                                    value="{{ auth()->user()->address_1 . ', ' . auth()->user()->address_2 }}" />
                                                <input type="hidden" name="sender_id"
                                                    value="{{ auth()->user()->id_number ?? "-" }}" />
                                                <input type="hidden" name="sender_government"
                                                    value="{{ auth()->user()->government }}" />
                                                <input type="hidden" name="sender_area"
                                                    value="{{ auth()->user()->area }}" />
                                            @endif
                                            <h1 class="text-center">تفاصيل الشحنة</h1>
                                            <br>
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                    <label for="register-product_description" class="form-label"> تفاصيل
                                                        المنتج
                                                    </label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="register-username" name="product_description"
                                                        placeholder="john doe" aria-describedby="register-username"
                                                        tabindex="1" autofocus value="{{ old('product_description') }}"
                                                        required />
                                                    @error('product_description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label for="register-phone" class="form-label"> عدد القطع </label>
                                                    <input type="number"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        id="register-product_count" name="product_count" placeholder=""
                                                        aria-describedby="register-phone" tabindex="2"
                                                        value="{{ old('product_count') }}" required />
                                                    @error('product_count')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                    <label for="register-product_description" class="form-label">
                                                        نوع الشحنة
                                                    </label>
                                                    <select class="form-select select2" id="is_receive-select"
                                                        class="form-control text-center" data-placeholder="نوع المستخدم"
                                                        name="is_receive" required>
                                                        <option value="" class="fs-4 text-center" selected disabled>
                                                            <span>إختر نوع الشحنة</span>
                                                        </option>
                                                        <option value="1" class="fs-4 text-center">
                                                            <span>إستلام</span>
                                                        </option>
                                                        <option value="0" class="fs-4 text-center">
                                                            <span>تسليم</span>
                                                        </option>
                                                    </select>
                                                    @error('is_receive')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label for="coupon_code" class="form-label"> كود الخصم</label>
                                                    <input type="number"
                                                        class="form-control @error('coupon_code') is-invalid @enderror"
                                                        id="coupon_code" name="coupon_code" placeholder=""
                                                        aria-describedby="coupon_code" tabindex="2"
                                                        value="{{ old('coupon_code') }}" required />
                                                    @error('coupon_code')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                    <label for="register-product_description" class="form-label">
                                                        طريقة تحويل الفلوس
                                                    </label>
                                                    <select class="form-select select2" id="money_transfer_type-select"
                                                        class="form-control text-center" data-placeholder="نوع المستخدم"
                                                        name="money_transfer_type" required>
                                                        <option value="" class="fs-4 text-center" selected disabled>
                                                            <span>إختر الطريقة</span>
                                                        </option>
                                                        <option value="الفرع" class="fs-4 text-center">
                                                            <span>الفرع</span>
                                                        </option>
                                                        <option value="محفظة" class="fs-4 text-center">
                                                            <span>محفظة</span>
                                                        </option>
                                                        <option value="حساب بنكي" class="fs-4 text-center">
                                                            <span>حساب بنكي</span>
                                                        </option>
                                                    </select>
                                                    @error('money_transfer_type')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label for="register-client_price" class="form-label"> المبلغ اللي
                                                        العميل هيدفعو للمدوب عند الاستلام
                                                    </label>
                                                    <input type="number"
                                                        class="form-control @error('client_price') is-invalid @enderror"
                                                        id="register-client_price" name="client_price" placeholder=""
                                                        aria-describedby="register-client_price" tabindex="2"
                                                        value="{{ old('client_price') }}" required />
                                                    @error('client_price')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                    <label for="register-open_shipment" class="form-label">
                                                        السماح للعميل بفتح الشحنة؟
                                                    </label>
                                                    <select class="form-select select2" id="open_shipment-select"
                                                        class="form-control text-center" data-placeholder="نوع المستخدم"
                                                        name="open_shipment" required>
                                                        <option value="1" class="fs-4 text-center">
                                                            <span>نعم</span>
                                                        </option @selected(true)>
                                                        <option value="0" class="fs-4 text-center">
                                                            <span>لا</span>
                                                        </option>
                                                    </select>
                                                    @error('open_shipment')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label for="register-note" class="form-label">ملاحظة
                                                    </label>
                                                    <input type="text"
                                                        class="form-control @error('note') is-invalid @enderror"
                                                        id="register-note" name="note" placeholder=""
                                                        aria-describedby="register-note" tabindex="2"
                                                        value="{{ old('note') }}" required />
                                                    @error('note')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <input type="hidden" id="confirm-and-recreate-input" value="0" name="confirm_flag">
                                            </div>
                                            <div class="col-md-12 offset-md-5">
                                                <br>
                                                <button type="submit"
                                                    class="btn btn-primary mr-2 mb-1 waves-effect waves-light ">{{ __('تأكيد') }}</button>
                                                <button type="button"
                                                    class="btn btn-success mr-2 mb-1 waves-effect waves-light " id="confirm-and-recreate-button">{{ __('تأكيد و عمل شحنة جدبدة') }}</button>
                                                <button type="reset"
                                                    class="btn btn-outline-warning mr-2 mb-1 waves-effect waves-light">{{ __('Reset') }}</button>
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
        $("#confirm-and-recreate-button").click(function(){
            $("#confirm-and-recreate-input").val(1);
            $("#shipment-form").submit();
            
        });
        $("#receiver-phone").keyup(function(){
            var phone = $(this).val();
            if(phone){
                var url = "{{ URL::to('/') }}" + '/shipments/get/clinet/data' + "/" + phone;
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: url,
                    success: function(data) {
                        data = JSON.parse(data);
                        $("#receiver-name").val(data.name);
                        $("#receiver-address").val(data.address);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
        });
        $("#sender-phone").keyup(function(){
            var phone = $(this).val();
            if(phone){
                var url = "{{ URL::to('/') }}" + '/shipments/get/clinet/data' + "/" + phone;
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: url,
                    success: function(data) {
                        data = JSON.parse(data);
                        $("#sender-name").val(data.name);
                        $("#sender-address").val(data.address);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
            

        });
        $("#government-select").on("change", function() {
            let government = $(this).val();

            var url = "{{ URL::to('/') }}" + '/government/areas' + "/" + government;
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
        $("#sender-government-select").on("change", function() {
            let government = $(this).val();

            var url = "{{ URL::to('/') }}" + '/government/areas' + "/" + government + "?sender=1";
            console.log(url);
            $.ajax({
                type: 'get',
                dataType: 'html',
                url: url,
                success: function(data) {
                    $(".sender-area-select").html(data);
                },
                error: function(err) {
                    alert(1);
                    console.log(err);
                }
            });
        });
        $("#sizes-select").on("change", function() {
            let size = $(this).val();
            let area = $(".area-selected").val();
            let government = $("#government-select").val();
            if ($("#government-select").val() == "government") {
                Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    html: 'من فضلك اختر المحافظة أولا',
                    showConfirmButton: false,
                    timer: 3000,
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                })
                return 0;
            }
            if ($(".area-selected").val() == "") {
                Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    html: 'من فضلك اختر المنطقة أولا',
                    showConfirmButton: false,
                    timer: 3000,
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                })
                return 0;
            }

            var url = "{{ URL::to('/') }}" + '/size/price' + "/" + size + "/" + area + "/" + government;
            console.log(url);
            $.ajax({
                type: 'get',
                dataType: 'html',
                url: url,
                success: function(data) {
                    if (data != false) {
                        $("#shipment-point_price").val(data);
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            type: 'success',
                            html: 'السعر غير محدد من فطلك اكتبه بيدك',
                            showConfirmButton: false,
                            timer: 3000,
                            confirmButtonClass: 'btn btn-primary',
                            buttonsStyling: false,
                        })
                    }
                },
                error: function(err) {
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
