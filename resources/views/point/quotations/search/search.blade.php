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
                                    <form action="/quotations" method="GET" >
                                        <div class="row">
                            
                                           
                                           
                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-id">{{ __('quotations_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="id" type="number" value="@if(isset($_GET['id'])){{ $_GET['id'] }}@endif"  placeholder="{{ __('quotations_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-subscriber_id">{{ __('quotations_subscriber_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="subscriber_id" value="@if(isset($_GET['subscriber_id'])){{ $_GET['subscriber_id'] }}@endif"  type="text" placeholder="{{ __('quotations_subscriber_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-customer_id">{{ __('quotations_customer_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="customer_id" value="@if(isset($_GET['customer_id'])){{ $_GET['customer_id'] }}@endif"  type="text" placeholder="{{ __('quotations_customer_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-customer_address">{{ __('quotations_customer_address') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="customer_address" value="@if(isset($_GET['customer_address'])){{ $_GET['customer_address'] }}@endif"  type="text" placeholder="{{ __('quotations_customer_address') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-customer_latitude">{{ __('quotations_customer_latitude') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="customer_latitude" type="number" value="@if(isset($_GET['customer_latitude'])){{ $_GET['customer_latitude'] }}@endif"  placeholder="{{ __('quotations_customer_latitude') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-customer_longitude">{{ __('quotations_customer_longitude') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="customer_longitude" type="number" value="@if(isset($_GET['customer_longitude'])){{ $_GET['customer_longitude'] }}@endif"  placeholder="{{ __('quotations_customer_longitude') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-number_of_required_pieces">{{ __('quotations_number_of_required_pieces') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="number_of_required_pieces" type="number" value="@if(isset($_GET['number_of_required_pieces'])){{ $_GET['number_of_required_pieces'] }}@endif"  placeholder="{{ __('quotations_number_of_required_pieces') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-number_of_available_pieces">{{ __('quotations_number_of_available_pieces') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="number_of_available_pieces" type="number" value="@if(isset($_GET['number_of_available_pieces'])){{ $_GET['number_of_available_pieces'] }}@endif"  placeholder="{{ __('quotations_number_of_available_pieces') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-number_of_collection_areas">{{ __('quotations_number_of_collection_areas') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="number_of_collection_areas" type="number" value="@if(isset($_GET['number_of_collection_areas'])){{ $_GET['number_of_collection_areas'] }}@endif"  placeholder="{{ __('quotations_number_of_collection_areas') }}"  />
                                                       
                                                </fieldset>
                                            </div>



                                                                  
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-part_type_id">{{ __('quotations_part_type_id') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="part_type_id"  class="form-control" id="quotations-list-part_type_id">
                                                        <option value="all">{{ __('All') }}</option>

                                                       @foreach($part_types as $part_type)
                             <option  <?php echo (isset($_GET['part_type_id']) && $_GET['part_type_id'] == $part_type->id) ? 'selected="selected"' : '' ; ?>    value="{{ $part_type->id }}" >{{ $part_type->name }}</option>
                             @endforeach

                                                    </select>
                                                </fieldset>
                                            </div>
                                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-expected_delivery_time_min">{{ __('quotations_expected_delivery_time_min') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="expected_delivery_time_min" type="number" value="@if(isset($_GET['expected_delivery_time_min'])){{ $_GET['expected_delivery_time_min'] }}@endif"  placeholder="{{ __('quotations_expected_delivery_time_min') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-expected_delivery_time_max">{{ __('quotations_expected_delivery_time_max') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="expected_delivery_time_max" type="number" value="@if(isset($_GET['expected_delivery_time_max'])){{ $_GET['expected_delivery_time_max'] }}@endif"  placeholder="{{ __('quotations_expected_delivery_time_max') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-order_cost">{{ __('quotations_order_cost') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="order_cost" type="number" value="@if(isset($_GET['order_cost'])){{ $_GET['order_cost'] }}@endif"  placeholder="{{ __('quotations_order_cost') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-tax">{{ __('quotations_tax') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="tax" type="number" value="@if(isset($_GET['tax'])){{ $_GET['tax'] }}@endif"  placeholder="{{ __('quotations_tax') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-total_order">{{ __('quotations_total_order') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="total_order" type="number" value="@if(isset($_GET['total_order'])){{ $_GET['total_order'] }}@endif"  placeholder="{{ __('quotations_total_order') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-shipping_cost">{{ __('quotations_shipping_cost') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="shipping_cost" type="number" value="@if(isset($_GET['shipping_cost'])){{ $_GET['shipping_cost'] }}@endif"  placeholder="{{ __('quotations_shipping_cost') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-profit_ratio">{{ __('quotations_profit_ratio') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="profit_ratio" type="number" value="@if(isset($_GET['profit_ratio'])){{ $_GET['profit_ratio'] }}@endif"  placeholder="{{ __('quotations_profit_ratio') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-profit_amount">{{ __('quotations_profit_amount') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="profit_amount" type="number" value="@if(isset($_GET['profit_amount'])){{ $_GET['profit_amount'] }}@endif"  placeholder="{{ __('quotations_profit_amount') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-quotation_amount">{{ __('quotations_quotation_amount') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="quotation_amount" type="number" value="@if(isset($_GET['quotation_amount'])){{ $_GET['quotation_amount'] }}@endif"  placeholder="{{ __('quotations_quotation_amount') }}"  />
                                                       
                                                </fieldset>
                                            </div>



                                                                  
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-quotation_process_id">{{ __('quotations_quotation_process_id') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="quotation_process_id"  class="form-control" id="quotations-list-quotation_process_id">
                                                        <option value="all">{{ __('All') }}</option>

                                                       @foreach($quotation_processes as $quotation_process)
                             <option  <?php echo (isset($_GET['quotation_process_id']) && $_GET['quotation_process_id'] == $quotation_process->id) ? 'selected="selected"' : '' ; ?>    value="{{ $quotation_process->id }}" >{{ $quotation_process->name }}</option>
                             @endforeach

                                                    </select>
                                                </fieldset>
                                            </div>
                                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-created_at">{{ __('quotations_created_at') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="created_at" type="date" value="@if(isset($_GET['created_at'])){{ $_GET['created_at'] }}@endif"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="quotations-list-updated_at">{{ __('quotations_updated_at') }}</label>
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