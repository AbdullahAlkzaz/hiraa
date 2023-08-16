@extends('layouts.app')

@section('content-header')



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

            <a title="{{ __('Add new') }}" class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" href="{{ route('users.create') }}"  >
                <i class="feather icon-plus"></i></a>


        </div>
    </div>

@endsection




@push('style')


@endpush


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('users_users') }}</h4>
                    <a href="{{ url('/add-user') }}" class="btn btn-success">+</a>
                </div>
                <div class="card-content">
                @if (Session::has('message'))

                    <!--div class="alert alert-primary alert-dismissible fade show" role="alert">
                                            <p class="mb-0">
                                                {!! session('message') !!}
                        </p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div-->

                    @endif

                    <div class="table-responsive mt-1">
                        <table class="table table-hover-animation mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th  >{{ __('users_name') }}</th>
                                <th  >{{ __('users_email') }}</th>
                                <th  >{{ __('suspended') }}</th>
                                <th  >{{ __('role') }}</th>
                                <th  >{{ __('users_created_at') }}</th>
                                <th  >{{ __('users_updated_at') }}</th> <th >{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $user->firstItem + $key + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->suspended == 1 ? "Yes" : "No" }}</td>
                                    <td>
                                    @foreach($user->roles as $role)
                                        {{$role->name ." - "}}
                                    @endforeach
                                    </td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>         <td>

                                        {{-- <a href="{{ route('users.show', $user->id) }}"
                                           class="btn btn-success mr-1 mb-1 btn-sm"><i
                                                class="fa fa-edit"></i></a> --}}


                                        <button value="{{  $user->id }}" class="btn btn-danger mr-1 mb-1 btn-sm delete-this"  title="suspend" ><i class="fa fa-stop"></i></button>


                                        <form id="destroy-user_{{  $user->id }}"
                                              action="{{ route('user.suspend', $user->id) }}" method="GET"
                                              style="display: none;">

                                        </form>

                                        <a href="{{ route('user.allow', $user->id) }}" class="btn btn-success btn-sm" title="allow"><i class="fa fa-check"></i></a>
                                        <a href="{{ route('user.edit.role', $user->id) }}" class="btn btn-info btn-sm" title="edit roles"><i class="fa fa-user-edit"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr><td   dir="rtl"  colspan="7"  >{{$users->links("pagination::bootstrap-4")}} </td></tr>

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
    <script>

        $(document).ready(function () {




            $('.delete-this').on('click', function () {


                var id = ($(this).val());


                Swal.fire({
                    title: "{{ __('Are you sure?') }}",
                    text: "{{ __('You wont be able to revert this!') }}",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "{{ __('Yes, suspend it!') }}",
                    confirmButtonClass: 'btn btn-primary',
                    cancelButtonClass: 'btn btn-danger ml-1',
                    cancelButtonText:  "{{ __('Cancel') }}",
                    buttonsStyling: false,
                }).then(function (result) {
                    if (result.value) {


                        Swal.fire({
                            type: "success",
                            title: 'Deleted!',
                            text: 'Account has been suspended.',
                            confirmButtonClass: 'btn btn-success',
                        })


                        document.getElementById('destroy-user_'+id).submit();

                    }
                    else if (result.dismiss === Swal.DismissReason.cancel) {
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
