<?php
namespace App\Services;

use App\Http\Traits\ApiTrait;
use App\Http\Traits\QVMTrait;
use App\Models\DeliveryCharge;
use App\Models\Order;
use App\Models\PurchaseOrder;
use App\Models\ShippingCities;
use Illuminate\Support\Facades\DB;

class OrderHelper
{
    use ApiTrait;
    use QVMTrait;

    private CompanyHelper $companyService;
    public function __construct(CompanyHelper $companyService){
        $this->companyService = $companyService;
    }
    public static function purchase_order_shipping_price($order_id, $shipping_method_id)
    {
        $order_longitude = 0.0;
        $order_latitude = 0.0;
        $order = Order::find($order_id);
        if ($order) {
            $order_longitude = $order->order_longitude;
            $order_latitude = $order->order_latitude;
            $company_id = $order->company_id;
            $endpoint = config('app.qvm_url') . "/subscriber/company/settings/shipping/" . $company_id . "/" . $order_latitude . "/" . $order_longitude;
            $data = [];
            $res = (new class () {
                use QVMTrait;
            })->getData($endpoint, $data);
            return (isset($res['shippingRate'])) ? $res['shippingRate'] : 0;
        }
        return 0;
    }
    public static function cal_order_items_availability_id($order_item = null)
    {
        return 1;
    }
    public static function cal_order_items_availability($order = null)
    {
        return 1;
    }
    public static function cal_overall_items_availability($order)
    {
        $order_items = $order->order_items;
        $availability1 = 0;
        $availability3 = 0;
        foreach ($order_items as $order_item) {
            if ($order_item->order_items_availability_id == 1) {
                $availability1++;
            }
            if ($order_item->order_items_availability_id == 3) {
                $availability1++;
            }
            if ($availability1 > $availability3) {
                return 1;
            }
            if ($availability1 < $availability3) {
                return 4;
            }
        }
    }

