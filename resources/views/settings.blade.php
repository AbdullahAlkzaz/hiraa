@extends('layouts.app')
@section('title', __('Settings'))
@section('content-header')
@endsection
@push('style')
@endpush
@section('content')
    @unless(auth()->user()->hasRole('admin'))
        <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    you are not Authorized to see this page
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-6 col-12">
            <a href="{{ route('cities.index') }}">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-danger p-50 m-0">
                            <div class="avatar-content">
                                <i class="text-danger font-medium-5" data-feather='map'></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1"></h2>
                        <p class="mb-2">{{ __('Cities') }}</p>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-lg-3 col-sm-6 col-12">
            <a href="{{ route('seller_commissions') }}">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-danger p-50 m-0">
                            <div class="avatar-content">

                                <i class="text-danger font-medium-5" data-feather='percent'></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1"></h2>
                        <p class="mb-2">{{ __('Seller commission') }}</p>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-lg-3 col-sm-6 col-12">
            <a href="{{ route('shipping_methods.index') }}">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-danger p-50 m-0">
                            <div class="avatar-content">

                                <i class="text-danger font-medium-5" data-feather='truck'></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1"></h2>
                        <p class="mb-2">{{ __('Shipping methods') }}</p>
                    </div>
                </div>
            </a>
        </div>


    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-6 col-12">
            <a href="{{ url('/dimensions') }}">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-danger p-50 m-0">
                            <div class="avatar-content">
                                <i class="text-danger font-medium-5" data-feather='crop'></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1"></h2>
                        <p class="mb-2">{{ __('Dimensions') }}</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <a href="{{ url('/weight') }}">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-danger p-50 m-0">
                            <div class="avatar-content">
                                <i class="text-danger font-medium-5" data-feather='plus'></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1"></h2>
                        <p class="mb-2">{{ __('weight') }}</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <a href="{{ url('/unit') }}">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-danger p-50 m-0">
                            <div class="avatar-content">
                                <i class="text-danger font-medium-5" data-feather='box'></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1"></h2>
                        <p class="mb-2">{{ __('unit') }}</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-6 col-12">
            <a href="{{ url('/main-category') }}">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-danger p-50 m-0">
                            <div class="avatar-content">
                                <i class="text-danger font-medium-5" data-feather='book'></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1"></h2>
                        <p class="mb-2">{{ __('Main Category') }}</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <a href="{{ url('/sub-category') }}">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-danger p-50 m-0">
                            <div class="avatar-content">
                                <i class="text-danger font-medium-5" data-feather='bookmark'></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1"></h2>
                        <p class="mb-2">{{ __('Sub Category') }}</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-sm-6 col-12">
            <a href="{{ url('/default-settings') }}">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-danger p-50 m-0">
                            <div class="avatar-content">
                                <i class="text-danger font-medium-5" data-feather='percent'></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1"></h2>
                        <p class="mb-2">{{ __('Default Settings') }}</p>
                    </div>
                </div>
            </a>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-6 col-12">
            <a href="{{ url('/delivery-charge') }}">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-danger p-50 m-0">
                            <div class="avatar-content">
                                <i class="text-danger font-medium-5" data-feather='percent'></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1"></h2>
                        <p class="mb-2">{{ __('Delivery Charge') }}</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <a href="{{ url('/pickup-charge') }}">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-danger p-50 m-0">
                            <div class="avatar-content">
                                <i class="text-danger font-medium-5" data-feather='percent'></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1"></h2>
                        <p class="mb-2">{{ __('pickup charge') }}</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <a href="{{ url('/reasons-crud') }}">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-danger p-50 m-0">
                            <div class="avatar-content">
                                <i class="text-danger font-medium-5" data-feather='percent'></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1"></h2>
                        <p class="mb-2">{{ __('return reasons') }}</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-6 col-12">
            <a href="{{ url('/all/users') }}">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-danger p-50 m-0">
                            <div class="avatar-content">
                                <i class="text-danger font-medium-5" data-feather='percent'></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1"></h2>
                        <p class="mb-2">{{ __('Manage User') }}</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <a href="{{ url('/roles') }}">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-danger p-50 m-0">
                            <div class="avatar-content">
                                <i class="text-danger font-medium-5" data-feather='percent'></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1"></h2>
                        <p class="mb-2">{{ __('Roles') }}</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <a href="{{ url('/seller-bank-account') }}">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-danger p-50 m-0">
                            <div class="avatar-content">
                                <i class="text-danger font-medium-5" data-feather='percent'></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1"></h2>
                        <p class="mb-2">{{ __('Sellers Bank Accounts') }}</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

@stop
@push('scripts')
@endpush
