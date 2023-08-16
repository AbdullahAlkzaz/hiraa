<?php
namespace App\Services;

use App\Http\Traits\ApiTrait;
use App\Http\Traits\QVMTrait;
use App\Models\Order;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use App\Models\ShippingType;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CompanyHelper
{
    use ApiTrait;
    use QVMTrait;


    public static function format_company($company)
    {
        // return $subscriber;
        $formatted_company = [];
        $formatted_company['company_id'] = $company['id'];
        $formatted_company['company_name'] = $company['nameAr'];
        $formatted_company['company_en_name'] = $company['name'];
        $formatted_company['company_phone'] = $company['managerPhone'];
        $formatted_company['company_email'] = $company['managerMail'];
        $formatted_company['company_location'] = $company['cityId'];
        $formatted_company['default_sales_tax'] = $company['defaultSalesTax'];

        return $formatted_company;
    }


    public static function company_to_array($companies)
    {
        $companies_arr = [];
        if (is_array($companies)) {
            foreach ($companies as $company) {
                $companies_arr[$company['id']] = CompanyHelper::format_company($company);
            }
        }
        return $companies_arr;
    }


    public static function company_default_sales_tax($company_id)
    {
        $companies = CompanyHelper::companies_by_company_ids([$company_id]);

        $tax = (isset($companies[0])) ? $companies[0]['defaultSalesTax'] : 0;
        return $tax;
    }

    public static function company_labels()
    {
        $url = config('app.qvm_url') . '/subscriber/company-labels';

        $labels = (new class {
            use QVMTrait;
        })->getData($url, []);

        return $labels;

    }



    public static function companies_tabby_sales()
    {
        $endpoint = config('app.qvm_url') . "/stock/companies-tabby-sales";


        $res = (new class {
            use QVMTrait;
        })->getData($endpoint);
        return $res;
    }



    public static function companies_by_company_ids($company_ids = [], $map = false)
    {
        if(config('app.env') == "local" || config('app.env') == "dev"){
            $endpoint = config('app.qvm_base_url') . "/subscriber/v2/qvm/in/companies-by-ids";
        }else{
             $endpoint = config('app.qvm_new_url') . "/subscriber/v2/qvm/in/companies-by-ids";
        }

        $data = ['ids' => $company_ids];

        $subscribers = (new class {
            use QVMTrait;
        })->postData($endpoint, $data);
        if ($map) {
            $mapedSubscribers = [];
            foreach ($subscribers as $subscriber) {
                $mapedSubscribers[$subscriber['id']] = $subscriber['name'];
            }
            $subscribers = $mapedSubscribers;
        }
        return $subscribers;
    }
    public static function get_shipping_setting($id)
    {

        $endpoint = config('app.qvm_url') . "/subscriber/company/settings/shipping/" . $id;
        $data = [];
        $res = (new class () {
            use QVMTrait;
        })->getData($endpoint, $data);
        return (isset($res['shippingRate'])) ? $res['shippingRate'] : 0;
    }
    public static function company_shipping_option_by_location($company_id, $order_longitude, $order_latitude)
    {
        $endpoint = config('app.qvm_url') . "/subscriber/company/settings/shipping/" . $company_id . "/" . $order_latitude . "/" . $order_longitude;
        $data = [];
        $shipping = (new class () {
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
        $shipping = (new class () {
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
        $shipping = (new class () {
            use QVMTrait;
        })->getData($endpoint, $data);
        return $shipping;
    }

    public static function companies_tabby_sales_live($request)
    {

        $endpoint = config('app.qvm_url') . "/stock/company-tabby-sales";
        $from = (int) (Carbon::parse($request->from)->timestamp . str_pad(Carbon::parse($request->from)->milli, 3, '0', STR_PAD_LEFT));
        $to = (int) (Carbon::parse($request->to)->timestamp . str_pad(Carbon::parse($request->to)->milli, 3, '0', STR_PAD_LEFT));
        $data = [
            'from' => $from,
            'to' => $to,
            'companyId' => 1,
            'offset' => 0,
            'max' => 2
        ];

        $res = (new class {
            use QVMTrait;
        })->postData($endpoint, $data);

        return $res;
    }

    public static function getCompanies($query = '', $labels = '', $limit = 0, $offset = 0)
    {
        $endpoint = config('app.qvm_new_url') . "/subscriber/v2/pb/search-companies";
        $data = [
            "query" => $query,
            "max" => $limit,
            "offset" => $offset,
            "labelIds" => $labels
        ];
        $result = (new class {
            use QVMTrait;
        })->postData($endpoint, $data);
        return $result;
    }

    public static function getCompanyProducts($data)
    {
        $endpoint = config('app.qvm_new_url') . "/product/v1/qvm/pb/search-product-paginated-by-company";
        $result = (new class () {
            use QVMTrait;
        })->postData($endpoint, $data);
        return $result;
    }
    public static function getCompaniesLabels(){
        $endpoint = config('app.qvm_new_url') . "/subscriber/v2/pb/labels";
        $lables = (new class () {
            use QVMTrait;
        })->getData($endpoint);
        return $lables;
    }
    public function company_by_id($company_id)
    {
        $companies = CompanyHelper::companies_by_company_ids([$company_id]);
        $company_to_array = CompanyHelper::company_to_array($companies);
        $company_data = [];
        if (isset($company_to_array[$company_id])) {
            $company_data = $company_to_array[$company_id];
            $sales = PurchaseOrder::whereCompanyId($company_id)->sum('total_price');
            $revenue = Transaction::with('wallet', function ($q) {
                $q->where('user_type', 'merchant');
            })->whereUserId($company_id)->whereType(1)->sum('amount');
            $company_data['sales'] = $sales;
            $company_data['revenue'] = $revenue;
        }
        return $company_data;
    }

    public static function getMostSearchProducts($url,$companyId,$offset,$limit){

        $data = [
           "companyId"=>$companyId,
            "max"     => $limit,
            "offset"  => $offset,

        ];
        $result = (new class {
            use QVMTrait;
        })->postData($url, $data);
        return $result;
    }
    public static function getMostSearchProductsByDate($url,$companyId,$offset,$limit,$type,$last){

        $data = [
            "companyId"=>$companyId,
            "offset"  => $offset,
            "max"     => $limit,
            "type"  => $type,
            "last"  => $last
        ];
        $result = (new class {
            use QVMTrait;
        })->postData($url, $data);
        return $result;
    }

    public static function getPickPoints($city_id,$from,$to){
        if($from && $to){
            $purchaseOrders = PurchaseOrder::whereBetween('created_at',[$from,$to])->has('purchase_order_items_po')
                ->with(['purchase_order_items_po' => function ($query)use($city_id) {
                    $query->where('branch_city_id',$city_id)->where('item_status',4);
                }])->where('city_id',$city_id)->get();
        }else{
            $purchaseOrders = PurchaseOrder::has('purchase_order_items_po')
                ->with(['purchase_order_items_po' => function ($query)use($city_id) {
                    $query->where('branch_city_id',$city_id)->where('item_status',4);
                }])->where('city_id',$city_id)->get();
        }



        if(count($purchaseOrders) > 0){

        //collect branches
        $branchesArray = [];
        foreach ($purchaseOrders as $purchaseOrder){
            foreach ($purchaseOrder['purchase_order_items_po'] as $itemOrder){
                array_push($branchesArray,$itemOrder['branch_id']);
            }
        }

        $branches = BranchHelper::branchesByBranchesIds($branchesArray);
        $branchNames = [];
        foreach($branches as $branch){
            $branchNames[$branch['id']] = $branch['name'] . " / " . $branch['nameAr'];
        }
        //shipping types
        $shippingTypes = BranchHelper::getShippingTypes();
        $shippingTypesArray=[];
        foreach($shippingTypes as  $key => $shippingType){
            $shippingTypesArray[$key+1]=$shippingType->name . " / ".$shippingType->en_name;
        }

        //products
        $products = ProductHelper::getProductsArray($purchaseOrders);
        $allProducts = ProductHelper::getProducts($products);

        $productsArray=[];
        foreach($allProducts as $product){
            $productsArray[$product['productId']] = [
                "product_name"=>$product['name'] . " / ". $product['nameAr'],
                "brand_name"=>$product['brandName'] . " / ". $product['brandNameAr']
            ];
        }


        //companies
        $companies   = ProductHelper::getCompaniesArray($purchaseOrders);
        $allCompanies=ProductHelper::companies_by_company_ids($companies);
        $companiesArray = [];
        foreach ($allCompanies as $company){
            $companiesArray[$company['id']] = $company['name'] . " / ". $company['nameAr'];
        }


        $mergedArray = [];
        $mergedArray['allBranches'] = $purchaseOrders;
        $mergedArray['shipping_types'] = $shippingTypesArray;
        $mergedArray['all_products'] = $productsArray;
        $mergedArray['all_companies'] = $companiesArray;
        $mergedArray['all_branches_names'] = $branchNames;
        return $mergedArray;
        }
        return null;
    }

    public static function getCities(){
        $url = config('app.qvm_new_url') . "/location/v1/in/cities";
        $cities = (new class {
            use QVMTrait;
        })->getData($url, []);
        if(count($cities) == 0 ){
            $cities = [];
        }
        return $cities;
    }

    public static function cities_by_cities_ids($city_ids = [], $map = false)
    {
        $endpoint = config('app.qvm_new_url') . "/location/v1/pb/cities-ids";

        $data = ['ids' => implode(",",$city_ids)];

        $cities = (new class {
            use QVMTrait;
        })->postData($endpoint, $data);
        if ($map) {
            $mapedcities = [];
            if($cities){
                foreach ($cities as $city) {
                    $mapedcities[$city['id']] = $city['name'];
                }
            }
            $cities = $mapedcities;
        }
        return $cities;
    }

    public static function getDeliveryPoints($city_id,$from,$to){
        if($from && $to){
            $purchaseOrders = PurchaseOrder::whereBetween('created_at',[$from,$to])->has('delivery_point')
                ->with('delivery_point')->has('purchase_order_items_po')
                ->with(['purchase_order_items_po' => function ($query)use($city_id) {
                    $query->where('branch_city_id',$city_id)->where('item_status',6);
                }])->where('city_id',$city_id)->get();
        }else{
            $purchaseOrders = PurchaseOrder::has('delivery_point')
                ->with('delivery_point')->has('purchase_order_items_po')
                ->with(['purchase_order_items_po' => function ($query)use($city_id) {
                    $query->where('branch_city_id',$city_id)->where('item_status',6);
                }])->where('city_id',$city_id)->get();
        }


        if(count($purchaseOrders) > 0){


        //collect branches
        $buyerBranchesArray = [];
        foreach ($purchaseOrders as $purchaseOrder){
                array_push($buyerBranchesArray,$purchaseOrder['buyer_branch_id']);
        }

        $branches = BranchHelper::branchesByBranchesIds($buyerBranchesArray);
        $branchNames = [];
        foreach($branches as $branch){
            $branchNames[$branch['id']] = $branch['name'] . " / " . $branch['nameAr'];
        }

        //shipping types
        $shippingTypes = BranchHelper::getShippingTypes();
        $shippingTypesArray=[];
        foreach($shippingTypes as  $key => $shippingType){
            $shippingTypesArray[$key+1]=$shippingType->name . " / ".$shippingType->en_name;
        }
        //products
        $products = ProductHelper::getProductsArray($purchaseOrders);

        $allProducts = ProductHelper::getProducts($products);

        $productsArray=[];

            foreach($allProducts as $product){
                $productsArray[$product['productId']] = [
                    "product_name"=>$product['name'] . " / ". $product['nameAr'],
                    "brand_name"=>$product['brandName'] . " / ". $product['brandNameAr']
                ];
            }




        //companies
        $companies   = ProductHelper::getCompaniesArray($purchaseOrders);
        $allCompanies=ProductHelper::companies_by_company_ids($companies);
        $companiesArray = [];
        if(count($companies)>0){
            foreach ($allCompanies as $company){
                $companiesArray[$company['id']] = $company['name'] . " / ". $company['nameAr'];
            }
        }




        $mergedArray = [];
        $mergedArray['allBranches'] = $purchaseOrders;
        $mergedArray['shipping_types'] = $shippingTypesArray;
        $mergedArray['all_products'] = $productsArray;
        $mergedArray['all_companies'] = $companiesArray;
        $mergedArray['all_branches_names'] = $branchNames;
        return $mergedArray;
        }
        return null;
    }

    public static function getDeliveryPointsByCityId($id){
        $endpoint = config('app.qvm_new_url') . "/order/api/v1/qvm/delivery-points/".$id;
        $result = (new class () {
            use QVMTrait;
        })->getData($endpoint);
        return $result;

    }

    public static function getWhatsapp(){
        $endpoint = config('app.qvm_order_base_url') . "/get/whatsapp";
        $result = (new class () {
            use QVMTrait;
        })->getData($endpoint);
        return $result;
    }

    public static function saveWhatsapp($request){
        $endpoint = config('app.qvm_order_base_url') . "/slider/whatsapp";
        $data = ['whatsapp_number' => $request->whatsapp_number];
        $result = (new class () {
            use QVMTrait;
        })->postData($endpoint,$data);
        return $result;
    }

    public static function getTaxAndCommercial(){
        $endpoint = config('app.qvm_order_base_url') . "/settings/company-data";
        $result = (new class () {
            use QVMTrait;
        })->getData($endpoint);
        return $result;
    }

    public static function addOrUpdateCompanyData($request){
        $endpoint = config('app.qvm_order_base_url') . "/settings/company-data";
        $data = [
            'tax_card' => $request->tax_card,
            'commercial_record' => $request->commercial_record
        ];
        $result = (new class () {
            use QVMTrait;
        })->postData($endpoint,$data);
        return $result;
    }

    public static function getBankAccounts($id){

        $endpoint = config('app.qvm_new_url') . "/subscriber/v2/pb/get-bank-accounts-company/".$id;
        $result = (new class () {
            use QVMTrait;
        })->getData($endpoint);
        return $result;
    }

    public static function getBankAccountById($id){
        $endpoint = config('app.qvm_new_url') . "/subscriber/v2/pb/get-bank-account/".$id;
        $result = (new class () {
            use QVMTrait;
        })->getData($endpoint);
        return $result;
    }

    public static function updateBankAccount($request){
        $endpoint = config('app.qvm_new_url') . "/subscriber/v2/pb/update-bank-account";
        $data = [
        "id"=>$request->id,
        "companyId"=>$request->companyId,
        "bankName"=>$request->bankName,
        "description"=>$request->description,
        "accountType"=>$request->accountType,
        "accountName"=>$request->accountName,
        "accountKey"=>$request->accountKey,
        "currencyType"=>$request->currencyType
        ];
        $result = (new class () {
            use QVMTrait;
        })->putData($endpoint,$data);
        return $result;
    }

    public static function deleteBankAccount($id){
        $endpoint = config('app.qvm_new_url') . "/subscriber/v2/pb/delete-bank-account/".$id ;
        $result = (new class () {
            use QVMTrait;
        })->deleteData($endpoint);
        return $result;
    }






}
