<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ __('فلتر') }}</h4>
    </div>
    @php $currenturl = url()->current(); @endphp
    
    <div class="card-content collapse show">
        <div class="card-body">
            <div class="users-list-filter">
                <form action="{{ $currenturl }}" method="GET">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="users-list-name">{{ __('اسم الراسل') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="sender_name"
                                    value="{{ (isset($_GET['sender_name'])) ? $_GET['sender_name'] : "" }}" type="text"
                                    placeholder="{{ __('اسم الراسل') }}" />

                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="users-list-name">{{ __('هاتف الراسل') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="sender_phone"
                                    value="{{ (isset($_GET['sender_phone'])) ? $_GET['sender_phone'] : "" }}" type="text"
                                    placeholder="{{ __('هاتف الراسل') }}" />

                            </fieldset>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="users-list-email">{{ __('اسم المستلم') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="recevier_name"
                                    value="{{ (isset($_GET['recevier_name'])) ? $_GET['recevier_name'] : "" }}" type="text"
                                    placeholder="{{ __('اسم المستلم') }}" />

                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="users-list-email">{{ __('هاتف المستلم') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="recevier_phone"
                                    value="{{ (isset($_GET['recevier_phone'])) ? $_GET['recevier_phone'] : "" }}" type="text"
                                    placeholder="{{ __('هاتف المستلم') }}" />

                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="users-list-email">{{ __('رقم الشحنة') }}</label>
                            <fieldset class="form-group">
                                <input class="form-control" name="id"
                                    value="{{ (isset($_GET['id'])) ? $_GET['id'] : "" }}" type="text"
                                    placeholder="{{ __('رقم الشحنة') }}" />

                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="users-list-email">{{ __('حالة الشحنة') }}</label>
                            <fieldset class="form-group">
                                <div class="input-group input-group-merge ">
                                    <select class="form-control text-center"name="status">
                                        <option value="" class="fs-4 text-center">
                                                <span>كل الشحنات</span>
                                        </option>
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status }}"
                                                @selected((isset($_GET['status'])) && $_GET['status'] == $status) class="fs-4 text-center">
                                                <span>{{ $status }}</span>
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </fieldset>
                        </div>
                        
                        <div class="col-12 ">
                            <br>
                            <button type="submit" class="btn btn-info">{{ __('Find') }}</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
