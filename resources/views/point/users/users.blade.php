@extends('layouts.app')

@section('content-header')

<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">


    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{ __('users_users') }}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">
                            {{ __('users_users') }}
                        </li>

                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <div class="form-group breadcrum-right">

            <a title="{{ __('Add new') }}" class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle"
                href="{{ route('users.create') }}">
                <i class="feather icon-plus"></i></a>


        </div>
    </div>

@endsection




@push('style')
@endpush


@section('content')



    @include('point.users.search.search')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('users_users') }}</h4>
                    @if(auth()->user()->type_id == \App\Models\Type::COMPANY_TYPE || auth()->user()->type_id == \App\Models\Type::OFFICE_TYPE)
                    <a href="{{ route("users.create") }}" class="btn btn-primary">انشاء مستخدم</a>
                    @endif
                </div>
                <div class="card-content">
                    <div class="table-responsive mt-1">
                        <table class="table table-hover-animation mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الالكتروني</th>
                                    <th>الهاتف</th>
                                    <th>النوع</th>
                                    <th class="city">المحافظة</th>
                                    <th class="city">المدينة</th>
                                    <th class="city">المنطقة</th>
                                    <th>التأكيد؟</th>
                                    <th>نوع الحساب</th>
                                    <th>نوع المنتج</th>
                                    <th>العنوان</th>
                                    <th>اسم الشركة</th>
                                    <th> وقت التسجيل </th>
                                    @role('admin')
                                    <th>{{ __('Action') }}</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    @if(!$user->hasRole('admin'))
                                    <tr>
                                        <td>{{ $user->firstItem + $key + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-muted"> {{ $user->phone }} </td>
                                        <td> {{ $user->gender == 0 ? 'male' : ($user->gender == 1 ? 'femail' : 'other') }}
                                        </td>
                                        <td class="city">{{ $user->government }}</td>
                                        <td>{{ $user->city }}</td>
                                        <td>{{ $user->area }}</td>
                                        @if ($user->approved == 1)
                                            <td><span class="btn btn-success">نعم</span></td>
                                        @else
                                            <td><span class="btn btn-danger">لا</span></td>
                                        @endif
                                        @if ($user->type_id == 1)
                                            <td>شركة</td>
                                        @elseif($user->type_id == 2)
                                            <td>مكتب</td>
                                        @elseif($user->type_id == 3)
                                            <td>بائع</td>
                                        @elseif($user->type_id == 4)
                                            <td>مندوب</td>
                                        @endif
                                        <td>{{ $user->product_category }}</td>
                                        @if($user->type_id == \App\Models\Type::SELLER_TYPE)
                                        <td><a class="btn btn-primary" href="{{route("send.transactions",$user->id)}}">ارسال التحويلات</a></td>
                                        @else
                                        <td><a class="btn btn-default" @disabled(true) href="#">ارسال التحويلات</a></td>
                                        @endif
                                        <td>{{ $user->address_1 . ', ' . $user->address_2 }}</td>
                                        <td>{{ $user->company_name ?? '-' }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        @role('admin')
                                        <td>

                                            <div class="btn-group">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{ route('users.show', $user->id) }}">تعديل</a>
                                                    @if($user->approved)
                                                    <a class="dropdown-item" href="{{ route('users.unConfirm', $user->id) }}">إالغاء التأكيد</a>
                                                    @else
                                                    <a class="dropdown-item" href="{{ route('users.confirm', $user->id) }}">تأكيد</a>
                                                    @endif
                                                    <a class="dropdown-item delete-this" data-userId="{{ $user->id }}">حذف</a>
                                                </div>
                                            </div>





                                            <form id="destroy-user_{{ $user->id }}"
                                                action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>

                                        </td>
                                        @endrole
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td dir="rtl" colspan="7">{{ $users->links('pagination::bootstrap-4') }} </td>
                                </tr>
                            </tfoot>

                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>


@stop


@section('page-script')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>    <!-- END: Page Vendor JS-->
    <!-- END: Page Vendor JS-->
    <script>
        $(document).ready(function() {


            $('.delete-this').on('click', function() {


                var id = ($(this).attr("data-userId"));

                Swal.fire({
                    title: "{{ __('هل أنت متأكد؟') }}",
                    text: "{{ __('لن تتمكن من إعادة البيانات مرة أخرى') }}",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "{{ __('نعم, إفعل ذلك') }}",
                    confirmButtonClass: 'btn btn-primary',
                    cancelButtonClass: 'btn btn-danger ml-1',
                    cancelButtonText: "{{ __('إلغاء') }}",
                    buttonsStyling: false,
                }).then(function(result) {
                    if (result.value) {


                        Swal.fire({
                            type: "success",
                            title: 'Deleted!',
                            text: 'Your file has been deleted.',
                            confirmButtonClass: 'btn btn-success',
                        })


                        document.getElementById('destroy-user_' + id).submit();

                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            title: "{{ __('Cancelled') }}",
                            text: "{{ __('Your data is safe :)') }}",
                            type: 'error',
                            confirmButtonClass: 'btn btn-success',
                        })
                    }
                })
            });

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
