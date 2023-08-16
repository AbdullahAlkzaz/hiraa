<div class="card-content">
    <div class="table-responsive mt-1">
        <table class="table table-hover-animation mb-2" id="alternatives-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('Number') }}</th>
                    <th>{{ __('name') }}</th>
                    <th>{{ __('Brand') }}</th>
                    <th>{{ __('Type') }}</th>
                    <th>{{ __('Sales Price') }}</th>
                    <th>{{ __('Seller') }}</th>
                    <th>{{ __('Quantity') }}</th>
                    <th>{{ __('Selected Quantity') }}</th>
                    <th>{{ __('action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    @php
                        $product_id = $product['productId'];
                        $company = $companies[$product['companyId']];
                    @endphp
                    <tr>
                        <td>{{ $product['productId'] ?? '-' }} </td>
                        <td>{{ $product['productNumber'] ?? '-' }} </td>
                        <td>{{ isset($product['name']) && $product['name'] != '' ? $product['name'] : $product['nameAr'] ?? '-' }}
                        </td>
                        <td>{{ $product['brandName'] ?? '-' }} </td>
                        <td>{{ $product['brandClassName'] ?? '-' }} </td>
                        <td>{{ $product['averageCost'] ?? '-' }} </td>
                        <td> <button class="btn btn-primary" onclick="getSellerData({{ json_encode($company) }})">
                                {{ isset($company) && $company['company_en_name'] != '' ? $company['company_en_name'] : $company['company_name'] ?? '-' }}
                            </button> </td>
                        <td>{{ $product['quantity'] ?? '-' }} </td>
                        <td> <input type="number" min="1" value="1" max="{{ $required_quantity }}"
                                id="alternative-{{ $product['productId'] }}" class="form-control"> </td>
                        <td> <button id="select-{{ $product_id }}"
                                onclick='selectAltenative("{{ $product_id }}", "{{ $purchase_order_id }}", "{{ $item_id }}", {{ json_encode($product) }})'><i
                                    class="fa fa-thumbs-up"></i></button> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- some hidden data --}}
<input type="hidden" value="{{$purchase_order_id}}" id="purchase-order-id">
<input type="hidden" value="{{$item_id}}" id="item-id">
<!-- Modal to show Seller Data  -->
<div class="modal fade" id="sellerData" tabindex="-1" aria-labelledby="sellerDataTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-5 mx-50 pb-5">
                <h1 class="text-center mb-1" id="sellerDataTitle">Seller Data</h1>
                <p class="text-center">Showing Seller Data</p>
                <div id="seller"></div>
            </div>
        </div>
    </div>
</div>
<!--/ Modal to show Seller Data  -->
<script src="{{ asset('vendors/js/extensions/sweetalert2.all.min.js') }}"></script>

<script>
    //alternatives table
    $("#alternatives-table").DataTable({
        dom: 'Bfrtip',
        buttons: [{
                extend: 'copy',
                className: 'btn btn-primary'
            },
            {
                extend: 'excel',
                className: 'btn btn-primary'
            },
            {
                extend: 'csv',
                className: 'btn btn-primary'
            },
            {
                extend: 'pdf',
                className: 'btn btn-primary'
            },
        ]
    });

    //set alternative title
    $('#alternativeProductsTitle').html("Alternative Products For Number: " + `<span id='product-number'>`+ "{{ $product['productNumber'] ?? '-' }}"  + ", Brand: "+ "{{ $product['brandName'] ?? '-' }}" + ", Type: " + "{{ $product['brandClassName'] ?? '-' }}" +`</span>` );
    //set alternative order
    function selectAltenative(productId, orderId, itemId, product) {
        $('#select-' + productId).prop('disabled', true)
        let url = "{{ route('append.seller.order') }}"
        let quantity = $("#alternative-" + productId).val();
        let max = $("#alternative-" + productId).attr("max");
        if (quantity > max) {
            Swal.fire({
                position: 'top-end',
                type: 'faild',
                html: 'Selected Quantity Is not Available',
                showConfirmButton: false,
                timer: 3000,
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
            $('#select-' + productId).prop('disabled', false)
            return;
        }


        const settings = {
            "url": url,
            "method": "Post",
            "data": {
                product: product,
                order_id: orderId,
                item_id: itemId,
                quantity: quantity,
                _token: "{{ csrf_token() }}",
            },
        };

        $.ajax(settings)
            .done(function(response) {
                $("#childs-" + orderId).after(response);
                Swal.fire({
                    position: 'top-end',
                    type: 'faild',
                    html: 'Alternative Item Has Been Added Successfully',
                    showConfirmButton: false,
                    timer: 3000,
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                })
                $('#select-' + productId).prop('disabled', false)

            })
            .catch(function(err) {
                console.log(err)
                errorAlert("Error Happened While Integrating Products", err.responseJSON.message)
            })
    }

    function getSellerData(company) {
        let html = `<p>Seller Name : ${company['company_en_name']}</p>`;
        html += `<p>Seller Phone : ${company['company_phone']}</p>`;
        html += `<p>Seller Email : ${company['company_email']}</p>`;
        html += `<p>Seller Location : ${company['company_location']}</p>`;
        html += `<p>Seller Commission : ${company['default_sales_tax']}</p>`;

        $("#seller").html(html);
        $("#sellerData").modal('show');

    }
</script>
