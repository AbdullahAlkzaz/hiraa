@extends('layouts.app')
@section('title', __('Default Settings'))
@section('content')
    @inject('HomeController', 'App\Http\Controllers\HomeController')
    <section class="simple-validation">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Default Settings</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form-horizontal" role="form" method="POST"
                                action="{{ route('updateDefaultSettings') }}"  >
                                {!! csrf_field() !!}

                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{ __('Default Commission') }}</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" class="form-control" name="default_commission" value="{{ $setting->default_commission ?? 0 }}"  id="default_commission">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-file-minus"></i>
                                                        </div>
                                                        @if ($errors->has('default_commission'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('default_commission') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit"
                                                class="btn btn-primary mr-1 mb-1 waves-effect waves-light " id="submit">{{ __('Submit') }}</button>
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
                        <h4 class="card-title">Whatsapp : {{$whatsapp['whatsapp_number'] ?? 0}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form-horizontal" role="form" method="POST"
                                  action="{{ route('whatsapp.store') }}"  >
                                {!! csrf_field() !!}

                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{ __('whatsapp number') }}</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" class="form-control" name="whatsapp_number" value="{{$whatsapp['whatsapp_number'] ?? ""}}"  id="default_commission">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-file-minus"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit"
                                                    class="btn btn-primary mr-1 mb-1 waves-effect waves-light " id="submit">{{ __('Submit') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tax and commercial numbers </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form-horizontal" role="form" method="POST"
                                  action="{{ route('company.data.store') }}"  >
                                {!! csrf_field() !!}

                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{ __('Tax card') }}</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" class="form-control" name="tax_card" value="{{ $companyData['tax_card'] ?? 0 }}"  id="tax_card">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-file-minus"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{ __('Commercial number') }}</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" class="form-control" name="commercial_record" value="{{ $companyData['commercial_record'] ?? 0 }}"  id="commercial_record">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-file-minus"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit"
                                                    class="btn btn-primary mr-1 mb-1 waves-effect waves-light " id="submit">{{ __('Submit') }}</button>
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

@endsection
