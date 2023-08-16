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
                                    <form action="/basket_items" method="GET" >
                                        <div class="row">
                            
                                           
                                           
                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="basket_items-list-id">{{ __('basket_items_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="id" type="number" value="@if(isset($_GET['id'])){{ $_GET['id'] }}@endif"  placeholder="{{ __('basket_items_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>



                                                                  
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="basket_items-list-basket_id">{{ __('basket_items_basket_id') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="basket_id"  class="form-control" id="basket_items-list-basket_id">
                                                        <option value="all">{{ __('All') }}</option>

                                                       @foreach($baskets as $basket)
                             <option  <?php echo (isset($_GET['basket_id']) && $_GET['basket_id'] == $basket->id) ? 'selected="selected"' : '' ; ?>    value="{{ $basket->id }}" >{{ $basket->subscriber_id }}</option>
                             @endforeach

                                                    </select>
                                                </fieldset>
                                            </div>
                                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="basket_items-list-product_id">{{ __('basket_items_product_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="product_id" type="number" value="@if(isset($_GET['product_id'])){{ $_GET['product_id'] }}@endif"  placeholder="{{ __('basket_items_product_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="basket_items-list-price">{{ __('basket_items_price') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="price" type="number" value="@if(isset($_GET['price'])){{ $_GET['price'] }}@endif"  placeholder="{{ __('basket_items_price') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="basket_items-list-quantity">{{ __('basket_items_quantity') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="quantity" type="number" value="@if(isset($_GET['quantity'])){{ $_GET['quantity'] }}@endif"  placeholder="{{ __('basket_items_quantity') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="basket_items-list-total_price">{{ __('basket_items_total_price') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="total_price" type="number" value="@if(isset($_GET['total_price'])){{ $_GET['total_price'] }}@endif"  placeholder="{{ __('basket_items_total_price') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="basket_items-list-company_id">{{ __('basket_items_company_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="company_id" type="number" value="@if(isset($_GET['company_id'])){{ $_GET['company_id'] }}@endif"  placeholder="{{ __('basket_items_company_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="basket_items-list-created_at">{{ __('basket_items_created_at') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="created_at" type="date" value="@if(isset($_GET['created_at'])){{ $_GET['created_at'] }}@endif"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="basket_items-list-updated_at">{{ __('basket_items_updated_at') }}</label>
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