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
                                    <form action="/description_translations" method="GET" >
                                        <div class="row">
                            
                                           
                                           
                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="description_translations-list-id">{{ __('description_translations_id') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="id" type="number" value="@if(isset($_GET['id'])){{ $_GET['id'] }}@endif"  placeholder="{{ __('description_translations_id') }}"  />
                                                       
                                                </fieldset>
                                            </div>



                                                                  
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="description_translations-list-description_id">{{ __('description_translations_description_id') }}</label>
                                                <fieldset class="form-group">
                                                    <select  name="description_id"  class="form-control" id="description_translations-list-description_id">
                                                        <option value="all">{{ __('All') }}</option>

                                                       @foreach($descriptions as $description)
                             <option  <?php echo (isset($_GET['description_id']) && $_GET['description_id'] == $description->id) ? 'selected="selected"' : '' ; ?>    value="{{ $description->id }}" >{{ $description->key }}</option>
                             @endforeach

                                                    </select>
                                                </fieldset>
                                            </div>
                                                                                      
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="description_translations-list-locale">{{ __('description_translations_locale') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="locale" value="@if(isset($_GET['locale'])){{ $_GET['locale'] }}@endif"  type="text" placeholder="{{ __('description_translations_locale') }}"  />
                                                       
                                                </fieldset>
                                            </div>
                                          
                                          <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="description_translations-list-description">{{ __('description_translations_description') }}</label>
                                                <fieldset class="form-group">
                                                    <input class="form-control" name="description" value="@if(isset($_GET['description'])){{ $_GET['description'] }}@endif"  type="text" placeholder="{{ __('description_translations_description') }}"  />
                                                       
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