    public function CustomersOrdersReport($data = [])
    {
        if ($data["status"] == "pending") {
            $query = "SELECT O.subscriber_company_id as company_id, SUM(CASE
                                WHEN O.order_status_id=1 THEN 1
                                ELSE 0
                            END) AS pending_count,
                    SUM(CASE
                            WHEN  O.order_status_id=1 THEN O.price
                            ELSE 0
                        END) AS pending_total
            ";
        } elseif ($data['status'] == "canceled") {
            $query = "SELECT O.subscriber_company_id as company_id, SUM(CASE
                                WHEN O.order_status_id=7 THEN 1
                                ELSE 0
                            END) AS pending_count,
                    SUM(CASE
                            WHEN  O.order_status_id=7 THEN O.price
                            ELSE 0
                        END) AS pending_total
            ";
        }

        $query .= "
                FROM orders as O
        ";
        if ($data["status"] == "pending") {
            $query .= "Where O.order_status_id=1";
        } elseif ($data['status'] == "canceled") {
            $query .= "Where O.order_status_id=7";
        }

        if (isset($data['date_from']) && isset($data['date_to'])) {
            $query .=
                "
                AND O.created_at BETWEEN SYMMETRIC '" . (string) $data['date_from'] . "' AND '" . (string) $data['date_to'] . "'
            ";
        }

        $query .=
            "
            and company_id is null
            GROUP BY O.subscriber_company_id
            ORDER BY O.subscriber_company_id
        ";

        $data = DB::select($query);
        $companies_ids = [];
        foreach ($data as $row) {
            $companies_ids[] = $row->company_id;
        }
        return ["data" => $data, "companies_ids" => $companies_ids];
    }

    public function regionCompletedOrders($data = [])
    {
        $query = "SELECT city_id, SUM(CASE
                            WHEN purchase_order_status_id=5 THEN 1
                            ELSE 0
                        END) AS completed_count,
                        SUM(CASE
                            WHEN  purchase_order_status_id=5 THEN price
                            ELSE 0
                        END) AS completed_total
                    FROM purchase_orders
                    WHERE purchase_order_status_id=5
        ";
        if (isset($data['date_from']) && isset($data['date_to'])) {
            $query .=
                "
                AND created_at BETWEEN SYMMETRIC '" . (string) $data['date_from'] . "' AND '" . (string) $data['date_to'] . "'
            ";
        }
        $query .= "GROUP BY city_id
        ORDER BY city_id";
        $data = DB::select($query);
        $cities_ids = [];
        foreach ($data as $row) {
            $cities_ids[] = $row->city_id;
        }
        return ["data" => $data, "cities_ids" => $cities_ids];
    }
    public function getCustomersOrdersPerMonth($data = [])
    {
        $query = "SELECT PO.subscriber_id, extract(year from PO.created_at) as year,
                to_char(PO.created_at, 'Mon') as month,
                SUM(PO.price) AS purchases_value,
                COUNT(PO.id) as orders_count
                FROM purchase_orders as PO
                WHERE purchase_order_status_id=5
            ";
        if (isset($data['date_from']) && isset($data['date_to'])) {
            $query .=
                "
                AND  created_at BETWEEN SYMMETRIC '" . (string) $data['date_from'] . "' AND '" . (string) $data['date_to'] . "'
            ";
        }
        $query .= "GROUP BY  PO.subscriber_id, year, month
        ORDER BY PO.subscriber_id DESC;";
        $data = DB::select($query);

        $subscribers_ids = [];
        foreach ($data as $row) {
            $subscribers_ids[] = $row->subscriber_id;
        }
        return ["data" => $data, "subscribers_ids" => $subscribers_ids];
    }
    public function supplierPurchasedOrdersReport($data = [])
    {
        if ($data["status"] == "pending") {
            $query = "SELECT PO.company_id, SUM(CASE
                                WHEN PO.purchase_order_status_id=1 THEN 1
                                ELSE 0
                            END) AS pending_count,
                    SUM(CASE
                            WHEN  PO.purchase_order_status_id=1 THEN PO.price
                            ELSE 0
                        END) AS pending_total
            ";
        } elseif ($data['status'] == "canceled") {
            $query = "SELECT PO.company_id, SUM(CASE
                                WHEN PO.purchase_order_status_id=4 OR PO.purchase_order_status_id=7 THEN 1
                                ELSE 0
                            END) AS pending_count,
                    SUM(CASE
                            WHEN  PO.purchase_order_status_id=4 OR PO.purchase_order_status_id=7 THEN PO.price
                            ELSE 0
                        END) AS pending_total
            ";
        }

        $query .= "
                FROM purchase_orders as PO
        ";
        if ($data["status"] == "pending") {
            $query .= "Where PO.purchase_order_status_id=1";
        } elseif ($data['status'] == "canceled") {
            $query .= "Where PO.purchase_order_status_id=4 OR PO.purchase_order_status_id=7";
        }

        if (isset($data['date_from']) && isset($data['date_to'])) {
            $query .=
                "
                AND PO.created_at BETWEEN SYMMETRIC '" . (string) $data['date_from'] . "' AND '" . (string) $data['date_to'] . "'
            ";
        }

        $query .=
            "
            GROUP BY PO.company_id
            ORDER BY PO.company_id
        ";

        $data = DB::select($query);
        $companies_ids = [];
        foreach ($data as $row) {
            $companies_ids[] = $row->company_id;
        }
        return ["data" => $data, "companies_ids" => $companies_ids];
    }

    public function regionOrdersReport($data = [])
    {
        if($data['status'] == "incomplete"){
            $query = "SELECT orders.city_id, SUM(CASE
                        WHEN orders.order_status_id=1 THEN 1
                        ELSE 0
                    END) AS incompleted_count,
                    SUM(CASE
                        WHEN orders.order_status_id=1  THEN orders.price
                        ELSE 0
                    END) AS incompleted_total,
                    SUM(CASE
                        WHEN purchase_orders.purchase_order_status_id=5  THEN 1
                        ELSE 0
                    END) AS completed_count
                FROM orders
                INNER JOIN purchase_orders
                ON (orders.id = purchase_orders.order_id)
                WHERE orders.order_status_id=1
                ";
        }

        if (isset($data['date_from']) && isset($data['date_to'])) {
            $query .=
                "
                AND orders.created_at BETWEEN SYMMETRIC '" . (string) $data['date_from'] . "' AND '" . (string) $data['date_to'] . "'
                ";
        }
        $query .= "GROUP BY orders.city_id
                ORDER BY orders.city_id";
        $data = DB::select($query);
        $cities_ids = [];
        foreach ($data as $row) {
            $cities_ids[] = $row->city_id;
        }
        return ["data" => $data, "cities_ids" => $cities_ids];
    }
    public static function getOrdersPerTime($group)
    {
        if ($group == 'month') {
            $query = "SELECT  extract(year from POI.created_at) as year,
                to_char(POI.created_at, 'Mon') as month,
                SUM(POI.total_price) AS Purchases_value,
                COUNT(PO.id) as orders_count
                FROM order_items as POI
                INNER JOIN orders AS PO
                ON (PO.id = POI.order_id)
                WHERE PO.order_status_id=1
                GROUP BY  year, month
                ORDER BY Purchases_value DESC;
            ";
        } else if ($group == 'year') {

            $query = "SELECT  extract(year from POI.created_at) as year,
                SUM(POI.total_price) AS Purchases_value,
                COUNT(PO.id) as orders_count
                FROM order_items as POI
                INNER JOIN orders AS PO
                ON (PO.id = POI.order_id)
                WHERE PO.order_status_id=1
                GROUP BY year
                ORDER BY Purchases_value DESC;
            ";
        } else {
            $query = "SELECT  extract(year from POI.created_at) as year,
                to_char(POI.created_at, 'Mon') as month, extract(day from POI.created_at) as day,
                SUM(POI.total_price) AS Purchases_value,
                COUNT(PO.id) as orders_count
                FROM order_items as POI
                INNER JOIN orders AS PO
                ON (PO.id = POI.order_id)
                WHERE PO.order_status_id=1
                GROUP BY year, month , day
                ORDER BY Purchases_value DESC;
            ";
        }
        $customerPurchasesStatistics = DB::select($query);
        return $customerPurchasesStatistics;
    }
    public function getPaymentPurchaseOrders($data = []){
        $query = "SELECT payment_method_id, extract(year from created_at) as year,to_char(created_at, 'Mon') as month,SUM(CASE
                            WHEN purchase_order_status_id=5 THEN 1
                            ELSE 0
                        END) AS completed_count,
                        SUM(CASE
                            WHEN  purchase_order_status_id=5 THEN price
                            ELSE 0
                        END) AS completed_total
                    FROM purchase_orders
                    WHERE purchase_order_status_id=5
        ";
        if (isset($data['date_from']) && isset($data['date_to'])) {
            $query .=
                "
                AND created_at BETWEEN SYMMETRIC '" . (string) $data['date_from'] . "' AND '" . (string) $data['date_to'] . "'
            ";
        }
        $query .= "GROUP BY payment_method_id, year, month
        ORDER BY payment_method_id, year, month";
        $data = DB::select($query);
        $new_data = [];
        foreach($data as $element){
            $new_data[$element->month . "-" . $element->year] = $element;
        }
        return $new_data;
    }

    public static function deliveryPoint($id){
        $endpoint = config('app.qvm_order_base_url') . "/delivery-points/".$id;
        $data = [];
        $res = (new class () {
            use QVMTrait;
        })->getData($endpoint, $data);

        return $res;
    }
    public static function createDeliveryPoint($request){
        $endpoint = config('app.qvm_order_base_url') . "/store/delivery-points";
        $data = [
            "city_id"=>$request->city_id,
            "city_name"=>$request->city_name,
            "city_name_ar"=>$request->city_name_ar,
            "point_name"=>$request->point_name,
            "point_name_ar"=>$request->point_name_ar,
            "point_address"=>$request->point_address,
            "point_location"=>$request->point_location,
            "point_working_hours"=>$request->point_working_hours,
            "point_manager_name"=>$request->point_manager_name,
            "point_manager_phone"=>$request->point_manager_phone
        ];
        $res = (new class () {
            use QVMTrait;
        })->postData($endpoint, $data);

        return $res;
    }

    public static function deleteDeliveryPoint($id){
        $endpoint = config('app.qvm_order_base_url') . "/delete/delivery-points/".$id;
        $res = (new class () {
            use QVMTrait;
        })->getData($endpoint, []);
        return $res;
    }

    public static function getDeliveryPoint($id){
        $endpoint = config('app.qvm_order_base_url') . "/get/delivery-points/point/".$id;
        $res = (new class () {
            use QVMTrait;
        })->getData($endpoint, []);
        return $res;
    }

    public static function updateDeliveryPoint($request,$id){
        $endpoint = config('app.qvm_order_base_url') . "/update/delivery-points/".$id;
        $data = [
            "city_id"=>$request->city_id,
            "city_name"=>$request->city_name,
            "city_name_ar"=>$request->city_name_ar,
            "point_name"=>$request->point_name,
            "point_name_ar"=>$request->point_name_ar,
            "point_address"=>$request->point_address,
            "point_location"=>$request->point_location,
            "point_working_hours"=>$request->point_working_hours,
            "point_manager_name"=>$request->point_manager_name,
            "point_manager_phone"=>$request->point_manager_phone
        ];
        $res = (new class () {
            use QVMTrait;
        })->postData($endpoint, $data);
        return $res;
    }
    public function groupOrderByCity($purchase_order_id){
        $purchase_order = PurchaseOrder::
            withCount('purchase_order_items')->with(['purchase_order_items', 'purchase_order_status',
            'payment_type',
            'payment_status',
            'payment_method',
            'shipping_type',
            'shipping_method',
            "seller_items"
            ])->find($purchase_order_id);
            
        foreach($purchase_order->seller_items as $item){
            $purchase_order->purchase_order_items->push($item);
        }

        $cities = $purchase_order->purchase_order_items->sortByDesc("branch_city_id")->unique("branch_city_id")->pluck("branch_city_id")->toArray();
        $purchase_order->items =  collect([]);
        $cities_names = $this->companyService->cities_by_cities_ids($cities, true);
        $tota_shipping_cost = 0;
        $shipping_prices_data = DeliveryCharge::whereIn("from_city_supplier", $cities)
            ->where("to_city_customer", $purchase_order->city_id)
            ->get();
        $total_estimate_time = $shipping_prices_data->max("duration");
        $shippingPrices = $shipping_prices_data->keyBy("from_city_supplier")->toArray();
        foreach( $cities as $city){
            $shipping_cost = $shippingPrices[$city]["cost"] ?? 0;
            $city_estimate_time = $shippingPrices[$city]["duration"] ?? 0;
            $tota_shipping_cost += $shipping_cost;
            $cityItemsWithStatus = $this->getPartialOrderStatus($purchase_order->purchase_order_items->where("branch_city_id",$city)->flatten());
            $purchase_order->items->push(["city_items"=>$cityItemsWithStatus, "status" => $cityItemsWithStatus->status, "shipping_cost" => $shipping_cost, "estimate_time_hours" => $city_estimate_time, "city_name" => $cities_names[$city], "city_id" => $city]);
        }
        $purchase_order->tota_shipping_cost = $tota_shipping_cost;
        $purchase_order->estimate_time = $total_estimate_time;
        return $purchase_order;
    }
    public function groupOrderBySeller($purchase_order_id){
        $purchase_order = PurchaseOrder::
            withCount('purchase_order_items')->with(['purchase_order_items', 'purchase_order_status',
            'payment_type',
            'payment_status',
            'payment_method',
            'shipping_type',
            'shipping_method',
            "seller_items"
            ])->find($purchase_order_id);
        foreach($purchase_order->seller_items as $item){
            $purchase_order->purchase_order_items->push($item);
        }
        $sellers = $purchase_order->purchase_order_items->sortByDesc("company_id")->unique("company_id")->pluck("company_id")->toArray();

        $purchase_order->items =  collect([]);
        $seller_names = $this->companyService->companies_by_company_ids($sellers, true);
        foreach( $sellers as $seller){
            $sellerItemsWithStatus = $this->getPartialOrderStatus($purchase_order->purchase_order_items->where("company_id",$seller)->flatten());
            $purchase_order->items->push(["seller_items"=>$sellerItemsWithStatus, "status" => $sellerItemsWithStatus->status, "seller_name" => $seller_names[$seller], "seller_id"=> $seller]);
        }
        return $purchase_order;
    }

    public function getPartialOrderStatus($items){
        $items_status = $items->unique("item_status")->pluck("item_status")->toArray();

        if(count($items_status) == 1){
            $status = $items_status[0];
        }else{
            $status = min($items_status);
        }
        $items->status = $status;
        return $items;
    }


}
