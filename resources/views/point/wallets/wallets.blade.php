@extends('layouts.app')
@section('title' , __("Wallet"))
@push('style')
@endpush
@section('content')
    @unless(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('Merchant wallet') || auth()->user()->hasPermission('Customer wallet'))
  <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless
    @include('QVM.wallets.search.search')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('wallets_wallets') }}</h4>
                </div>
                <div class="card-content">
                    <div class="table-responsive mt-1">
                        <table class="table table-hover-animation mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('wallets_user_id') }}</th>

                                    <th>{{ __('wallets_current_balance') }}</th>
                                    <th>{{ __('wallets_pending_balance') }}</th>
                                    <th>{{ __('wallets_transferable_balance') }}</th>
                                    <th>{{ __('wallets_created_at') }}</th>
                                    <th>{{ __('wallets_updated_at') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wallets as $key => $wallet)
                                    <tr>
                                        <td>{{ $wallet->firstItem + $key + 1 }}</td>
                                        @if($wallet->user_type == 'merchant')
                                        <td>{{  (isset($users[$wallet->user_id])) ? $users[$wallet->user_id]['company_en_name'] : $wallet->user_id  }}</td>
                                        @else
                                        <td>{{  (isset($users[$wallet->user_id])) ? $users[$wallet->user_id]['subscriber_name'] : $wallet->user_id  }}</td>
                                        @endif
                                        <td>{{ $wallet->current_balance }}</td>
                                        <td>{{ $wallet->pending_balance }}</td>
                                        <td>{{ $wallet->transferable_balance }}</td>
                                        <td>{{ $wallet->created_at }}</td>
                                        <td>{{ $wallet->updated_at }}</td>
                                        <td>
                                            {{-- <a href="{{ route('wallets.show', $wallet->id) }}/transactions"
                                                class="btn btn-info mr-1 mb-1 btn-sm"><i data-feather='file-text'></i></a> --}}


                                            <a href="{{ route('wallets.show', $wallet->id) }}"
                                                class="btn btn-success mr-1 mb-1 btn-sm"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td   colspan="7">{{ $wallets->links('pagination::bootstrap-5') }}
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
