@php $product_number = $product['productNumber']; @endphp
<tr class="child-row" style="background-color: #f3f2f7;">
    <td><span style="color: red"> Alternative </span></td>
    <td>{{ $item->item_id }}</td>
    <td>{{ $product['name'] != '' ? $product['name'] != '' : $product['nameAr'] }}</td>
    <td>{{ $product['productNumber'] ?? "-" }}</td>
    <td>{{ $product['brandClassName'] ?? "-" }}</td>
    <td>{{ isset($company['company_en_name']) && $company['company_en_name'] != "" ? $company['company_en_name'] : $company['company_name'] }}</td>
    <td>{{ $item->quantity }}</td>
    <td>{{ $item->approved_quantity ? $item->approved_quantity : '-' }}</td>
    <td>{{ $item->price }}</td>
    <td>{{ $item->original_price }}</td>
    <td>{{$item->seller_item_status ? $item->seller_item_status->en_name : "-"}}</td>
    <td>{{ $product['brandName'] }}</td>
    <td><a class="btn btn-success" href="#"
            onclick='showAlternativeProducts("{{ $product_number }}", "{{ $purchase_order->id }}", "{{ $item->id }}")' >Alteratives</a>
    </td>
</tr>