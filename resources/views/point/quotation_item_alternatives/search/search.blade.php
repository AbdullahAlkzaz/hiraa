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
                                    <form action="/quotation_item_alternatives" method="GET" >
                                        <div class="row">
                            
                                           
                                           
                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotation_item_alternatives-list-id">{{ __('quotation_item_alternatives_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="id" type="number" value="@if(isset($_GET['id'])){{ $_GET['id'] }}@endif"  placeholder="{{ __('quotation_item_alternatives_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>



                                                                  
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotation_item_alternatives-list-quotation_item_id">{{ __('quotation_item_alternatives_quotation_item_id') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="quotation_item_id"  class="form-control" id="quotation_item_alternatives-list-quotation_item_id">
                                                        <option value="all">{{ __('All') }}</option>

                                                       @foreach($quotation_items as $quotation_item)
                             <option  <?php echo (isset($_GET['quotation_item_id']) && $_GET['quotation_item_id'] == $quotation_item->id) ? 'selected="selected"' : '' ; ?>    value="{{ $quotation_item->id }}" >{{ $quotation_item->quotation_id }}</option>
                             @endforeach

                                                    </select>
                                                </fieldset>
                                            </div>
                                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotation_item_alternatives-list-product_id">{{ __('quotation_item_alternatives_product_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="product_id" type="number" value="@if(isset($_GET['product_id'])){{ $_GET['product_id'] }}@endif"  placeholder="{{ __('quotation_item_alternatives_product_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotation_item_alternatives-list-price">{{ __('quotation_item_alternatives_price') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="price" type="number" value="@if(isset($_GET['price'])){{ $_GET['price'] }}@endif"  placeholder="{{ __('quotation_item_alternatives_price') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotation_item_alternatives-list-quantity">{{ __('quotation_item_alternatives_quantity') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="quantity" type="number" value="@if(isset($_GET['quantity'])){{ $_GET['quantity'] }}@endif"  placeholder="{{ __('quotation_item_alternatives_quantity') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotation_item_alternatives-list-shipping_price">{{ __('quotation_item_alternatives_shipping_price') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="shipping_price" type="number" value="@if(isset($_GET['shipping_price'])){{ $_GET['shipping_price'] }}@endif"  placeholder="{{ __('quotation_item_alternatives_shipping_price') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotation_item_alternatives-list-branch_id">{{ __('quotation_item_alternatives_branch_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="branch_id" type="number" value="@if(isset($_GET['branch_id'])){{ $_GET['branch_id'] }}@endif"  placeholder="{{ __('quotation_item_alternatives_branch_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>



                                                                  
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotation_item_alternatives-list-part_type_id">{{ __('quotation_item_alternatives_part_type_id') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="part_type_id"  class="form-control" id="quotation_item_alternatives-list-part_type_id">
                                                        <option value="all">{{ __('All') }}</option>

                                                       @foreach($part_types as $part_type)
                             <option  <?php echo (isset($_GET['part_type_id']) && $_GET['part_type_id'] == $part_type->id) ? 'selected="selected"' : '' ; ?>    value="{{ $part_type->id }}" >{{ $part_type->name }}</option>
                             @endforeach

                                                    </select>
                                                </fieldset>
                                            </div>
                                            


                                                                  
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotation_item_alternatives-list-payment_type_id">{{ __('quotation_item_alternatives_payment_type_id') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="payment_type_id"  class="form-control" id="quotation_item_alternatives-list-payment_type_id">
                                                        <option value="all">{{ __('All') }}</option>

                                                       @foreach($payment_types as $payment_type)
                             <option  <?php echo (isset($_GET['payment_type_id']) && $_GET['payment_type_id'] == $payment_type->id) ? 'selected="selected"' : '' ; ?>    value="{{ $payment_type->id }}" >{{ $payment_type->name }}</option>
                             @endforeach

                                                    </select>
                                                </fieldset>
                                            </div>
                                            


                                                                  
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotation_item_alternatives-list-order_items_availability_id">{{ __('quotation_item_alternatives_order_items_availability_id') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="order_items_availability_id"  class="form-control" id="quotation_item_alternatives-list-order_items_availability_id">
                                                        <option value="all">{{ __('All') }}</option>

                                                       @foreach($order_items_availabilities as $order_items_availability)
                             <option  <?php echo (isset($_GET['order_items_availability_id']) && $_GET['order_items_availability_id'] == $order_items_availability->id) ? 'selected="selected"' : '' ; ?>    value="{{ $order_items_availability->id }}" >{{ $order_items_availability->name }}</option>
                             @endforeach

                                                    </select>
                                                </fieldset>
                                            </div>
                                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotation_item_alternatives-list-is_selected">{{ __('quotation_item_alternatives_is_selected') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="is_selected" class="form-control" id="quotation_item_alternatives-list-is_selected">
                                                    
                                                        <option value="all" @if(isset($_GET['is_selected']) && $_GET['is_selected'] == 'all') selected @endif >{{ __('All') }}</option>
                                                        <option value="1" @if(isset($_GET['is_selected']) && $_GET['is_selected'] == '1') selected @endif >{{ __('YES') }}</option>
                                                        <option value="0" @if(isset($_GET['is_selected']) && $_GET['is_selected'] == '0') selected @endif >{{ __('NO') }}</option>
                                                        

                                                        
                                                    </select>
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotation_item_alternatives-list-created_at">{{ __('quotation_item_alternatives_created_at') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="created_at" type="date" value="@if(isset($_GET['created_at'])){{ $_GET['created_at'] }}@endif"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotation_item_alternatives-list-updated_at">{{ __('quotation_item_alternatives_updated_at') }}</label>
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