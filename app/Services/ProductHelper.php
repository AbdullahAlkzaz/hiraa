<?php
namespace App\Services;

use App\Http\Traits\ApiTrait;
use App\Http\Traits\QVMTrait;
use App\Models\OfferDetail;

class ProductHelper
{
    use ApiTrait;
    use QVMTrait;
    public static function check_product_offer_price($price, $offer_detail_id)
    {
        if ($offer_detail_id >= 1) {
            $offer_detail = OfferDetail::find($offer_detail_id);
            if ($offer_detail) {
                $price = $offer_detail->offer_price;
            }
        }
        return $price;
    }
    public static function get_product_price($product, $branch_id = 0, $item_quantity = 1)
    {
        $price = 0;
        if (isset($product['liveStock'])) {
            $first_liveStock = (isset($product['liveStock'][0])) ? $product['liveStock'][0]['averageCost'] : 0;
            $price = $first_liveStock;
        }
        ;
        return $price;
    }
    public function get_product_price_with_commission($product){
        $price = 0;
        if (isset($product['liveStock'])) {
            $first_liveStock = (isset($product['liveStock'][0])) ? $product['liveStock'][0]['averageCostwithCommission'] : 0;
            $price = $first_liveStock;
        };
        return $price;
    }
    public static function product_price($product, $item_quantity = 1)
    {
        $price = 0;
        if (isset($product['liveStock'])) {
            $first_liveStock = (isset($product['liveStock'][0])) ? $product['liveStock'][0]['averageCost'] : 0;
            $price = $first_liveStock;
        }
        ;
        return $price;
    }
    public static function search_products($products = [])
    {
        //
        // $endpoint = config('app.qvm_new_url') . "/product/v1/qvm/in/products";
        $endpoint = config('app.qvm_new_url') . "/product/v1/qvm/pb/products";
        $data = ['ids' => $products];
        $products = (new class {
            use QVMTrait;
        })->postData($endpoint, $data);
        // $products = self::postData($endpoint, $data);
        $products_array = [];
        if (isset($products) && is_array($products)) {
            foreach ($products as $product) {
                $products_array[$product['productId']] = $product;
            }
        }
        return $products_array;
    }
    public static function products_by_product_ids($product_ids = [])
    {
        $endpoint = config('app.qvm_new_url') . "/product/v1/qvm/in/products";
        $object = [];
        foreach ($product_ids as $product_id) {
            $object[] = ['productId' => $product_id, "companyId" => 1];
        }
        $data = ['ids' => $object];
        $products = (new class {
            use QVMTrait;
        })->postData($endpoint, $data);
        // $products = self::postData($endpoint, $data);
        $products_array = [];
        if (isset($products) && is_array($products)) {
            foreach ($products as $product) {
                $products_array[$product['productId']] = $product;
            }
        }
        return $products_array;
    }
    public static function update_stock($company_id, $branch_id, $product_id, $quantity, $plus = false)
    {
        if ($plus) {
            $quantity = $quantity;
        } else {
            $quantity = (0 - $quantity);
        }
        $data = [
            "companyId" => $company_id,
            "branchId" => $branch_id,
            "productId" => $product_id,
            "quantity" => $quantity,
        ];

        $endpoint = config('app.qvm_new_url') . "/product/v1/qvm/pb/update-prd-stk";
        $product = (new class {
            use QVMTrait;
        })->putData($endpoint, $data);
        // return $product;
    }
    public static function format_product($product)
    {
        $formatted_product = [];
        $formatted_product['product_id'] = $product['productId'] ?? null;
        $formatted_product['product_number'] = $product['productNumber'] ?? null;
        $formatted_product['name'] = $product['nameAr'] ?? null;
        $formatted_product['en_name'] = $product['name'] ?? null;
        $formatted_product['brand_id'] = $product['brandId'] ?? null;
        $formatted_product['brand_name'] = $product['brandNameAr'] ?? null;
        $formatted_product['brand_en_name'] = $product['brandName'] ?? null;
        $formatted_product['brand_brand_class_id'] = $product['brandClassId'] ?? null;
        $formatted_product['brand_class_name'] = $product['brandClassNameAr'] ?? null;
        $formatted_product['brand_class_en_name'] = $product['brandClassName'] ?? null;
        // $formatted_product['all'] = $product ?? null;
        return $formatted_product;
    }
    public static function cal_min_max_quantity($product, $branch_id)
    {
        $min_max_quantity = [
            'min' => 1,
            'max' => 1,
            'all' => 1,
        ];
        if (isset($product['liveStock']) && count($product['liveStock']) >= 1) {
            $all = 0;
            foreach ($product['liveStock'] as $liveStock) {
                if ($branch_id == $liveStock['branchId']) {
                    $min_max_quantity['max'] = $liveStock['quantity'];
                }
                $all += $liveStock['quantity'];
            }
            $min_max_quantity['all'] = $all;
        }
        return $min_max_quantity;
    }
    public static function check_product_stock($product, $quantity = 1)
    {
        $item_availability['availability'] = 0;
        $item_availability['max'] = 0;
        $item_availability['live_stock'] = null;
        $item_availability['branch_id'] = null;
        if (isset($product['liveStock']) && count($product['liveStock']) != 0) {
            if (count($product['liveStock']) == 1) {
                $item_availability['availability'] = ($quantity > $product['liveStock'][0]['quantity']) ? 0 : 1;
                $item_availability['max'] = $product['liveStock'][0]['quantity'];
                $item_availability['branch_id'] = $product['liveStock'][0]['branchId'];
            } else {
                $max = [];
                foreach ($product['liveStock'] as $liveStock) {
                    $max[] = $liveStock['quantity'];
                }
                foreach ($product['liveStock'] as $key => $liveStock) {
                    if ($quantity > $liveStock['quantity']) {
                        $item_availability['max'] = max($max);
                        continue;
                    } else {
                        $item_availability['availability'] = 1;
                        $item_availability['max'] = max($max);
                        $item_availability['branch_id'] = $liveStock['branchId'];
                        break;
                    }
                }
            }
            $item_availability['live_stock'] = $product['liveStock'];
        }
        return $item_availability;
    }

