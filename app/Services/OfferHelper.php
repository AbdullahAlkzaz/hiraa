<?php
namespace App\Services;
use App\Http\Traits\ApiTrait;
use App\Http\Traits\QVMTrait;
use App\Models\Offer;
use App\Models\Order;
use App\Models\PurchaseOrder;
class OfferHelper
{
    use ApiTrait;
    use QVMTrait;


    public static function offer_format($id)
    {
        $the_offer = Offer::with(['offer_type', 'offer_details' , 'offer_labels' ])->find($id);
     
        $offer_details = $the_offer->offer_details;
        $company_id = $the_offer['seller_id'];

        $products = [];
        foreach ($offer_details as $offer_detail) {
            $product_id = $offer_detail['product_id'];
            $products[] = ['productId' => $product_id, "companyId" => $company_id];
        }

        // return $products;
        
      
        $products_by_product_ids = ProductHelper::search_products($products);

        
        $total_quantity = 0;
        $total_offer_price = 0;
        foreach ($offer_details as $offer_detail) {
            
            $product_id = $offer_detail['product_id'];
            $item_quantity = $offer_detail['offer_quantity'];
            $offer_price = $offer_detail['offer_price'];

          
            $total_quantity += $item_quantity;
            $total_offer_price += $offer_price;
            $product = (isset($products_by_product_ids[$product_id])) ? $products_by_product_ids[$product_id] : null;

            $offer_detail->product = ProductHelper::format_product($product);
        }
        $the_offer->count_quantity = count($offer_details);
        $the_offer->total_quantity = $total_quantity;
        $the_offer->total_offer_price = $total_offer_price;
        $companies = CompanyHelper::companies_by_company_ids([$the_offer->seller_id]);
        $company_to_array = CompanyHelper::company_to_array($companies);
        $company_name = (isset($company_to_array[$the_offer->seller_id])) ? $company_to_array[$the_offer->seller_id]['company_name'] : '-';
        $company_en_name = (isset($company_to_array[$the_offer->seller_id])) ? $company_to_array[$the_offer->seller_id]['company_en_name'] : '-';
        $the_offer->company = [
            'company_id' => $the_offer->seller_id
            , "company_name" => $company_name
            , "company_en_name" => $company_en_name,
        ];
        return $the_offer;
    }

    public static function format_company($company)
    {
        // return $subscriber;
        $formatted_company = [];
        $formatted_company['company_id'] = $company['id'];
        $formatted_company['company_name'] = $company['nameAr'];
        $formatted_company['company_en_name'] = $company['name'];
        
        $formatted_company['company_email'] = $company['managerMail'];
        $formatted_company['company_location'] = $company['cityId'];
        $formatted_company['default_sales_tax'] = $company['defaultSalesTax'];
        
        return $formatted_company;
    }


    public static function company_to_array($companies)
    {
        $companies_arr = [];
        if(is_array($companies)){ 
        foreach ($companies as $company) {
            $companies_arr[$company['id']] = CompanyHelper::format_company($company);
        }
    }
        return $companies_arr;
    }


    public  static function company_default_sales_tax($company_id)
    {
        $companies = CompanyHelper::companies_by_company_ids([$company_id]);
        
        $tax = (isset($companies[0])) ? $companies[0]['defaultSalesTax'] : 0;
        return $tax;
    }
    public static function companies_by_company_ids($company_ids = [])
    {
        $endpoint = config('app.qvm_new_url') . "/subscriber/v2/qvm/in/companies-by-ids";
        $data = ['ids' => $company_ids];
        $subscribers = (new class
        {use QVMTrait;})->postData($endpoint, $data);
        return $subscribers;
    }

    public static function offerProducts($products_ids = [], $map = false)
    {
        $endpoint = config('app.qvm_new_url') . "/product/v1/qvm/in/products";
        $data = ['ids' => $products_ids];
        $products = (new class
        {use QVMTrait;})->postData($endpoint, $data);
        if($map){
            $products_data = [];
            foreach($products as $product){
                $products_data[$product['productId']] = $product['productNumber'];
            }
            $products = $products_data;
        }
        return $products;
    }
    public static function get_shipping_setting($id)
    {

        $endpoint = config('app.qvm_url') . "/subscriber/company/settings/shipping/" . $id;
        $data = [];
        $res = (new class()
        {
            use QVMTrait;
        })->getData($endpoint, $data);
        return (isset($res['shippingRate'])) ? $res['shippingRate'] : 0;
    }
    public static function company_shipping_option_by_location($company_id, $order_longitude, $order_latitude)
    {
        $endpoint = config('app.qvm_url') . "/subscriber/company/settings/shipping/" . $company_id . "/" . $order_latitude . "/" . $order_longitude;
        $data = [];
        $shipping = (new class()
        {
            use QVMTrait;
        })->getData($endpoint, $data);
        return (isset($shipping['shippingRate'])) ? $shipping['shippingRate'] : 0;
    }
    public static function company_shipping_options($company_id, $order_id)
    {
        $order_longitude = 0.0;
        $order_latitude = 0.0;
        $order = Order::find($order_id);
        if ($order) {
            $order_longitude = $order->order_longitude;
            $order_latitude = $order->order_latitude;
        }

        $endpoint = config('app.qvm_url') . "/subscriber/company/settings/shipping/" . $company_id . "/" . $order_latitude . "/" . $order_longitude;
        $data = [];
        $shipping = (new class()
        {
            use QVMTrait;
        })->getData($endpoint, $data);
        return $shipping;
    }
    public static function company_shipping_options_by_purchase_order_id($company_id, $purchase_order_id)
    {
        $order_longitude = 0.0;
        $order_latitude = 0.0;
        $purchase_order = PurchaseOrder::find($purchase_order_id);
        $order = Order::find($purchase_order->order_id);
        if ($order) {
            $order_longitude = $order->order_longitude;
            $order_latitude = $order->order_latitude;
        }
        $endpoint = config('app.qvm_url') . "/subscriber/company/settings/shipping/" . $company_id . "/" . $order_latitude . "/" . $order_longitude;
        $data = [];
        $shipping = (new class()
        {
            use QVMTrait;
        })->getData($endpoint, $data);
        return $shipping;
    }
}
