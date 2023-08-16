<?php
namespace App\Services;

use App\Http\Traits\ApiTrait;
use App\Http\Traits\QVMTrait;
use Illuminate\Support\Facades\Http;

class TapPaymentHelper
{
    use ApiTrait;
    use QVMTrait;
    public static function create_charge($amount, $currency, $order_id)
    {
        $data = [
            "amount" => $amount,
            "currency" => "KWD",
            "threeDSecure" => true,
            "save_card" => false,
            "description" => "Test Description",
            "statement_descriptor" => "Sample",
            "metadata" => [
                "udf1" => "test 1",
                "udf2" => "test 2",
            ],
            "reference" => [
                "transaction" => "txn_0001",
                "order" => $order_id,
            ],
            "receipt" => [
                "email" => false,
                "sms" => true,
            ],
            "customer" => [
                "first_name" => "test",
                "middle_name" => "test",
                "last_name" => "test",
                "email" => "test@test.com",
                "phone" => [
                    "country_code" => "965",
                    "number" => "50000000",
                ],
            ],
            "merchant" => ["id" => ""],
            "source" => ["id" => "src_kw.knet"],
            "post" => ["url" => config('app.url') . "/api/v1/qvm/charge_post_data"],
             "redirect"=> ["url"=> config('app.qvm_url').'/app/orders/purchase/'.$order_id]
          //  "redirect" => ["url" => "http://localhost:3005/app/orders/purchase/" . $order_id],
        ];
        $token = config('app.tap_payment_live');
        $url = "https://api.tap.company/v2/charges";
        $response = Http::
            timeout(30)->
            acceptJson()->withToken($token)->post($url, $data);
        $ApiTrait = (new class()
        {
            use ApiTrait;
        });
        if (isset($response['errors'])) {
            $ResponseMessage = __("OOPS");
            $check_success = $ApiTrait->custom_error_with_data($ResponseMessage, $response['errors']);
            return $check_success;
        }
        $data = [];
        if (isset($response['id'])) {
            $data['charge_id'] = $response['id'];
        }
        if (isset($response['transaction']) && isset($response['transaction']['url'])) {
            $data['transaction_url'] = $response['transaction']['url'];
        }
        $ResponseMessage = __("Data retrieved successfully");
        $check_success = $ApiTrait->check_success($ResponseMessage, $data);
        return $check_success;
    }
    public static function retrieve_charge($charge_id)
    {
        $token = config('app.tap_payment_live');
        $url = "https://api.tap.company/v2/charges/" . $charge_id;
        $response = Http::
            timeout(30)->
            acceptJson()->withToken($token)->get($url);
        $ApiTrait = (new class()
        {
            use ApiTrait;
        });
        if (isset($response['errors'])) {
            $ResponseMessage = __("OOPS");
            $check_success = $ApiTrait->custom_error_with_data($ResponseMessage, $response['errors']);
            return $check_success;
        }
        $data = [];
        if (isset($response['id'])) {
            $data['charge_id'] = $response['id'];
        }
        if (isset($response['status'])) {
            $data['status'] = $response['status'];
        }
        $ResponseMessage = __("Data retrieved successfully");
        $check_success = $ApiTrait->check_success($ResponseMessage, $data);
        return $check_success;
    }
    public static function update_charge($charge_id)
    {
    }
    public static function list_charges()
    {
    }
    public static function check_charge($charge_id)
    {
        $response = self::retrieve_charge($charge_id);
        $response = json_decode($response->content(), true);
        $status = ['ABANDONED'];
        $data = [];
        if (isset($response['status']) && $response['status'] == true
            && isset($response['status_code']) && $response['status_code'] == 200) {
            $data = $response['data'];
            if (isset($data['status']) && in_array($data['status'], $status)) {
                return true;
            }
        }
        return false;
    }
}
