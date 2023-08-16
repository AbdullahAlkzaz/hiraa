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
                                    <form action="/purchase_order_items" method="GET" >
                                        <div class="row">
                            
                                           
                                           
                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_items-list-id">{{ __('purchase_order_items_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="id" type="number" value="@if(isset($_GET['id'])){{ $_GET['id'] }}@endif"  placeholder="{{ __('purchase_order_items_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_items-list-branch_id">{{ __('purchase_order_items_branch_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="branch_id" type="number" value="@if(isset($_GET['branch_id'])){{ $_GET['branch_id'] }}@endif"  placeholder="{{ __('purchase_order_items_branch_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>



                                                                  
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_items-list-purchase_order_id">{{ __('purchase_order_items_purchase_order_id') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="purchase_order_id"  class="form-control" id="purchase_order_items-list-purchase_order_id">
                                                        <option value="all">{{ __('All') }}</option>

                                                       @foreach($purchase_orders as $purchase_order)
                             <option  <?php echo (isset($_GET['purchase_order_id']) && $_GET['purchase_order_id'] == $purchase_order->id) ? 'selected="selected"' : '' ; ?>    value="{{ $purchase_order->id }}" >{{ $purchase_order->order_id }}</option>
                             @endforeach

                                                    </select>
                                                </fieldset>
                                            </div>
                                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_items-list-product_id">{{ __('purchase_order_items_product_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="product_id" type="number" value="@if(isset($_GET['product_id'])){{ $_GET['product_id'] }}@endif"  placeholder="{{ __('purchase_order_items_product_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_items-list-purchase_order_max_quantity">{{ __('purchase_order_items_purchase_order_max_quantity') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="purchase_order_max_quantity" type="number" value="@if(isset($_GET['purchase_order_max_quantity'])){{ $_GET['purchase_order_max_quantity'] }}@endif"  placeholder="{{ __('purchase_order_items_purchase_order_max_quantity') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_items-list-purchase_order_min_quantity">{{ __('purchase_order_items_purchase_order_min_quantity') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="purchase_order_min_quantity" type="number" value="@if(isset($_GET['purchase_order_min_quantity'])){{ $_GET['purchase_order_min_quantity'] }}@endif"  placeholder="{{ __('purchase_order_items_purchase_order_min_quantity') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_items-list-price">{{ __('purchase_order_items_price') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="price" type="number" value="@if(isset($_GET['price'])){{ $_GET['price'] }}@endif"  placeholder="{{ __('purchase_order_items_price') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_items-list-offer_detail_id">{{ __('purchase_order_items_offer_detail_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="offer_detail_id" type="number" value="@if(isset($_GET['offer_detail_id'])){{ $_GET['offer_detail_id'] }}@endif"  placeholder="{{ __('purchase_order_items_offer_detail_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_items-list-quantity">{{ __('purchase_order_items_quantity') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="quantity" type="number" value="@if(isset($_GET['quantity'])){{ $_GET['quantity'] }}@endif"  placeholder="{{ __('purchase_order_items_quantity') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_items-list-total_price">{{ __('purchase_order_items_total_price') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="total_price" type="number" value="@if(isset($_GET['total_price'])){{ $_GET['total_price'] }}@endif"  placeholder="{{ __('purchase_order_items_total_price') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_items-list-created_at">{{ __('purchase_order_items_created_at') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="created_at" type="date" value="@if(isset($_GET['created_at'])){{ $_GET['created_at'] }}@endif"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_items-list-updated_at">{{ __('purchase_order_items_updated_at') }}</label>
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