@extends('layouts.app')
@section('title', __('Shipping methods'))
@section('content')
    @include('QVM.shipping_methods.search.search')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('Shipping methods') }}</h4>
{{--                    <a class="btn btn-outline-info" href="{{ route('shipping_methods.create') }}">--}}
{{--                        <i class="fa fa-plus" aria-hidden="true"></i> {{ __('Add New') }}--}}
{{--                    </a>--}}
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
                                    <th>{{ __('shipping_methods_name') }}</th>
                                    <th>{{ __('shipping_methods_en_name') }}</th>
                                    <th>{{ __('shipping_methods_code') }}</th>
                                    <th>{{ __('shipping_methods_fixed_price') }}</th>
                                    <th>{{ __('shipping_methods_is_active') }}</th>
                                    <th>{{ __('shipping_methods_created_at') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shipping_methods as $key => $shipping_method)
                                    <tr>
                                        <td>{{ $shipping_method->firstItem + $key + 1 }}</td>
                                        <td>{{ $shipping_method->name }}</td>
                                        <td>{{ $shipping_method->en_name }}</td>
                                        <td>{{ $shipping_method->code }}</td>
                                        <td>{{ $shipping_method->fixed_price }}</td>
                                        <td>{{ $shipping_method->is_active == 1 ? __('YES') : __('NO') }}</td>
                                        <td>{{ $shipping_method->created_at }}</td>
                                        <td>
                                            <a href="{{ route('shipping_methods.show', $shipping_method->id) }}"
                                                class="btn btn-success mr-1 mb-1 btn-sm"><i class="fa fa-edit"></i></a>
{{--                                            <button value="{{ $shipping_method->id }}"--}}
{{--                                                class="btn btn-danger mr-1 mb-1 btn-sm delete-this"><i--}}
{{--                                                    class="fa fa-trash"></i></button>--}}
{{--                                            <form id="destroy-shipping_method_{{ $shipping_method->id }}"--}}
{{--                                                action="{{ route('shipping_methods.destroy', $shipping_method->id) }}"--}}
{{--                                                method="POST" style="display: none;">--}}
{{--                                                @method('DELETE')--}}
{{--                                                @csrf--}}
{{--                                            </form>--}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        {{ $shipping_methods->links('pagination::bootstrap-4') }} </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@endsection
@section('page-script')
    <script src="{{ asset(mix('js/scripts/extensions/ext-component-sweet-alerts.js')) }}"></script>
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
        $(document).ready(function() {
            $('.delete-this').on('click', function() {
                var id = ($(this).val());
                Swal.fire({
                    title: "{{ __('Are you sure?') }}",
                    text: "{{ __('You wont be able to revert this!') }}",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "{{ __('Yes, delete it!') }}",
                    confirmButtonClass: 'btn btn-primary',
                    cancelButtonClass: 'btn btn-danger ml-1',
                    cancelButtonText: "{{ __('Cancel') }}",
                    buttonsStyling: false,
                }).then(function(result) {
                    if (result.value) {
                        Swal.fire({
                            type: "success",
                            title: 'Deleted!',
                            text: 'Your file has been deleted.',
                            confirmButtonClass: 'btn btn-success',
                        })
                        document.getElementById('destroy-shipping_method_' + id).submit();
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
@endsection
