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
                                    <form action="/offer_details" method="GET" >
                                        <div class="row">
                            
                                           
                                           
                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="offer_details-list-id">{{ __('offer_details_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="id" type="number" value="@if(isset($_GET['id'])){{ $_GET['id'] }}@endif"  placeholder="{{ __('offer_details_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>



                                                                  
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="offer_details-list-offer_id">{{ __('offer_details_offer_id') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="offer_id"  class="form-control" id="offer_details-list-offer_id">
                                                        <option value="all">{{ __('All') }}</option>

                                                       @foreach($offers as $offer)
                             <option  <?php echo (isset($_GET['offer_id']) && $_GET['offer_id'] == $offer->id) ? 'selected="selected"' : '' ; ?>    value="{{ $offer->id }}" >{{ $offer->seller_id }}</option>
                             @endforeach

                                                    </select>
                                                </fieldset>
                                            </div>
                                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="offer_details-list-company_id">{{ __('offer_details_company_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="company_id" type="number" value="@if(isset($_GET['company_id'])){{ $_GET['company_id'] }}@endif"  placeholder="{{ __('offer_details_company_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="offer_details-list-branch_id">{{ __('offer_details_branch_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="branch_id" type="number" value="@if(isset($_GET['branch_id'])){{ $_GET['branch_id'] }}@endif"  placeholder="{{ __('offer_details_branch_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="offer_details-list-product_id">{{ __('offer_details_product_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="product_id" type="number" value="@if(isset($_GET['product_id'])){{ $_GET['product_id'] }}@endif"  placeholder="{{ __('offer_details_product_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="offer_details-list-offer_price">{{ __('offer_details_offer_price') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="offer_price" type="number" value="@if(isset($_GET['offer_price'])){{ $_GET['offer_price'] }}@endif"  placeholder="{{ __('offer_details_offer_price') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="offer_details-list-offer_quantity">{{ __('offer_details_offer_quantity') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="offer_quantity" type="number" value="@if(isset($_GET['offer_quantity'])){{ $_GET['offer_quantity'] }}@endif"  placeholder="{{ __('offer_details_offer_quantity') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="offer_details-list-minimum_order_quantity">{{ __('offer_details_minimum_order_quantity') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="minimum_order_quantity" type="number" value="@if(isset($_GET['minimum_order_quantity'])){{ $_GET['minimum_order_quantity'] }}@endif"  placeholder="{{ __('offer_details_minimum_order_quantity') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="offer_details-list-maximum_order_quantity">{{ __('offer_details_maximum_order_quantity') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="maximum_order_quantity" type="number" value="@if(isset($_GET['maximum_order_quantity'])){{ $_GET['maximum_order_quantity'] }}@endif"  placeholder="{{ __('offer_details_maximum_order_quantity') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="offer_details-list-created_at">{{ __('offer_details_created_at') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="created_at" type="date" value="@if(isset($_GET['created_at'])){{ $_GET['created_at'] }}@endif"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="offer_details-list-updated_at">{{ __('offer_details_updated_at') }}</label>
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