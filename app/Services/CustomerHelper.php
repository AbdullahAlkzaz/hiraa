<?php
namespace App\Services;

use App\Http\Traits\ApiTrait;
use App\Http\Traits\QVMTrait;
use App\Models\Order;
use App\Models\PurchaseOrder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CustomerHelper
{
    use ApiTrait;
    use QVMTrait;


    public static function getCustomers($query = "", $offset = 0, $max = 10)
    {
        $endpoint = config('app.qvm_new_url') . '/customer/v1/pb/search-all-customers';
        $data = [
            "query" => $query,
            "offset" => $offset,
            "max" => $max,
        ];
        $customers = (new class {
            use QVMTrait;
        })->postData($endpoint, $data);
        return $customers;
    }
    public static function getCustomerSales($customer_id, $offset = 0, $max = 10)
    {
        $endpoint = config('app.qvm_new_url') . "/product/v1/stock/pb/search-sales-by-company";

        $data = [
            "companyId" => $customer_id,
            "offset" => $offset,
            "max" => $max,
            "type" => "",
            "query" => "",
            "created" => "",
        ];
        $sales = (new class {
            use QVMTrait;
        })->postData($endpoint, $data);
        return $sales;
    }

    public static function getCustomerQuotations($customer_id, $offset = 0, $max = 10)
    {
        $endpoint = config('app.qvm_new_url') . "/product/v1/stock/pb/search-quotation-by-company";

        $data = [
            'query' => "",
            'companyId' => $customer_id,
            "offset" => $offset,
            "max" => $max,
            "created" => ""
        ];

        $sales = (new class {
            use QVMTrait;
        })->postData($endpoint, $data);
        return $sales;
    }

    public static function getBestPurchasedProducts($customer_id)
    {
        $products = DB::table('purchase_orders')
            ->leftJoin('purchase_order_items', 'purchase_orders.id', '=', 'purchase_order_items.purchase_order_id')
            ->selectRaw('purchase_order_items.product_id, COALESCE(sum(purchase_order_items.quantity),0) total')
            ->where("purchase_orders.subscriber_company_id", $customer_id)
            ->groupBy('purchase_order_items.product_id')
            ->orderBy('total', 'desc')
            ->take(10)
            ->get();

        $products_ids = [];
        foreach ($products as $key => $product) {
            if (is_null($product->product_id)) {
                unset($products[$key]);
            } else {
                $products_ids[] = $product->product_id;
            }
        }

        return ['products_ids' => $products_ids, 'products_counts' => $products];
    }

    public static function getPurchaseValueAverage($customer_id, $group)
    {
        if ($group == 'month') {
            $query = "SELECT  extract(year from POI.created_at) as year,
                to_char(POI.created_at, 'Mon') as month, 
                SUM(POI.total_price) AS Purchases_value,
                COUNT(PO.id) as orders_count
                FROM purchase_order_items as POI
                INNER JOIN purchase_orders AS PO
                ON (PO.id = POI.purchase_order_id) 
                WHERE POI.purchase_order_id IN (SELECT id From purchase_orders WHERE subscriber_company_id=$customer_id)
                GROUP BY  year, month 
                ORDER BY Purchases_value DESC;
            ";
        } else if ($group == 'year') {

            $query = "SELECT  extract(year from POI.created_at) as year,
                SUM(POI.total_price) AS Purchases_value,
                COUNT(PO.id) as orders_count
                FROM purchase_order_items as POI
                INNER JOIN purchase_orders AS PO
                ON (PO.id = POI.purchase_order_id) 
                WHERE POI.purchase_order_id IN (SELECT id From purchase_orders WHERE subscriber_company_id=$customer_id)
                GROUP BY year
                ORDER BY Purchases_value DESC;
            ";
        } else {
            $query = "SELECT  extract(year from POI.created_at) as year,
                to_char(POI.created_at, 'Mon') as month, extract(day from POI.created_at) as day,
                SUM(POI.total_price) AS Purchases_value,
                COUNT(PO.id) as orders_count
                FROM purchase_order_items as POI
                INNER JOIN purchase_orders AS PO
                ON (PO.id = POI.purchase_order_id) 
                WHERE POI.purchase_order_id IN (SELECT id From purchase_orders WHERE subscriber_company_id=$customer_id)
                GROUP BY year, month , day 
                ORDER BY Purchases_value DESC;
            ";
        }
        $customerPurchasesStatistics = DB::select($query);
        return $customerPurchasesStatistics;
    }

    public static function getPurchasesOverGroup($customer_id, $group)
    {
        if ($group == "month") {
            $query = "SELECT to_char(created_at, 'Mon') as month,
                COUNT(id) as orders_count
                FROM purchase_orders
                where subscriber_company_id = $customer_id
                GROUP BY month
                ORDER BY orders_count DESC;
            ";
        } else if ($group == "year") {
            $query = "SELECT created_at, extract(year from created_at) as year,
                COUNT(id) as orders_count
                FROM purchase_orders
                where subscriber_company_id = $customer_id
                GROUP BY year
                ORDER BY orders_count DESC;
            ";
        } else {
            $query = "SELECT created_at, extract(year from created_at) as year,
                to_char(created_at, 'Mon') as month,
                extract(day from created_at) as day,
                COUNT(id) as orders_count
                FROM purchase_orders
                where subscriber_company_id = $customer_id
                GROUP BY created_at
                ORDER BY orders_count DESC;
            ";

        }

        $purchases = DB::select($query);
        return $purchases;
    }

    public static function getTopSllers($customer_id)
    {
        // $top_sellers_ids = PurchaseOrder::where('subscriber_id', $customer_id)->pluck("company_id")->toArray();
        $top_sellers = DB::table('purchase_orders')
            ->selectRaw('company_id, COALESCE(count(company_id),0) company_count')
            ->where("subscriber_company_id", $customer_id)
            ->groupBy('company_id')
            ->orderBy('company_count', 'desc')
            ->take(10)
            ->get();

        $sellers_ids = [];
        foreach ($top_sellers as $top_seller) {
            $sellers_ids[] = $top_seller->company_id;
        }

        return ['sellers_ids' => $sellers_ids, 'top_sellers' => $top_sellers];
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

    public static function companies_by_company_ids($company_ids = [], $map = false)
    {
        $endpoint = config('app.qvm_new_url') . "/subscriber/v2/qvm/in/companies-by-ids";

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
    public static function getUserLoginLogs($customer_id)
    {
        $url = config('app.qvm_new_url') . "/subscriber/v2/pb/company-logins/$customer_id";

        $userLoginLogs = (new class {
            use QVMTrait;
        })->getData($url, []);

        return $userLoginLogs;
    }

    public static function getPurchasesOffersStatistics($customer_id)
    {
        $query = "SELECT SUM(CASE 
                                WHEN POI.offer_detail_id IS NULL THEN 1
                                ELSE 0
                            END) AS not_offer_count,
                         SUM(CASE 
                                WHEN POI.offer_detail_id IS NOT NULL THEN 1
                                ELSE 0
                            END) AS is_offer_count
                FROM purchase_order_items as POI
                INNER JOIN purchase_orders AS PO
                ON (PO.id = POI.purchase_order_id) 
                WHERE POI.purchase_order_id IN (SELECT id From purchase_orders WHERE subscriber_company_id=$customer_id)
                
            ";
        $purchasesOfferStatistics = DB::select($query);

        $query = "SELECT POI.product_id, POI.offer_detail_id, POI.purchase_order_id
                FROM purchase_order_items as POI
                INNER JOIN purchase_orders AS PO
                ON (PO.id = POI.purchase_order_id) 
                WHERE POI.purchase_order_id IN (SELECT id From purchase_orders WHERE subscriber_company_id=$customer_id)
                
            ";
        $purchases = DB::select($query);
        $products_ids = [];
        foreach ($purchases as $purchaseItem) {
            $products_ids[] = $purchaseItem->product_id;
        }
        return ["products_ids" => $products_ids, "purchases" => $purchases, "purchasesOffersStatistics" => $purchasesOfferStatistics];
    }

    public static function getOrderStatusCount($customer_id)
    {
        $query = "SELECT SUM(CASE 
                                WHEN purchase_order_status_id=1 THEN 1
                                ELSE 0
                            END) AS new_status_count,
                         SUM(CASE 
                                WHEN purchase_order_status_id=2 THEN 1
                                ELSE 0
                            END) AS preparing_status_count,
                         SUM(CASE 
                                WHEN purchase_order_status_id=3 THEN 1
                                ELSE 0
                            END) AS hanging_status_count,
                         SUM(CASE 
                                WHEN purchase_order_status_id=4 THEN 1
                                ELSE 0
                            END) AS supplier_canceled_status_count,
                         SUM(CASE 
                                WHEN purchase_order_status_id=5 THEN 1
                                ELSE 0
                            END) AS complete_status_count,
                         SUM(CASE 
                                WHEN purchase_order_status_id=6 THEN 1
                                ELSE 0
                            END) AS shipping_receipt_status_count,
                         SUM(CASE 
                                WHEN purchase_order_status_id=7 THEN 1
                                ELSE 0
                            END) AS me_canceled_status_count,
                         SUM(CASE 
                                WHEN purchase_order_status_id=8 THEN 1
                                ELSE 0
                            END) AS waiting_supplier_status_count,
                         SUM(CASE 
                                WHEN purchase_order_status_id=9 THEN 1
                                ELSE 0
                            END) AS refund_status_count                            
                    FROM purchase_orders
                    WHERE subscriber_company_id=$customer_id
                ";
        return DB::select($query);
    }

    public static function getOrdersStatusLog($customer_id, $order_ids, $type = 1)
    {
        $data = DB::table("purchase_order_status_logs")->whereIn("order_id", $order_ids)->where('type', $type)->get();
        $complete_period = [];
        $period_average = 0;
        foreach ($data as $key => $log) {
            if (!array_key_exists($log->order_id, $complete_period)) {
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $data->where('order_id', $log->order_id)->where("status", 5)->first()->created_at);
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $data->where('order_id', $log->order_id)->where("status", 1)->first()->created_at);
                $complete_period[$log->order_id] = $to->diffInHours($from);
                $period_average += $to->diffInHours($from);
            }
        }
        $period_average /= sizeof($complete_period) ?: 1;
        return ["period_average" => $period_average, "logs" => $data, "complete_period" => $complete_period];
    }

    public static function getOrderShipmentStatusCount($customer_id)
    {
        $query = "SELECT SUM(CASE 
                            WHEN shipping_method_id=1 THEN 1
                            ELSE 0
                            END) AS aramix_count,
                        SUM(CASE 
                                WHEN shipping_method_id=2 THEN 1
                                ELSE 0
                            END) AS zajil_count                            
                    FROM purchase_orders
                    WHERE subscriber_company_id=$customer_id
                    ";
        return DB::select($query);
    }

}