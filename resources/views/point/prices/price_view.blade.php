@extends('layouts.app')
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">

@section('content-header')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{ __('إضافة التسعير') }}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('prices.index') }}">{{ __('التسعيرات') }}</a>
                        </li>


                        <li class="breadcrumb-item active">{{ __('إضافة التسعير') }}
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
                                <form class="form-horizontal" role="form" method="POST"
                                    action="{{ route('prices.update') }}" novalidate>
                                    {!! csrf_field() !!}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" name="id", value="{{ $price->id }}">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                    <label for="register-username" class="form-label">(من)المحافظة</label>
                                                    <input type="text"
                                                        class="form-control @error('from_government') is-invalid @enderror"
                                                        id="register-username" name="from_government" placeholder="المحافظة"
                                                        aria-describedby="register-userfrom_government" tabindex="1" autofocus
                                                        value="{{ old('from_government', $price->from_government) }}" required />
                                                    @error('from_government')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label for="register-email" class="form-label">(من)المنطقة</label>
                                                    <input type="text"
                                                        class="form-control @error('from_area') is-invalid @enderror"
                                                        id="register-from_area" name="from_area" placeholder="المنطقة"
                                                        aria-describedby="register-from_area" tabindex="2"
                                                        value="{{ old('from_area', $price->from_area) }}" required />
                                                    @error('from_area')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                    <label for="register-username" class="form-label">(الى)المحافظة</label>
                                                    <input type="text"
                                                        class="form-control @error('government') is-invalid @enderror"
                                                        id="register-username" name="government" placeholder="المحافظة"
                                                        aria-describedby="register-usergovernment" tabindex="1" autofocus
                                                        value="{{ old('government', $price->government) }}" required />
                                                    @error('government')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label for="register-email" class="form-label">(الى)المنطقة</label>
                                                    <input type="text"
                                                        class="form-control @error('area') is-invalid @enderror"
                                                        id="register-area" name="area" placeholder="المنطقة"
                                                        aria-describedby="register-area" tabindex="2"
                                                        value="{{ old('area', $price->area) }}" required />
                                                    @error('area')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="mb-1 col-md-6" style="margin-left: 10px;">
                                                    <label for="government" class="form-label">الحجم</label>
                                                    <div class="input-group input-group-merge ">
                                                        <select class="form-select select2" id="user-type"
                                                            class="form-control text-center" data-placeholder="نوع الشحنة"
                                                            name="size" required>
                                                            @foreach ($sizes as $size)
                                                                <option value="{{ $size }}"
                                                                    class="fs-4 text-center" {{$price->size == $size ? "selected" : ""}}>
                                                                    <span>{{ $size }}</span>
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label for="price" class="form-label">السعر</label>
                                                    <div class="input-group input-group-merge ">
                                                        <input type="number" class="form-control form-control-merge"
                                                            value="{{ old('price', $price->price) }}" id="price" name="price"
                                                            placeholder="السعر" aria-describedby="price" tabindex="3"
                                                            required />
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
