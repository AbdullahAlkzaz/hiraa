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
                                    <form action="/purchase_order_invoices" method="GET" >
                                        <div class="row">
                            
                                           
                                           
                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_invoices-list-id">{{ __('purchase_order_invoices_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="id" type="number" value="@if(isset($_GET['id'])){{ $_GET['id'] }}@endif"  placeholder="{{ __('purchase_order_invoices_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_invoices-list-invoice_number">{{ __('purchase_order_invoices_invoice_number') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="invoice_number" value="@if(isset($_GET['invoice_number'])){{ $_GET['invoice_number'] }}@endif"  type="text" placeholder="{{ __('purchase_order_invoices_invoice_number') }}"  />
                                                       
                                                </fieldset>
                                            </div>



                                                                  
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_invoices-list-purchase_order_id">{{ __('purchase_order_invoices_purchase_order_id') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="purchase_order_id"  class="form-control" id="purchase_order_invoices-list-purchase_order_id">
                                                        <option value="all">{{ __('All') }}</option>

                                                       @foreach($purchase_orders as $purchase_order)
                             <option  <?php echo (isset($_GET['purchase_order_id']) && $_GET['purchase_order_id'] == $purchase_order->id) ? 'selected="selected"' : '' ; ?>    value="{{ $purchase_order->id }}" >{{ $purchase_order->order_id }}</option>
                             @endforeach

                                                    </select>
                                                </fieldset>
                                            </div>
                                            


                                                                  
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_invoices-list-payment_status_id">{{ __('purchase_order_invoices_payment_status_id') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="payment_status_id"  class="form-control" id="purchase_order_invoices-list-payment_status_id">
                                                        <option value="all">{{ __('All') }}</option>

                                                       @foreach($payment_statuses as $payment_status)
                             <option  <?php echo (isset($_GET['payment_status_id']) && $_GET['payment_status_id'] == $payment_status->id) ? 'selected="selected"' : '' ; ?>    value="{{ $payment_status->id }}" >{{ $payment_status->name }}</option>
                             @endforeach

                                                    </select>
                                                </fieldset>
                                            </div>
                                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_invoices-list-invoice_type">{{ __('purchase_order_invoices_invoice_type') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="invoice_type" value="@if(isset($_GET['invoice_type'])){{ $_GET['invoice_type'] }}@endif"  type="text" placeholder="{{ __('purchase_order_invoices_invoice_type') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_invoices-list-price">{{ __('purchase_order_invoices_price') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="price" type="number" value="@if(isset($_GET['price'])){{ $_GET['price'] }}@endif"  placeholder="{{ __('purchase_order_invoices_price') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_invoices-list-shipping_price">{{ __('purchase_order_invoices_shipping_price') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="shipping_price" type="number" value="@if(isset($_GET['shipping_price'])){{ $_GET['shipping_price'] }}@endif"  placeholder="{{ __('purchase_order_invoices_shipping_price') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_invoices-list-tax">{{ __('purchase_order_invoices_tax') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="tax" type="number" value="@if(isset($_GET['tax'])){{ $_GET['tax'] }}@endif"  placeholder="{{ __('purchase_order_invoices_tax') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_invoices-list-total_price">{{ __('purchase_order_invoices_total_price') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="total_price" type="number" value="@if(isset($_GET['total_price'])){{ $_GET['total_price'] }}@endif"  placeholder="{{ __('purchase_order_invoices_total_price') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_invoices-list-notes">{{ __('purchase_order_invoices_notes') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="notes" value="@if(isset($_GET['notes'])){{ $_GET['notes'] }}@endif"  type="text" placeholder="{{ __('purchase_order_invoices_notes') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_invoices-list-created_at">{{ __('purchase_order_invoices_created_at') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="created_at" type="date" value="@if(isset($_GET['created_at'])){{ $_GET['created_at'] }}@endif"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="purchase_order_invoices-list-updated_at">{{ __('purchase_order_invoices_updated_at') }}</label>
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