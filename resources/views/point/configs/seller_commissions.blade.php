@extends('layouts.app')
@section('title', __('Seller commissions'))
@section('content')
    @inject('HomeController', 'App\Http\Controllers\HomeController')
    <section class="simple-validation">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Seller commissions</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form-horizontal" role="form" method="POST"
                                action="{{ route('seller_commissions') }}"  >
                                {!! csrf_field() !!}

                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{ __('Companies') }}</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative has-icon-left">
                                                        <select class="form-select" aria-label="companies" name="company_id" id="company_id">
                                                            <option disabled selected>Please Select Seller</option>
                                                            @foreach ($companies as $company)
                                                                <?php  $company_data = $HomeController->company_by_id($company->company_id); ?>
                                                            <option value="{{$company->company_id}}">{{$company_data['company_en_name']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{ __('Percentage') }}</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" class="form-control" name="seller_percentage" value=""  id="seller_percentage">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-file-minus"></i>
                                                        </div>
                                                        @if ($errors->has('seller_percentage'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('seller_percentage') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit"
                                                class="btn btn-primary mr-1 mb-1 waves-effect waves-light " id="submit" disabled>{{ __('Submit') }}</button>
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
        </div>
    </section>
@stop
@section('added-scripts')
    <script type="text/javascript">
        $('#company_id').on('change', function() {
            const companyId = $(this).val()
            const url = "{{URL::to('/')}}" +  "/config/seller_commission/" + companyId;

            $('#submit').attr('disabled', true);

            $.ajax({
                type: 'get',
                url: url,
                dataType: 'json',
                success: function (data) {
                    $('#seller_percentage').val(data.data.commission)
                    $('#submit').attr('disabled', false);
                },
                error: function (err){
                    console.log(err);
                }
            });
        })
    </script>
        <!-- BEGIN: Page Vendor JS-->
{{--    <script src="/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>--}}
    <!-- END: Page Vendor JS-->
{{--    @if (Session::has('message'))--}}
{{--        <script>--}}
{{--            Swal.fire({--}}
{{--                position: 'top-end',--}}
{{--                type: 'success',--}}
{{--                html: '{!! session('message') !!}',--}}
{{--                showConfirmButton: false,--}}
{{--                timer: 3000,--}}
{{--                confirmButtonClass: 'btn btn-primary',--}}
{{--                buttonsStyling: false,--}}
{{--            })--}}
{{--        </script>--}}
{{--    @endif--}}
@endsection
