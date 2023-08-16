@extends('layouts.app')

@section('content-header')

<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">


    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{ __('عمليات التحويل') }}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">
                            {{ __('عمليات التحويل') }}
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



    @include('point.transactions.component.wallet')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('عمليات التحويل') }}</h4>
                </div>
                <div class="card-content">
                    <div class="table-responsive mt-1">
                        <table class="table table-hover-animation mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> المبلغ</th>
                                    <th>نوع العملية</th>
                                    <th>سبب العملية</th>
                                    <th>الوصف</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $key => $transaction)
                                    <tr>
                                        <td>{{ $transaction->firstItem + $key + 1 }}</td>
                                        <td>{{ $transaction->amount }}</td>
                                        <td>{{ $transaction->type == "debit" ? "سحب" : "ايداع" }}</td>
                                        <td>{{ $transaction->operation_type }}</td>
                                        <td>{{ $transaction->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td dir="rtl" colspan="7">{{ $transactions->links('pagination::bootstrap-4') }} </td>
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
