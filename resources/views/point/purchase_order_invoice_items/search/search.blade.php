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
                                    <form action="/purchase_order_invoice_items" method="GET" >
                                        <div class="row">
                            
                                           
                                           
                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_invoice_items-list-id">{{ __('purchase_order_invoice_items_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="id" type="number" value="@if(isset($_GET['id'])){{ $_GET['id'] }}@endif"  placeholder="{{ __('purchase_order_invoice_items_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>



                                                                  
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_invoice_items-list-purchase_order_invoice_id">{{ __('purchase_order_invoice_items_purchase_order_invoice_id') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="purchase_order_invoice_id"  class="form-control" id="purchase_order_invoice_items-list-purchase_order_invoice_id">
                                                        <option value="all">{{ __('All') }}</option>

                                                       @foreach($purchase_order_invoices as $purchase_order_invoice)
                             <option  <?php echo (isset($_GET['purchase_order_invoice_id']) && $_GET['purchase_order_invoice_id'] == $purchase_order_invoice->id) ? 'selected="selected"' : '' ; ?>    value="{{ $purchase_order_invoice->id }}" >{{ $purchase_order_invoice->invoice_number }}</option>
                             @endforeach

                                                    </select>
                                                </fieldset>
                                            </div>
                                            


                                                                  
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_invoice_items-list-purchase_order_item_id">{{ __('purchase_order_invoice_items_purchase_order_item_id') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="purchase_order_item_id"  class="form-control" id="purchase_order_invoice_items-list-purchase_order_item_id">
                                                        <option value="all">{{ __('All') }}</option>

                                                       @foreach($purchase_order_items as $purchase_order_item)
                             <option  <?php echo (isset($_GET['purchase_order_item_id']) && $_GET['purchase_order_item_id'] == $purchase_order_item->id) ? 'selected="selected"' : '' ; ?>    value="{{ $purchase_order_item->id }}" >{{ $purchase_order_item->branch_id }}</option>
                             @endforeach

                                                    </select>
                                                </fieldset>
                                            </div>
                                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_invoice_items-list-price">{{ __('purchase_order_invoice_items_price') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="price" type="number" value="@if(isset($_GET['price'])){{ $_GET['price'] }}@endif"  placeholder="{{ __('purchase_order_invoice_items_price') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_invoice_items-list-quantity">{{ __('purchase_order_invoice_items_quantity') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="quantity" type="number" value="@if(isset($_GET['quantity'])){{ $_GET['quantity'] }}@endif"  placeholder="{{ __('purchase_order_invoice_items_quantity') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_invoice_items-list-total_price">{{ __('purchase_order_invoice_items_total_price') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="total_price" type="number" value="@if(isset($_GET['total_price'])){{ $_GET['total_price'] }}@endif"  placeholder="{{ __('purchase_order_invoice_items_total_price') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_invoice_items-list-product_is_damaged">{{ __('purchase_order_invoice_items_product_is_damaged') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="product_is_damaged" class="form-control" id="purchase_order_invoice_items-list-product_is_damaged">
                                                    
                                                        <option value="all" @if(isset($_GET['product_is_damaged']) && $_GET['product_is_damaged'] == 'all') selected @endif >{{ __('All') }}</option>
                                                        <option value="1" @if(isset($_GET['product_is_damaged']) && $_GET['product_is_damaged'] == '1') selected @endif >{{ __('YES') }}</option>
                                                        <option value="0" @if(isset($_GET['product_is_damaged']) && $_GET['product_is_damaged'] == '0') selected @endif >{{ __('NO') }}</option>
                                                        

                                                        
                                                    </select>
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_invoice_items-list-created_at">{{ __('purchase_order_invoice_items_created_at') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="created_at" type="date" value="@if(isset($_GET['created_at'])){{ $_GET['created_at'] }}@endif"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_invoice_items-list-updated_at">{{ __('purchase_order_invoice_items_updated_at') }}</label>
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