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
                                    <form action="/transaction_comments" method="GET" >
                                        <div class="row">
                            
                                           
                                           
                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="transaction_comments-list-id">{{ __('transaction_comments_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="id" type="number" value="@if(isset($_GET['id'])){{ $_GET['id'] }}@endif"  placeholder="{{ __('transaction_comments_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>



                                                                  
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="transaction_comments-list-transaction_id">{{ __('transaction_comments_transaction_id') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="transaction_id"  class="form-control" id="transaction_comments-list-transaction_id">
                                                        <option value="all">{{ __('All') }}</option>

                                                       @foreach($transactions as $transaction)
                             <option  <?php echo (isset($_GET['transaction_id']) && $_GET['transaction_id'] == $transaction->id) ? 'selected="selected"' : '' ; ?>    value="{{ $transaction->id }}" >{{ $transaction->wallet_id }}</option>
                             @endforeach

                                                    </select>
                                                </fieldset>
                                            </div>
                                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="transaction_comments-list-user_id">{{ __('transaction_comments_user_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="user_id" type="number" value="@if(isset($_GET['user_id'])){{ $_GET['user_id'] }}@endif"  placeholder="{{ __('transaction_comments_user_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="transaction_comments-list-is_admin">{{ __('transaction_comments_is_admin') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="is_admin" class="form-control" id="transaction_comments-list-is_admin">
                                                    
                                                        <option value="all" @if(isset($_GET['is_admin']) && $_GET['is_admin'] == 'all') selected @endif >{{ __('All') }}</option>
                                                        <option value="1" @if(isset($_GET['is_admin']) && $_GET['is_admin'] == '1') selected @endif >{{ __('YES') }}</option>
                                                        <option value="0" @if(isset($_GET['is_admin']) && $_GET['is_admin'] == '0') selected @endif >{{ __('NO') }}</option>
                                                        

                                                        
                                                    </select>
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="transaction_comments-list-comment">{{ __('transaction_comments_comment') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="comment" value="@if(isset($_GET['comment'])){{ $_GET['comment'] }}@endif"  type="text" placeholder="{{ __('transaction_comments_comment') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="transaction_comments-list-created_at">{{ __('transaction_comments_created_at') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="created_at" type="date" value="@if(isset($_GET['created_at'])){{ $_GET['created_at'] }}@endif"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="transaction_comments-list-updated_at">{{ __('transaction_comments_updated_at') }}</label>
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