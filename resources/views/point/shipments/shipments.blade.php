@extends('layouts.app')

@section('content-header')

    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">


    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{ __('الشحنات') }}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">
                            {{ __('المكاتب') }}
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



    @include('point.shipments.search.search')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('الشحنات') }}</h4>
                    @if (auth()->user()->hasRole('admin') || auth()->user()->type_id != \App\Models\Type::REPRESENTATIVE_TYPE)
                        <a href="{{ route('shipments.create') }}" class="btn btn-primary">انشاء شحنة</a>
                    @endif
                </div>
                <div class="card-content">
                    <div class="table-responsive mt-1">
                        <table class="table table-hover-animation mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم الراسل</th>
                                    <th>هاتف الراسل</th>
                                    <th>عنوان الراسل</th>
                                    <th>اسم المستلم</th>
                                    <th>هاتف المستلم</th>
                                    <th>عنوان المستلم</th>
                                    <th>وصف الشحنة</th>
                                    @if (auth()->user()->hasRole('admin') || auth()->user()->type_id == \App\Models\Type::REPRESENTATIVE_TYPE)
                                        <th>حالة الشحنة</th>
                                        <th>سبب الحالة</th>
                                        <th>تاريخ الحالة</th>
                                        <th>نوع الشحن</th>
                                    @endif
                                    @if (auth()->user()->hasRole('admin') || auth()->user()->type_id != \App\Models\Type::REPRESENTATIVE_TYPE)
                                        <th>{{ __('Action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shipments as $key => $shipment)
                                    <tr>
                                        <td>{{ $shipment->id }}</td>
                                        <td>{{ $shipment->sender_name }}</td>
                                        <td>{{ $shipment->sender_phone }}</td>
                                        <td> {{ $shipment->sender_address . ', ' . $shipment->sender_government . ', ' . $shipment->sender_area }}
                                        </td>
                                        <td>{{ $shipment->receiver_name }}</td>
                                        <td>{{ $shipment->receiver_phone }}</td>
                                        <td> {{ $shipment->receiver_address . ', ' . $shipment->receiver_government . ', ' . $shipment->receiver_area }}
                                        </td>
                                        <td> {{ $shipment->product_description }}</td>
                                        {{-- <td> {{ $shipment->status }}</td> --}}
                                        @if (auth()->user()->hasRole('admin') || auth()->user()->type_id == \App\Models\Type::REPRESENTATIVE_TYPE)
                                            <td>
                                                <div class="input-group input-group-merge ">
                                                    <select class="form-control text-center status-select"
                                                        data-shipment_id="{{ $shipment->id }}" name="sender_government"
                                                        style="width: 140px;">
                                                        @foreach ($statuses as $status)
                                                            <option value="{{ $status }}"
                                                                @selected($shipment->status == $status) class="fs-4 text-center">
                                                                <span>{{ $status }}</span>
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td> {{ $shipment->status_reason }}</td>
                                            <td>
                                                <div><span
                                                        style="display:block !important; width: 140px;">{{ $shipment->status_date }}</span>
                                                </div>
                                            </td>
                                        @endif
                                        <td> {{ $shipment->is_receive == 1 ? 'إستلام' : 'تسليم' }}
                                        </td>
                                        @if (auth()->user()->hasRole('admin') || auth()->user()->type_id != \App\Models\Type::REPRESENTATIVE_TYPE)
                                            <td>

                                                <div class="btn-group">
                                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item"
                                                            href="{{ route('shipments.show', $shipment->id) }}">تعديل</a>
                                                        <a class="dropdown-item delete-this"
                                                            data-userId="{{ $shipment->id }}">حذف</a>
                                                    </div>
                                                </div>
                                                <form id="destroy-user_{{ $shipment->id }}"
                                                    action="{{ route('shipments.destroy', $shipment->id) }}" method="POST"
                                                    style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>

                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td dir="rtl" colspan="7">{{ $shipments->links('pagination::bootstrap-4') }}
                                    </td>
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
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script> <!-- END: Page Vendor JS-->
    <!-- END: Page Vendor JS-->
    <script>
        $(".status-select").change(function() {
            var status = $(this).val();

            var shipmentId = $(this).attr("data-shipment_id");
            var url = 'shipments/change/shipment/status';
            url = "{{ url('') }}" + "/" + url
            Swal.fire({
                title: "{{ __('هل أنت متأكد') }}",
                text: "{{ __('ستقوم بتغيير الحالة للشحنة!') }}",
                type: 'warning',
                input: 'textarea',
                inputPlaceholder: "لو كان هناك سببا اكتبة من فضلك",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{ __('نعم متأكد!') }}",
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger ml-1',
                cancelButtonText: "{{ __('إلغاء') }}",
                buttonsStyling: false,
            }).then(function(result) {
                if (result.value || result.value == "") {
                    $.ajax({
                        type: 'post',
                        url: url,
                        data: {
                            shipment_id: shipmentId,
                            status: status,
                            reason: result.value,
                            _token: "{{ csrf_token() }}",
                        },
                        dataType: 'html',
                        success: function(data) {
                            if (data == 0) {
                                Swal.fire({
                                    icon: 'error',
                                    type: "fail",
                                    title: 'لا يمكن تغيير هذه الحالة الآن',
                                    text: 'عذرا لا يمكنك تغيير الحالة الان',
                                    confirmButtonClass: 'btn btn-success',
                                });
                                return 0;
                            } else {
                                Swal.fire({
                                    type: "success",
                                    title: 'تم تعديل الحالة!',
                                    text: 'تم تعديل الحالة كما تريد',
                                    confirmButtonClass: 'btn btn-success',
                                })
                                location.reload();
                            }
                        },
                        error: function(err) {
                            console.log(err);
                            Swal.fire({
                                icon: 'error',
                                title: 'لا يمكن تغيير هذه الحالة الآن',
                                text: JSON.parse(err.responseText).message,
                                customClass: {
                                    confirmButton: 'btn btn-success'
                                }
                            })
                        }
                    });


                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: "{{ __('تم الإلغاء') }}",
                        text: "{{ __('لن يتم تعديل الحالة') }}",
                        type: 'error',
                        confirmButtonClass: 'btn btn-success',
                    })
                }
            })

        });
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
