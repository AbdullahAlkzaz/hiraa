@extends('layouts.app')
@section('title', __('Wallet'))
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
@endsection
@section('content')
    <section class="simple-validation">
        <div class="row">

            @if (Session::has('message'))
            <div class="alert alert-info">
                <strong>Info!</strong> {!! session('message') !!}
            </div>
        @endif
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{ __('wallets_user_id') }}</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative has-icon-left">
                                                        <input readonly data-toggle="popover"
                                                            value="{{ $wallet->user_name }}" data-placement="left"
                                                            data-content="{{ __('wallets_user_id_data-content') }}"
                                                            data-trigger="hover"
                                                            data-original-title="{{ __('wallets_user_id_data-original-title') }}"
                                                            type="text"
                                                            class="form-control {{ $errors->has('user_id') ? 'is-invalid' : '' }}"
                                                            name="user_id" placeholder="{{ __('wallets_user_id') }}">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-file-minus"></i>
                                                        </div>
                                                        @if ($errors->has('user_id'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('user_id') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{ __('wallets_user_type') }}</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative has-icon-left">
                                                        <input readonly data-toggle="popover"
                                                            value="{{ $wallet->user_type }}" data-placement="left"
                                                            data-content="{{ __('wallets_user_type_data-content') }}"
                                                            data-trigger="hover"
                                                            data-original-title="{{ __('wallets_user_type_data-original-title') }}"
                                                            type="text"
                                                            class="form-control {{ $errors->has('user_type') ? 'is-invalid' : '' }}"
                                                            name="user_type" placeholder="{{ __('wallets_user_type') }}">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-file-minus"></i>
                                                        </div>
                                                        @if ($errors->has('user_type'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('user_type') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{ __('wallets_current_balance') }}</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative has-icon-left">
                                                        <input readonly data-toggle="popover"
                                                            value="{{ $wallet->current_balance }}" data-placement="left"
                                                            data-content="{{ __('wallets_current_balance_data-content') }}"
                                                            data-trigger="hover"
                                                            data-original-title="{{ __('wallets_current_balance_data-original-title') }}"
                                                            type="number"
                                                            class="form-control {{ $errors->has('current_balance') ? 'is-invalid' : '' }}"
                                                            name="current_balance"
                                                            placeholder="{{ __('wallets_current_balance') }}">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-file-minus"></i>
                                                        </div>
                                                        @if ($errors->has('current_balance'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('current_balance') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{ __('wallets_pending_balance') }}</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative has-icon-left">
                                                        <input readonly data-toggle="popover"
                                                            value="{{ $wallet->pending_balance }}" data-placement="left"
                                                            data-content="{{ __('wallets_pending_balance_data-content') }}"
                                                            data-trigger="hover"
                                                            data-original-title="{{ __('wallets_pending_balance_data-original-title') }}"
                                                            type="number"
                                                            class="form-control {{ $errors->has('pending_balance') ? 'is-invalid' : '' }}"
                                                            name="pending_balance"
                                                            placeholder="{{ __('wallets_pending_balance') }}">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-file-minus"></i>
                                                        </div>
                                                        @if ($errors->has('pending_balance'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('pending_balance') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{ __('wallets_transferable_balance') }}</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative has-icon-left">
                                                        <input readonly data-toggle="popover"
                                                            value="{{ $wallet->transferable_balance }}"
                                                            data-placement="left"
                                                            data-content="{{ __('wallets_transferable_balance_data-content') }}"
                                                            data-trigger="hover"
                                                            data-original-title="{{ __('wallets_transferable_balance_data-original-title') }}"
                                                            type="number"
                                                            class="form-control {{ $errors->has('transferable_balance') ? 'is-invalid' : '' }}"
                                                            name="transferable_balance"
                                                            placeholder="{{ __('wallets_transferable_balance') }}">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-file-minus"></i>
                                                        </div>
                                                        @if ($errors->has('transferable_balance'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('transferable_balance') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Actions</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form id="deposit_withdrawal" action="{{ route('deposit_withdrawal') }}" method="POST">
                                @csrf
                                <div class="mb-3 mt-3">
                                    <label for="amount" class="form-label">Amount:</label>
                                    <input type="number" value="0.0" class="form-control" id="amount"
                                        placeholder="0.0" name="amount">
                                    @if ($errors->has('amount'))
                                        <div class="text-danger">
                                            {{ $errors->first('amount') }}
                                        </div>
                                    @endif
                                </div>
                                <input name="operation" value="deposit" type="hidden" />
                                <input name="wallet_id" value="{{ $wallet->id }}" type="hidden" />
                                
                                @if ($errors->has('operation'))
                                    <div class="text-danger">
                                        {{ $errors->first('operation') }}
                                    </div>
                                @endif
                                <button type="button" id="deposit" onclick="deposit_withdrawal('deposit')"
                                    name="deposit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>
                                    Deposit</button>
                                <button type="button" id="withdrawal" onclick="deposit_withdrawal('withdrawal')"
                                    name="withdrawal" class="btn btn-danger"><i class="fa fa-minus"
                                        aria-hidden="true"></i> Withdrawal</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">{{ __('transactions_transactions') }}</h4>
                    </div>
                    <div class="card-content">
                     
                        <div class="table-responsive mt-1">
                            <table class="table table-hover-animation mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>

                                        <th>{{ __('transactions_description_id') }}</th>
                                        <th>{{ __('transactions_type') }}</th>
                                        <th>{{ __('transactions_amount') }}</th>
                                        <th>{{ __('transactions_balance') }}</th>
                                        <th>{{ __('transactions_status') }}</th>
                                        <th>reference</th>

                                        <th>{{ __('transactions_created_at') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $key => $transaction)
                                        <tr>
                                            <td>{{ $transaction->firstItem + $key + 1 }}</td>
                                          
                                            <td>{{ $transaction->description }}</td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ config('status_color.' . $transaction['type_key']) }}">{{ $transaction['type_key'] }}</span>
                                            </td>
                                            <td>
                                                <span class="@if($transaction->amount < 0) text-danger @endif" >
                                                    {{ $transaction->amount }}
                                                </span>
                                            </td>
                                            <td>{{ $transaction->balance }}</td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ config('status_color.' . $transaction['status_key']) }}">{{ $transaction['status_key'] }}</span>
                                            </td>
                                            <td>{{ $transaction->order_id }}</td>

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
    </section>
@endsection
@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@endsection
@section('page-script')
    <script src="{{ asset(mix('js/scripts/extensions/ext-component-sweet-alerts.js')) }}"></script>
    <script>
        function deposit_withdrawal(operation) {
            amount = $("input[name='amount']").val();
            if (operation == 'deposit') {
                var text = "A deposit of " + amount + " SAR will be made";
                $("input[name='operation']").val('deposit');
            } else {
                var text = "An amount of " + amount + " SAR will be withdrawn";
                $("input[name='operation']").val('withdrawal');
            }
            Swal.fire({
                title: "{{ __('Are you sure?') }}",
                text: text,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{ __('Yes, do it!') }}",
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger ml-1',
                cancelButtonText: "{{ __('Cancel') }}",
                buttonsStyling: false,
            }).then(function(result) {
                if (result.value) {
                    document.getElementById('deposit_withdrawal').submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: "{{ __('Cancelled') }}",
                        type: 'error',
                        confirmButtonClass: 'btn btn-success',
                    })
                }
            })
        }
    </script>
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
@endsection
