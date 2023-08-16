@extends('layouts.app')
@section('title', __('Customer Transactions'))
@push('style')
@endpush
@section('content')
    @include('QVM.transactions.search.search')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('Customer Transactions') }}</h4>
                </div>
                <div class="card-content">
                    @if (Session::has('message'))
                        <div class="alert alert-info">
                            <strong>Info!</strong> {!! session('message') !!}
                        </div>
                    @endif
                    <div class="table-responsive mt-1">
                        <table class="table table-hover-animation mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th colspan="2">{{ __('transactions_user_id') }}</th>
                                    <th>reference</th>
                                    <th>{{ __('transactions_description_id') }}</th>
                                    <th>{{ __('transactions_type') }}</th>
                                    <th>{{ __('transactions_amount') }}</th>
                                    <th>{{ __('transactions_balance') }}</th>
                                    <th>{{ __('transactions_status') }}</th>
                                    <th>{{ __('transactions_created_at') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $key => $transaction)
                                    <tr>
                                        <td>{{ $transaction->firstItem + $key + 1 }}</td>
                                        <td colspan="2">{{ $transaction->user_name }}
                                            <br>
                                            <a href="/wallets/{{ $transaction->wallet_id }}">#WALLET
                                                {{ $transaction->wallet_id }}</a>
                                        </td>
                                        <td>{{ $transaction->order_id }}</td>
                                        <td>{{ $transaction->description }}</td>
                                        <td>
                                            <span
                                                class="badge bg-{{ config('status_color.' . $transaction['type_key']) }}">{{ $transaction['type_key'] }}</span>
                                        </td>
                                        <td>{{ $transaction->amount }}</td>
                                        <td>{{ $transaction->balance }}</td>
                                        <td>
                                            <span
                                                class="badge bg-{{ config('status_color.' . $transaction['status_key']) }}">{{ $transaction['status_key'] }}</span>
                                        </td>
                                        <td>{{ $transaction->created_at }}</td>
                                        <td>
                                            <a href="{{ route('transactions.show', $transaction->id) }}"
                                                class="btn btn-success mr-1 mb-1 btn-sm"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="10">{{ $transactions->links('pagination::bootstrap-5') }}
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
@push('scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <!-- END: Page Vendor JS-->
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
                        document.getElementById('destroy-transaction_' + id).submit();
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
@endpush
