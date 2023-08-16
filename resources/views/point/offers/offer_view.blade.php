@extends('layouts.app')
@section('title', __('Offers'))
@section('content')
    @unless(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('Offers'))
  <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless
    <section class="simple-validation">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Offer</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form-horizontal" role="form" method="POST"
                                action="{{ route('offers.update', $offer->id) }}" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                {{ method_field('PUT') }}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{ __('offers_seller_id') }}</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative has-icon-left">
                                                        <input readonly data-toggle="popover"
                                                            value="{{ $offer->seller_id }}" data-placement="left"
                                                            data-content="{{ __('offers_seller_id_data-content') }}"
                                                            data-trigger="hover"
                                                            data-original-title="{{ __('offers_seller_id_data-original-title') }}"
                                                            type="text"
                                                            class="form-control {{ $errors->has('seller_id') ? 'is-invalid' : '' }}"
                                                            name="seller_id" placeholder="{{ __('offers_seller_id') }}">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-file-minus"></i>
                                                        </div>
                                                        @if ($errors->has('seller_id'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('seller_id') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{ __('offers_offer_title') }}</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative has-icon-left">
                                                        <input data-toggle="popover" value="{{ $offer->offer_title }}"
                                                            data-placement="left"
                                                            data-content="{{ __('offers_offer_title_data-content') }}"
                                                            data-trigger="hover"
                                                            data-original-title="{{ __('offers_offer_title_data-original-title') }}"
                                                            type="text"
                                                            class="form-control {{ $errors->has('offer_title') ? 'is-invalid' : '' }}"
                                                            name="offer_title"
                                                            placeholder="{{ __('offers_offer_title') }}">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-file-minus"></i>
                                                        </div>
                                                        @if ($errors->has('offer_title'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('offer_title') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{ __('offers_offer_expiry_date') }}</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative has-icon-left">
                                                        <?php
                                                        $date = date_create($offer->offer_expiry_date);
                                                        $offer_expiry_date = date_format($date, 'Y-m-d');
                                                        ?>
                                                        <input data-toggle="popover" value="{{ $offer_expiry_date }}"
                                                            data-placement="left"
                                                            data-content="{{ __('offers_offer_expiry_date_data-content') }}"
                                                            data-trigger="hover"
                                                            data-original-title="{{ __('offers_offer_expiry_date_data-original-title') }}"
                                                            type="date"
                                                            class="form-control {{ $errors->has('offer_expiry_date') ? 'is-invalid' : '' }}"
                                                            name="offer_expiry_date"
                                                            placeholder="{{ __('offers_offer_expiry_date') }}">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-file-minus"></i>
                                                        </div>
                                                        @if ($errors->has('offer_expiry_date'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('offer_expiry_date') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{ __('offers_image') }}</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <img src="{{ asset($offer->image) }}" alt="image"
                                                            style="height:200px; width:100%"
                                                            class="img-fluid rounded-sm mb-2" />
                                                    </div>
                                                    <div class="position-relative has-icon-left">
                                                        <input data-toggle="popover" value="{{ old('image') }}"
                                                            data-placement="left"
                                                            data-content="{{ __('offers_image_data-content') }}"
                                                            data-trigger="hover"
                                                            data-original-title="{{ __('offers_image_data-original-title') }}"
                                                            type="file"
                                                            class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                                            name="image" placeholder="{{ __('offers_image') }}">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-image"></i>
                                                        </div>
                                                        @if ($errors->has('image'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('image') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{ __('offers_minimum_order_quantity') }}</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative has-icon-left">
                                                        <input data-toggle="popover"
                                                            value="{{ $offer->minimum_order_quantity }}"
                                                            data-placement="left"
                                                            data-content="{{ __('offers_minimum_order_quantity_data-content') }}"
                                                            data-trigger="hover"
                                                            data-original-title="{{ __('offers_minimum_order_quantity_data-original-title') }}"
                                                            type="number"
                                                            class="form-control {{ $errors->has('minimum_order_quantity') ? 'is-invalid' : '' }}"
                                                            name="minimum_order_quantity"
                                                            placeholder="{{ __('offers_minimum_order_quantity') }}">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-file-minus"></i>
                                                        </div>
                                                        @if ($errors->has('minimum_order_quantity'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('minimum_order_quantity') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{ __('offers_minimum_order_amount') }}</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative has-icon-left">
                                                        <input data-toggle="popover"
                                                            value="{{ $offer->minimum_order_amount }}"
                                                            data-placement="left"
                                                            data-content="{{ __('offers_minimum_order_amount_data-content') }}"
                                                            data-trigger="hover"
                                                            data-original-title="{{ __('offers_minimum_order_amount_data-original-title') }}"
                                                            type="number"
                                                            class="form-control {{ $errors->has('minimum_order_amount') ? 'is-invalid' : '' }}"
                                                            name="minimum_order_amount"
                                                            placeholder="{{ __('offers_minimum_order_amount') }}">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-file-minus"></i>
                                                        </div>
                                                        @if ($errors->has('minimum_order_amount'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('minimum_order_amount') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>@lang('offers_offer_specifications')</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative has-icon-left">
                                                        <textarea data-toggle="popover" data-placement="left"
                                                            data-content="{{ __('offers_offer_specifications_data-content') }}" data-trigger="hover"
                                                            data-original-title="{{ __('offers_offer_specifications_data-original-title') }}"
                                                            class="form-control {{ $errors->has('offer_specifications') ? 'is-invalid' : '' }}" name="offer_specifications"
                                                            placeholder="@lang('offers_offer_specifications')">{{ $offer->offer_specifications }}</textarea>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-file-text"></i>
                                                        </div>
                                                        @if ($errors->has('offer_specifications'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('offer_specifications') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{ __('offers_offer_type_id') }}</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative has-icon-left">
                                                        <select data-toggle="popover" data-placement="left"
                                                            data-content="{{ __('offers_offer_type_id_data-content') }}"
                                                            data-trigger="hover"
                                                            data-original-title="{{ __('offers_offer_type_id_data-original-title') }}"
                                                            class="form-control  {{ $errors->has('offer_type_id') ? 'is-invalid' : '' }} "
                                                            name="offer_type_id">
                                                            @foreach ($offer_types as $offer_type)
                                                                <option <?php echo $offer->offer_type_id == $offer_type->id ? 'selected="selected"' : ''; ?> value="{{ $offer_type->id }}">
                                                                    {{ $offer_type->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-file-minus"></i>
                                                        </div>
                                                        @if ($errors->has('offer_type_id'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('offer_type_id') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{ __('offers_is_active') }}</span>
                                                </div>
                                                <div class="col-md-8 mb-2 mt-2">
                                                    <div class="form-check form-switch">
                                                        <input value="1" name="is_active"
                                                            @if ($offer->is_active == '1') checked @endif
                                                            type="checkbox" class="form-check-input" id="is_active" />
                                                        <label class="form-check-label"
                                                            for="is_active">{{ __('Yes') }}</label>
                                                    </div>
                                                    @if ($errors->has('is_active'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('is_active') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit"
                                                class="btn btn-primary mr-1 mb-1 waves-effect waves-light ">{{ __('Submit') }}</button>
                                            <button type="reset"
                                                class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">{{ __('Reset') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Offer items</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    {{-- SELECT `id`, `offer_id`, `company_id`, `branch_id`, `product_id`, `offer_price`, `offer_quantity`, `minimum_order_quantity`, `maximum_order_quantity`, `created_at`, `updated_at` FROM `offer_details` WHERE 1 --}}
                                    <tr>
                                        <td>Product</td>
                                        <td>Quantity</td>
                                        <td>Min Quantity</td>
                                        <td>Max Quantity</td>
                                    </tr>
                                    @forelse ($offer_details as $offer_detail)
                                        <tr>
                                            <td>
                                                {{ $offer_detail->product ? $offer_detail->product['name'] : $offer_detail->product_id }}
                                            </td>
                                            <td>
                                                {{ $offer_detail->offer_quantity }}
                                            </td>
                                            <td>
                                                {{ $offer_detail->minimum_order_quantity }}
                                            </td>
                                            <td>
                                                {{ $offer_detail->maximum_order_quantity }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">
                                                No items
                                            </td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
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
