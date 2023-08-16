@extends('layouts.app')
@section('title', __('Seller commissions'))
@section('content')
    @unless(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('Orders') || auth()->user()->hasPermission('Online orders')))
  <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless
    @inject('HomeController', 'App\Http\Controllers\HomeController')
    <section class="simple-validation">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Online Ordering</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="form-group row">
                                    <div class="col-md-1">
                                        <span>{{ __('Token') }}</span>
                                    </div>
                                    <div class="col-md-11">
                                        <div class="position-relative has-icon-left">
                                            <textarea  data-toggle="popover" data-placement="left" id="token"
                                                       data-trigger="hover"  data-original-title="{{ __('Token') }}"
                                                       class="form-control {{ $errors->has('token') ? 'is-invalid' : '' }}"
                                                       name="token" placeholder="{{ __('Token') }}" ></textarea>
                                            <div class="form-control-position">
                                                <i class="feather icon-file-text"></i>
                                            </div>

                                            @if ($errors->has('token'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('token') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <span>{{ __('Latitude') }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" class="form-control" name="latitude" value=""  id="latitude" placeholder="{{ __('Latitude') }}">
                                            <div class="form-control-position">
                                                <i class="feather icon-file-minus"></i>
                                            </div>
                                            @if ($errors->has('latitude'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('latitude') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <span>{{ __('Longitude') }}</span>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" class="form-control" name="longitude" value=""  id="longitude" placeholder="{{ __('Longitude') }}">
                                            <div class="form-control-position">
                                                <i class="feather icon-file-minus"></i>
                                            </div>
                                            @if ($errors->has('longitude'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('longitude') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Search Products') }}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" class="form-control" name="search" value=""  id="search" placeholder="{{ __('Search') }}">
                                            <div class="form-control-position">
                                                <i class="feather icon-file-minus"></i>
                                            </div>
                                            @if ($errors->has('search'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('search') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-9 ">
                                        <button type="button" class="btn btn-primary mr-1 mb-1 waves-effect waves-light " id="search_button">
                                            {{ __('Search') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <span>{{ __('Customer Address') }}</span>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="position-relative has-icon-left">
                                            <textarea  data-toggle="popover" data-placement="left" id="customer_address"
                                                       data-trigger="hover"  data-original-title="{{ __('Customer Address') }}"
                                                       class="form-control {{ $errors->has('customer_address') ? 'is-invalid' : '' }}"
                                                       name="customer_address" placeholder="{{ __('Customer Address') }}" >{{ old('customer_address') }}</textarea>
                                            <div class="form-control-position">
                                                <i class="feather icon-file-text"></i>
                                            </div>

                                            @if ($errors->has('customer_address'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('customer_address') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <span>{{ __('Customer Id') }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" class="form-control" name="customer_id" value=""  id="customer_id" placeholder="{{ __('Customer Id') }}">
                                            <div class="form-control-position">
                                                <i class="feather icon-file-minus"></i>
                                            </div>
                                            @if ($errors->has('customer_id'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('customer_id') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <span>{{ __('Shipping Cost') }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                            <input type="number" class="form-control" name="shipping_cost" value=""  id="shipping_cost" placeholder="{{ __('Shipping Cost') }}">
                                            <div class="form-control-position">
                                                <i class="feather icon-file-minus"></i>
                                            </div>
                                            @if ($errors->has('shipping_cost'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('shipping_cost') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Products') }}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="form-group row">
                                    <div class="col-md-12">

                                        <div class="table-responsive mt-1">
                                            <table class="table table-hover-animation mb-0">
                                                <thead>
                                                <tr>
                                                    <th>{{ __('Product Name') }}</th>
                                                    <th>{{ __('Product Number') }}</th>
                                                    <th>{{ __('Price') }}</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody id="products-table-body">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Order Items') }}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="table-responsive mt-1">
                                            <table class="table table-hover-animation mb-0">
                                                <thead>
                                                <tr>
                                                    <th>{{ __('Product Name') }}</th>
                                                    <th>{{ __('Product Number') }}</th>
                                                    <th>{{ __('Selling Price') }}</th>
                                                    <th>{{ __('Quantity') }}</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody id="order-items-table-body">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Actions') }}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary mr-1 mb-1 waves-effect waves-light " id="create_quotation">
                                            {{ __('Create Quotation') }}
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary mr-1 mb-1 waves-effect waves-light " id="create_order">
                                            {{ __('Create Order') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('added-scripts')
        <script src="{{asset('vendors/js/extensions/sweetalert2.all.min.js')}}"></script>

        <script type="text/javascript">
            function errorAlert(title, text){
                Swal.fire({
                    icon: 'error',
                    title: title,
                    text: text,
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                })
            }

            function successAlert(title, text){
                Swal.fire({
                    icon: 'success',
                    title: title,
                    text: text,
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                })
            }

            let products
            let orderProducts = []
            let oldSearchText

            $('#search_button').on('click', function (){
                const searchText = $('#search').val()
                const token = $('#token').val()
                const latitude = $('#latitude').val()
                const longitude = $('#longitude').val()

                if(oldSearchText === searchText){
                    return;
                }

                oldSearchText = searchText

                if(!token){
                    errorAlert('Missing Data','Please Enter Your user token')
                    return
                }

                if(!latitude){
                    errorAlert('Missing Data','Please Enter latitude')
                    return
                }

                if(!longitude){
                    errorAlert('Missing Data','Please Enter longitude')
                    return
                }

                if(!searchText){
                    errorAlert('Missing Data','Please Enter Search Text')
                    return
                }

                const settings = {
                    "url": '{{ config('app.qvm_order') }}' + "api/v1/external/products/search",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        "Authorization": "Bearer " + token
                    },
                    "data": JSON.stringify({
                        "search_key": searchText,
                        "offset": 0,
                        "max": 10,
                        "longitude": longitude,
                        "latitude": latitude,
                    }),
                };

                $('#search_button').attr('disabled', true);
                $('#products-table-body').html("")

                Swal.showLoading()
                $.ajax(settings)
                    .done(function (response) {
                        $('#search_button').attr('disabled', false);
                        products = response.data;
                        let rows

                        products.forEach(function (product) {
                            rows += `
                                <tr>
                                    <td>${product.nameAr}</td>
                                    <td>${product.productNumber}</td>
                                    <td>${product.averageCost}</td>
                                    <td>
                                        <a href="#" class="btn btn-success mr-1 mb-1 btn-sm waves-effect waves-float waves-light"
                                            data-productid=${product.productId}
                                        >
                                            <i class="fa fa-plus-circle"></i>
                                        </a>
                                    </td>
                                </tr>
                            `
                        })

                        $('#products-table-body').append(rows)

                        Swal.fire({
                            title: 'Search Completed',
                            icon: 'success',
                            timer: 1000,
                            showConfirmButton: false
                        })
                    })
                    .catch(function (err) {
                        $('#search_button').attr('disabled', false);
                        errorAlert("Error Happened While Searching Products", err.responseJSON.message)
                    })
            })

            $('#products-table-body').on('click', 'a', function (){
                const productId = $(this).data('productid')
                let product

                let alreadyExist = orderProducts.find(function (product) {
                    return product.product_id == productId
                })

                if(alreadyExist){
                    let quantity = $(`#product-quantity-${productId}`);
                    let existingQuantity = Number.parseInt(quantity.val())
                    quantity.val(existingQuantity + 1);

                    return
                }


                product = products.find(function (product){
                    return product.productId == productId
                })

                orderProducts.push({
                    branch_id: product.branchId,
                    product_id:product.productId,
                    selling_price: product.averageCost,
                    quantity: 1,
                    nameAr: product.nameAr,
                });

                $('#order-items-table-body').append(`
                    <tr id="order-item-${product.productId}">
                        <td>${product.nameAr}</td>
                        <td>${product.productNumber}</td>
                        <td>
                            <input type="number" class="form-control width-60-per"
                                name="price" value="${product.averageCost}"
                                id="product-price-${productId}" placeholder=""
                            >
                        </td>
                        <td>
                            <input type="number" step="1"
                                onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                class="form-control width-600-per" name="quantity" value="1" id="product-quantity-${productId}" placeholder="Quantity"
                                min="1"
                            >
                        </td>

                        <td>
                            <a href="#" class="btn btn-danger mr-1 mb-1 btn-sm waves-effect waves-float waves-light"
                                data-productid=${product.productId}
                             >
                                <i class="fa fa-times"></i>
                            </a>
                        </td>
                    </tr>
                `)
            })

            $('#order-items-table-body').on('click', 'a', function (){
                const productId = Number.parseInt($(this).data('productid'))
                $(`#order-item-${productId}`).remove()

                orderProducts = orderProducts.filter(function (p) {
                    return p.product_id !== productId
                })
            })

            $('#create_quotation').on('click', function (){
                let quotation_products = []
                let error
                let message
                for(let i = 0; i < orderProducts.length ; i++){
                    let product = orderProducts[i]

                    let quantity = Number.parseInt($(`#product-quantity-${product.product_id}`).val())
                    let price = Number.parseFloat($(`#product-price-${product.product_id}`).val())

                    if(quantity === 0 || quantity === undefined || isNaN(quantity)){
                        error = true
                        message = "Product " + product.nameAr + " Quantity should be > 0"
                        break
                    }

                    if(price === 0 || price === undefined || isNaN(price)){
                        error = true
                        message = "Product " + product.nameAr + " Price should be > 0"
                        break
                    }
                }

                if(error){
                   errorAlert("Invalid Data", message)
                   return
                }


                for(let i = 0; i < orderProducts.length ; i++){
                    let product = orderProducts[i]

                    let quantity = Number.parseInt($(`#product-quantity-${product.product_id}`).val())
                    let price = Number.parseFloat($(`#product-price-${product.product_id}`).val())

                    quotation_products.push({
                        branch_id: product.branch_id,
                        product_id:product.product_id,
                        selling_price: price,
                        quantity: quantity,
                    })
                }

                if(quotation_products.length < 1){
                    errorAlert("Missing Data", "Can't add quotation without any product, Please Add products first")
                    return;
                }

                const token = $('#token').val()
                const latitude = $('#latitude').val()
                const longitude = $('#longitude').val()
                const customer_address = $('#customer_address').val()
                const customer_id = $('#customer_id').val()
                const shipping_cost = $('#shipping_cost').val()

                if(!token){
                    errorAlert('Missing Data','Please Enter Your user token')
                    return
                }

                if(!latitude){
                    errorAlert('Missing Data','Please Enter latitude')
                    return
                }

                if(!longitude){
                    errorAlert('Missing Data','Please Enter longitude')
                    return
                }

                if(!customer_address){
                    errorAlert('Missing Data','Please Enter Customer Address')
                    return
                }

                if(!customer_id){
                    errorAlert('Missing Data','Please Enter Customer ID')
                    return
                }

                if(!shipping_cost){
                    errorAlert('Missing Data','Please Enter Shipping Cost')
                    return
                }

                $('#create_quotation').attr('disabled', true)

                var settings = {
                    "url": '{{ config('app.qvm_order') }}' + "api/v1/external/quotations",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        "Authorization": "Bearer " + token
                    },
                    "data": JSON.stringify({
                        "customer_id": customer_id,
                        "shipping_cost": shipping_cost,
                        "part_type_id": 1,
                        "customer_address": customer_address,
                        "customer_longitude": longitude,
                        "customer_latitude": latitude,
                        "items": quotation_products
                    }),
                };

                Swal.showLoading()
                $.ajax(settings)
                    .done(function (response) {
                        $('#create_quotation').attr('disabled', false)

                        Swal.fire({
                            title: 'Quotation Created',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        })
                    })
                    .catch(function (err) {
                        $('#create_quotation').attr('disabled', false);
                        errorAlert("Error Happened While Creating Quotation", err.responseJSON.message)
                    })
            })

            $('#create_order').on('click', function (){
                let quotation_products = []
                let error
                let message
                for(let i = 0; i < orderProducts.length ; i++){
                    let product = orderProducts[i]

                    let quantity = Number.parseInt($(`#product-quantity-${product.product_id}`).val())
                    let price = Number.parseFloat($(`#product-price-${product.product_id}`).val())

                    if(quantity === 0 || quantity === undefined || isNaN(quantity)){
                        error = true
                        message = "Product " + product.nameAr + " Quantity should be > 0"
                        break
                    }

                    if(price === 0 || price === undefined || isNaN(price)){
                        error = true
                        message = "Product " + product.nameAr + " Price should be > 0"
                        break
                    }
                }

                if(error){
                    errorAlert("Invalid Data", message)
                    return
                }


                for(let i = 0; i < orderProducts.length ; i++){
                    let product = orderProducts[i]

                    let quantity = Number.parseInt($(`#product-quantity-${product.product_id}`).val())
                    let price = Number.parseFloat($(`#product-price-${product.product_id}`).val())

                    quotation_products.push({
                        branch_id: product.branch_id,
                        product_id:product.product_id,
                        selling_price: price,
                        quantity: quantity,
                    })
                }

                if(quotation_products.length < 1){
                    errorAlert("Missing Data", "Can't add quotation without any product, Please Add products first")
                    return;
                }

                const token = $('#token').val()
                const latitude = $('#latitude').val()
                const longitude = $('#longitude').val()
                const customer_address = $('#customer_address').val()
                const customer_id = $('#customer_id').val()
                const shipping_cost = $('#shipping_cost').val()

                if(!token){
                    errorAlert('Missing Data','Please Enter Your user token')
                    return
                }

                if(!latitude){
                    errorAlert('Missing Data','Please Enter latitude')
                    return
                }

                if(!longitude){
                    errorAlert('Missing Data','Please Enter longitude')
                    return
                }

                if(!customer_address){
                    errorAlert('Missing Data','Please Enter Customer Address')
                    return
                }

                if(!customer_id){
                    errorAlert('Missing Data','Please Enter Customer ID')
                    return
                }

                if(!shipping_cost){
                    errorAlert('Missing Data','Please Enter Shipping Cost')
                    return
                }

                var settings = {
                    "url": '{{ config('app.qvm_order') }}' + "api/v1/external/quotations",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        "Authorization": "Bearer " + token
                    },
                    "data": JSON.stringify({
                        "customer_id": customer_id,
                        "shipping_cost": shipping_cost,
                        "part_type_id": 1,
                        "customer_address": customer_address,
                        "customer_longitude": longitude,
                        "customer_latitude": latitude,
                        "items": quotation_products
                    }),
                };

                $('#create_order').attr('disabled', true)
                Swal.showLoading()
                let quotation_id
                $.ajax(settings)
                    .done(function (response) {
                        quotation_id = response.data.id
                    })
                    .then(function (){

                        settings = {
                            "url":  '{{ config('app.qvm_order') }}' +  "api/v1/external/quotations/" +quotation_id +"/send_out",
                            "method": "POST",
                            "timeout": 0,
                            "headers": {
                                "Accept": "application/json",
                                "Authorization": "Bearer " + token
                            },
                        };

                        return $.ajax(settings)
                            .done(function (response) {
                                $('#create_order').attr('disabled', false)
                                Swal.fire({
                                    title: 'Order Created',
                                    icon: 'success',
                                    timer: 2000,
                                    showConfirmButton: false
                                })
                            })
                            // .catch(function (err){
                            //     $('#create_order').attr('disabled', false);
                            //     errorAlert("Error Happened While Creating Order", err.responseJSON.message)
                            // })

                    })
                    .catch(function (err) {
                        $('#create_order').attr('disabled', false);
                        errorAlert("Error Happened While Creating Order", err.responseJSON.message)
                    })



            })
        </script>
@endsection
