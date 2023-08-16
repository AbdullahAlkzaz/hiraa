@extends('layouts.app')
@section('title', __('Offers'))
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
@endsection
@section('content')
    @unless(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('Offers'))
  <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless
    @include('QVM.offers.search.search')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('offers_offers') }}</h4>
                </div>
                <div class="card-content">
                    <div class="table-responsive mt-1">
                        <table class="table table-hover-animation mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('offers_seller_id') }}</th>
                                    <th>{{ __('offers_offer_title') }}</th>
                                    <th>{{ __('offers_offer_expiry_date') }}</th>
                                    <th>{{ __('offers_image') }}</th>
                                    <th>{{ __('offers_offer_type_id') }}</th>
                                    <th>{{ __('offers_is_active') }}</th>
                                    <th>{{ __('offers_created_at') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offers as $key => $offer)
                                    <tr>
                                        <td>{{ $offer->firstItem + $key + 1 }}</td>
                                        <td>{{ $sellers[$offer->seller_id] }}</td>
                                        <td>{{ $offer->offer_title }}</td>
                                        <td>{{ $offer->offer_expiry_date }}</td>
                                        <td>
                                            <img src="{{ $offer->image }}" alt="offer NO.{{ $offer->seller_id }}"
                                                higth="100" width="100">
                                        </td>
                                        <td>{{ $offer->offer_type ? $offer->offer_type->en_name : '' }}</td>
                                        <td>{{ $offer->is_active == 1 ? __('YES') : __('NO') }}</td>
                                        <td>{{ $offer->created_at }}</td>
                                        <td>
                                            <a href="{{ route('offers.show', $offer->id) }}"
                                                class="btn btn-success mr-1 mb-1 btn-sm"><i class="fa fa-edit"></i></a>
                                            <button value="{{ $offer->id }}"
                                                class="btn btn-danger mr-1 mb-1 btn-sm delete-this"><i
                                                    class="fa fa-trash"></i></button>
                                            <form id="destroy-offer_{{ $offer->id }}"
                                                action="{{ route('offers.destroy', $offer->id) }}" method="POST"
                                                style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="9">{{ $offers->links('pagination::bootstrap-5') }} </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('statistics') }}</h4>
                </div>
                <div class="card-content">
                    <div class="table-responsive mt-1">
                        <table class="table table-hover-animation mb-0">
                            <thead>
                            <tr>
                                <th>{{ __('statistics name') }}</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Suppliers yearly report</td>
                                    <td>
                                        <a href="{{ route('statistics.offers.seller-yearly-report') }}"
                                           class="btn btn-success mr-1 mb-1 btn-sm"><i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>All Suppliers Monthly report</td>
                                    <td>
                                        <a href="{{ route('statistics.offers.seller-monthly-report') }}"
                                           class="btn btn-success mr-1 mb-1 btn-sm"><i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>All Suppliers report (filter)</td>
                                    <td>
                                        <a href="{{ route('statistics.offers.seller-report') }}"
                                           class="btn btn-success mr-1 mb-1 btn-sm"><i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td> Products (filter)</td>
                                    <td>
                                        <a href="{{ route('statistics.offers.supplier-product-report') }}"
                                           class="btn btn-success mr-1 mb-1 btn-sm"><i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>  Most requested products </td>
                                    <td>
                                        <a href="{{ route('statistics.offers.most-wanted-products-report') }}"
                                           class="btn btn-success mr-1 mb-1 btn-sm"><i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="9">{{ $offers->links('pagination::bootstrap-5') }} </td>
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
                        document.getElementById('destroy-offer_' + id).submit();
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
