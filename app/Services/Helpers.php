<?php
namespace App\Services;
use App\Http\Traits\HelpTrait;
use App\Models\Order;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
class Helpers
{
    use HelpTrait;
    public static function round_total_price($total_price)
    {
        return round($total_price, 2);
        // return $total_price;
    }

    public static function tax_order_calculator($order_id)
    {
        $order = Order::find($order_id);
        $total_price = $order->price;
        $company_id = $order->company_id;
        $companies = CompanyHelper::companies_by_company_ids([$company_id]);
        $default_sales_tax = (isset($companies[0])) ? $companies[0]['defaultSalesTax'] : 0;
        $order->default_sales_tax = $default_sales_tax;
        $order->update();
        $tax = $total_price * $default_sales_tax;
        return $tax;
    }
    public static function purchase_order_tax($order_id, $total_price)
    {
        $order = Order::find($order_id);
        $default_sales_tax = $order->default_sales_tax;
        $tax =  $total_price * $default_sales_tax;
        return $tax;
    }


    public static function calculate_order_tax($order_id)
    {
        $order = Order::find($order_id);
        $tax = $order->price * $order->default_sales_tax;
        return $tax;
    }


  
 
 
        public static function get_percentage_between($total, $number)
        {
          if ( $total > 0 ) {
           return round($number / ($total / 100),2);
          } else {
            return 0;
          }
        }
    

   
 

    public static function money_format($amount)

    {

        $amount = round($amount, 2);
        // return __("SAR") . number_format($amount, 2);
        return   number_format($amount, 2);

    }



    public function paginate($items, $perPage = 10, $page = null, $options = [], $path = '/', $size = 10)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        $items = new LengthAwarePaginator($items, $size, $perPage, $page, $options);
        $items->setPath($path);
        
        return $items;
    }

  
}
