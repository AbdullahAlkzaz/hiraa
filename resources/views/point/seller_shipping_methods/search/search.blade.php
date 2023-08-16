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
                                    <form action="/seller_shipping_methods" method="GET" >
                                        <div class="row">
                            
                                           
                                           
                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="seller_shipping_methods-list-id">{{ __('seller_shipping_methods_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="id" type="number" value="@if(isset($_GET['id'])){{ $_GET['id'] }}@endif"  placeholder="{{ __('seller_shipping_methods_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="seller_shipping_methods-list-seller_id">{{ __('seller_shipping_methods_seller_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="seller_id" type="number" value="@if(isset($_GET['seller_id'])){{ $_GET['seller_id'] }}@endif"  placeholder="{{ __('seller_shipping_methods_seller_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>



                                                                  
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="seller_shipping_methods-list-shipping_method_id">{{ __('seller_shipping_methods_shipping_method_id') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="shipping_method_id"  class="form-control" id="seller_shipping_methods-list-shipping_method_id">
                                                        <option value="all">{{ __('All') }}</option>

                                                       @foreach($shipping_methods as $shipping_method)
                             <option  <?php echo (isset($_GET['shipping_method_id']) && $_GET['shipping_method_id'] == $shipping_method->id) ? 'selected="selected"' : '' ; ?>    value="{{ $shipping_method->id }}" >{{ $shipping_method->name }}</option>
                             @endforeach

                                                    </select>
                                                </fieldset>
                                            </div>
                                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="seller_shipping_methods-list-is_active">{{ __('seller_shipping_methods_is_active') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="is_active" class="form-control" id="seller_shipping_methods-list-is_active">
                                                    
                                                        <option value="all" @if(isset($_GET['is_active']) && $_GET['is_active'] == 'all') selected @endif >{{ __('All') }}</option>
                                                        <option value="1" @if(isset($_GET['is_active']) && $_GET['is_active'] == '1') selected @endif >{{ __('YES') }}</option>
                                                        <option value="0" @if(isset($_GET['is_active']) && $_GET['is_active'] == '0') selected @endif >{{ __('NO') }}</option>
                                                        

                                                        
                                                    </select>
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="seller_shipping_methods-list-created_at">{{ __('seller_shipping_methods_created_at') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="created_at" type="date" value="@if(isset($_GET['created_at'])){{ $_GET['created_at'] }}@endif"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="seller_shipping_methods-list-updated_at">{{ __('seller_shipping_methods_updated_at') }}</label>
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