    public static function getProductBrandModels()
    {
        $endpoint = config('app.qvm_new_url') . "/product/v1/stock/pb/product-brand-models";
        $result = (new class () {
            use QVMTrait;
        })->getData($endpoint);
        return $result;
    }
    public static function getProductBrandClasses()
    {
        $endpoint = config('app.qvm_new_url') . "/product/v1/stock/pb/brand-classes";
        $result = (new class () {
            use QVMTrait;
        })->getData($endpoint);
        return $result;
    }
    public static function getProductBrand($data = ["query" => ""])
    {
        $endpoint = config('app.qvm_new_url') . "/product/v1/stock/pb/search-brand";
        $result = (new class () {
            use QVMTrait;
        })->postData($endpoint, $data);
        return $result;
    }

    public static function getProductMainCategories()
    {
        $endpoint = config('app.qvm_new_url') . "/product/v1/stock/pb/maincategories";
        $result = (new class () {
            use QVMTrait;
        })->getData($endpoint);
        return $result;
    }

    public static function getProductSubCategories()
    {
        $endpoint = config('app.qvm_new_url') . "/product/v1/stock/pb/subcategories";
        $result = (new class () {
            use QVMTrait;
        })->getData($endpoint);
        return $result;
    }

    public static function updateProductsPrices($data = [])
    {
        $endpoint = config('app.qvm_url') . "/product/platform-product/prices";
        $result = (new class () {
            use QVMTrait;
        })->putData($endpoint, $data);
        return $result;
    }

    public static function getProducts($productsArray)
    {
        $endpoint = config('app.qvm_new_url') . "/product/v1/qvm/in/products-ids";

        $data = [
            "ids" => $productsArray
        ];
        $res = (new class () {
            use QVMTrait;
        })->postData($endpoint, $data);
        return $res ?? "No products found";
    }

    public static function getProductsArray($orders)
    {
        $productArray = "";
        foreach ($orders as $order) {
            foreach ($order['purchase_order_items_po'] as $item) {
                if ($productArray == "") {
                    $productArray = $item['product_id'];
                } else {
                    $productArray = $productArray . "," . $item['product_id'];
                }
            }
        }

        if ($productArray == "") {
            return "no data found";
        }
        return $productArray;
    }

    public static function getCompaniesArray($orders)
    {
        $companiesArray = [];
        foreach ($orders as $order) {
            if ($order['company_id'] != null) {
                array_push($companiesArray, $order['company_id']);
            }

        }
        return $companiesArray;
    }

    public static function companies_by_company_ids($company_ids = [])
    {
        $endpoint = config('app.qvm_new_url') . "/subscriber/v2/qvm/in/companies-by-ids";
        $data = [
            'ids' => $company_ids
        ];
        $subscribers = (new class {
            use QVMTrait;
        })->postData($endpoint, $data);
        return $subscribers;
    }

    public function getAlternativeProducts($product_number)
    {
        $endpoint = config('app.qvm_new_url') . "/product/v1/qvm/pb/search-company-products-platforms";
        $data = [
            'query' => $product_number,
            'offset' => 0,
            'max' => 20000,
        ];
        $products = (new class {
            use QVMTrait;
        })->postData($endpoint, $data);
        return $products['products'];
    }


}