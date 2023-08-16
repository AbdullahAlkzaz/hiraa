<div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Filters') }}</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                                    <li><a data-action=""><i class="feather icon-rotate-cw users-data-filter"></i></a></li>
                                    <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="users-list-filter">
                                    <form action="/subscriber_payment_types" method="GET" >
                                        <div class="row">
                            
                                           
                                           
                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="subscriber_payment_types-list-id">{{ __('subscriber_payment_types_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="id" type="number" value="@if(isset($_GET['id'])){{ $_GET['id'] }}@endif"  placeholder="{{ __('subscriber_payment_types_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="subscriber_payment_types-list-seller_id">{{ __('subscriber_payment_types_seller_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="seller_id" type="number" value="@if(isset($_GET['seller_id'])){{ $_GET['seller_id'] }}@endif"  placeholder="{{ __('subscriber_payment_types_seller_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="subscriber_payment_types-list-subscriber_id">{{ __('subscriber_payment_types_subscriber_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="subscriber_id" type="number" value="@if(isset($_GET['subscriber_id'])){{ $_GET['subscriber_id'] }}@endif"  placeholder="{{ __('subscriber_payment_types_subscriber_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>



                                                                  
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="subscriber_payment_types-list-payment_type_id">{{ __('subscriber_payment_types_payment_type_id') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="payment_type_id"  class="form-control" id="subscriber_payment_types-list-payment_type_id">
                                                        <option value="all">{{ __('All') }}</option>

                                                       @foreach($payment_types as $payment_type)
                             <option  <?php echo (isset($_GET['payment_type_id']) && $_GET['payment_type_id'] == $payment_type->id) ? 'selected="selected"' : '' ; ?>    value="{{ $payment_type->id }}" >{{ $payment_type->name }}</option>
                             @endforeach

                                                    </select>
                                                </fieldset>
                                            </div>
                                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="subscriber_payment_types-list-is_active">{{ __('subscriber_payment_types_is_active') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="is_active" class="form-control" id="subscriber_payment_types-list-is_active">
                                                    
                                                        <option value="all" @if(isset($_GET['is_active']) && $_GET['is_active'] == 'all') selected @endif >{{ __('All') }}</option>
                                                        <option value="1" @if(isset($_GET['is_active']) && $_GET['is_active'] == '1') selected @endif >{{ __('YES') }}</option>
                                                        <option value="0" @if(isset($_GET['is_active']) && $_GET['is_active'] == '0') selected @endif >{{ __('NO') }}</option>
                                                        

                                                        
                                                    </select>
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="subscriber_payment_types-list-created_at">{{ __('subscriber_payment_types_created_at') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="created_at" type="date" value="@if(isset($_GET['created_at'])){{ $_GET['created_at'] }}@endif"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="subscriber_payment_types-list-updated_at">{{ __('subscriber_payment_types_updated_at') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="updated_at" type="date" value="@if(isset($_GET['updated_at'])){{ $_GET['updated_at'] }}@endif"  />
                                                       
                                                </fieldset>
                                            </div>
           


                                            <div class="col-12 ">
                                              
                                                <button type="submit" class="btn btn-info" >{{ __('Find') }}</button>
                                                
                                            </div>
           
           
            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>