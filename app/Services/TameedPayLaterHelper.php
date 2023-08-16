<?php
namespace App\Services;
use App\Constants\ConstantsGeneral;
use App\Http\Traits\ApiTrait;
use App\Http\Traits\QVMTrait;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentRequest;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderStatus;
use GuzzleHttp\Client;
class TameedPayLaterHelper
{
    use ApiTrait;
    use QVMTrait;
    private Client $client;
    public function __construct(){
        $this->client = new Client([
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ]
        ]);
    }

    public function makeTameedRequest($data = []){
        $request_body = [];
        $total_price = 0;
        foreach($data['products'] as $product){
            $product['price'] = ceil($product['price']);
            $request_body['items'][] = [
                "product_id" => $product["product_id"],
                "price" => $product["price"],
                "quantity" => $product["quantity"],
                "description" => "description",
                "serial_no" => $product["product_id"],
            ];
            $total_price += $product["price"] * $product["quantity"];

        }
        $request_body['customer_id'] = $data["purchase_order"]->subscriber_id;
        $request_body['merchant_order_id'] = $data["purchase_order"]->id;
        $request_body["total_price"] = $total_price;
        $request_body["buyer_crnumber"] = $data["buyer_crnumber"];
        $request_body["merchant_crnumber"] = config("tameed.merchant_commercial_registeration_number");
        $request_body["back_jumb_url"] = config('app.redirect_url');
        $request_body["pay_back_days"] = $data["pay_back_days"];
        $response = $this->client->request("POST", config("tameed.payment_request_endpoint"),[
            "body" => json_encode($request_body)
        ]);
        $statu_code = $response->getStatusCode();
        $response = json_decode($response->getBody()->getContents());
        if($statu_code == 200 && $response->status == "1"){
            PurchaseOrder::find($data['purchase_order']->id)->update(["purchase_order_status_id" => PurchaseOrderStatus::TAMEED_WAITING_PAYMENT]);
            PaymentRequest::create([
                "subscriber_id" => $data["purchase_order"]->subscriber_company_id,
                "request_id" => $response->id,
                "purchase_order_id" => $data["purchase_order"]->id,
            ]);
        }
        return $response;
    }


    public function getRequestStatus($request_id){
        $response = $this->client->request("GET", config("tameed.payment_request_endpoint") . "/" . $request_id ."/status");
        $response = json_decode($response->getBody()->getContents());
        return $response;
    }

    
}
