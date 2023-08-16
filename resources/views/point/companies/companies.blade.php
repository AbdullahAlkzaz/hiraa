@extends('layouts.app')

@section('content-header')

<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">


    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{ __('الشركات') }}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">
                            {{ __('الشركات') }}
                        </li>

                    </ol>
                </div>
            </div>
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
                    <h4 class="mb-0">{{ __('الشركات') }}</h4>
                    @role('admin')
                    <a href="{{ route("companies.create") }}" class="btn btn-primary">انشاء شركة</a>
                    @endrole
                </div>
                <div class="card-content">
                    <div class="table-responsive mt-1">
                        <table class="table table-hover-animation mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم الشركة</th>
                                    <th>البريد الالكتروني</th>
                                    <th>الهاتف</th>
                                    <th>اسم المدير</th>
                                    <th>هاتف المدير</th>
                                    <th>بريد المدير</th>
                                    <th class="city">المحافظة</th>
                                    <th class="city">المدينة</th>
                                    <th class="city">المنطقة</th>
                                    <th>العنوان</th>
                                    <th> وقت التسجيل </th>
                                    @role('admin')
                                    <th>{{ __('Action') }}</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $key => $company)
                                    @if(!$company->hasRole('admin'))
                                    <tr>
                                        <td>{{ $company->firstItem + $key + 1 }}</td>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td> {{ $company->phone }} </td>
                                        <td> {{ $company?->company_details?->manager_name ?? "-" }} </td>
                                        <td> {{ $company?->company_details?->manager_phone ?? "-" }} </td>
                                        <td> {{ $company?->company_details?->manager_email ?? "-"}} </td>
                                        </td>
                                        <td class="city">{{ $company->government }}</td>
                                        <td>{{ $company->city }}</td>
                                        <td>{{ $company->area }}</td>
                                        <td>{{ $company->address_1 . ', ' . $company->address_2 }}</td>
                                        <td>{{ $company->created_at }}</td>
                                        @role('admin')
                                        <td>

                                            <div class="btn-group">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{ route('companies.show', $company->id) }}">تعديل</a>
                                                    <a class="dropdown-item delete-this" data-userId="{{ $company->id }}">حذف</a>
                                                </div>
                                            </div>





                                            <form id="destroy-user_{{ $company->id }}"
                                                action="{{ route('companies.destroy', $company->id) }}" method="POST"
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
                                    <td dir="rtl" colspan="7">{{ $companies->links('pagination::bootstrap-4') }} </td>
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
