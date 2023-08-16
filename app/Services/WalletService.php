<?php


namespace App\Services;

use App\Http\Traits\ApiTrait;
use App\Http\Traits\QVMTrait;
use App\Models\Config;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;

class WalletService
{

    protected $model;

    protected $transactionService;

    public function __construct(Wallet $model, TransactionService $transactionService)
    {
        $this->model = $model;
        $this->transactionService = $transactionService;
    }


    /**
     * Get the user balance of the wallet
     * @return mixed
     */
    public function balanceWallet()
    {
        return auth()->user()->balance();
    }


    /**
     * Deposit in wallet
     * @param $request
     * @param int $user_id
     * @param string $desc
     * @param int $status
     */
    public function deposit($request, int $user_id, string $desc, int $status = 1)
    {
        $wallet = $this->walletByUserId($user_id);
        $wallet->increment('balance', $request['amount']);
        $this->actionWallet($request, $wallet, $desc, 1, $status);
    }


    /**
     * Withdraw from wallet
     * @param $request
     * @param int $user_id
     * @param string $desc
     * @param int $status
     */
    public function withdraw($request, int $user_id, string $desc, int $status = 1)
    {
        $wallet = $this->walletByUserId($user_id);
        $wallet->decrement('balance', $request['amount']);
        $this->actionWallet($request, $wallet, $desc, 2, $status);
    }

    /**
     * Make an action in wallet
     * @param $request
     * @param $wallet
     * @param $desc
     * @param $type
     * @param int $status
     */
    public function actionWallet($request, $wallet, $desc, $type, $status = 1)
    {
        $this->transactionService->storeTransaction(
            $wallet,
            $request['amount'],
            $type,
            $status,
            $desc,
            $request['order_id'] ?? null,
            $request['balance'] ?? null
        );
    }


    /**
     * Get wallet by user id
     * @param $user_id
     * @return mixed
     */
    public function walletByUserId($user_id)
    {
        return $this->model->wallet($user_id);
    }

    public static function refund_money(
        $order_id,
        $user_id , $to_user_amount
    )
    {
        $endpoint = config('app.qvm_wallet_url') . '/transactions/refund-buyer-after-cancellation';
        try {
            $data = [
                "to_user_amount" => $to_user_amount,
                "order_id" => $order_id,
                "user_id" => $user_id,
            ];

            $res = (new class()
            {
                use QVMTrait;
            })->postData($endpoint, $data);

            return $res;
        } catch (\Throwable $th) {
            $ResponseMessage = __("Wallet MS down");
            $ApiTrait = (new class()
            {
                use ApiTrait;
            });
            $check_success = $ApiTrait->custom_error($ResponseMessage);
            return $check_success;
        }
    }

    public static function pay_by_wallet_by_order($purchaseOrder, $wallet_shipping_price, $tax, $amount_to_pay, $skip_seller_data = true)
    {
        $order_sellers_data = $sellers_request = [];
        if (!$skip_seller_data){
            $order_sellers_data = self::getOrderSellersData($purchaseOrder);
            $sellers_request = self::getSellersRequest($order_sellers_data);
        }
        $endpoint = config('urls.QVM_WALLET') . '/payment/withdraw_deposit';
        $res = false;

        try {
            $data = [
                "order_id" => $purchaseOrder->order_id,
                "amount" => $amount_to_pay,
                "seller_data" => $sellers_request,
                "shipping_price" => $wallet_shipping_price,
                "tax" => $tax,
            ];
            $res = (new class()
            {
                use QVMTrait;
            })->postData($endpoint, $data);


        } catch (\Throwable $th) {
            $ResponseMessage = __("Wallet MS down");
            $ApiTrait = (new class()
            {
                use ApiTrait;
            });
            return $ApiTrait->custom_error($ResponseMessage);
        }

        return $res;
    }

    private static function getOrderSellersData($purchaseOrder): array
    {
        $orderItems = $purchaseOrder->purchase_order_items->fresh();
        $sellers_data = [];
        foreach($orderItems as $item){
            $sellers_data[$item->company_id][] = $item;
        }
        return $sellers_data;
    }


    private static function getSellersRequest($order_sellers_data): array
    {
        $default_commission = DB::table("settings")->first();

        $sellers_commissions = Config::query()
            ->select(['company_id', 'seller_percentage'])
            ->whereNotNull('company_id')
            ->get()
            ->keyBy('company_id')
            ->toArray();

        $sellers_request = [];

        foreach($order_sellers_data as $key => $seller_data){
            $seller_deposit_amount = 0;
            $commission_value = 0;
            $tax = 0;
            $commission_percentage = isset($sellers_commissions[$key]) ? $sellers_commissions[$key]["seller_percentage"] : ($default_commission->default_commission ?? 0);

            foreach($seller_data as $seller_item){
                $price = $seller_item->original_price;
                $price_with_commission = $seller_item->price;

                $quantity = isset($seller_item->approved_quantity) && $seller_item->approved_quantity > 0 ? $seller_item->approved_quantity : $seller_item->quantity;
                $seller_deposit_amount += $price * $quantity;

                if (!empty($seller_item['default_sales_tax']) && $seller_item['default_sales_tax'] * 100 <= 100){
                    $default_sales_tax = $seller_item['default_sales_tax'] * 100;
                }else if (!empty($seller_item['default_sales_tax']) && $seller_item['default_sales_tax'] > 1 ){
                    $default_sales_tax = $seller_item['default_sales_tax'];
                }else{
                    $default_sales_tax = 15;
                }

                // @todo temporary change from suzan to make default tax 15%
                $default_sales_tax = 15;

                $tax += $price * $quantity * ($default_sales_tax / 100);
                $commission_value += $price_with_commission - $price;
            }
            $sellers_request[] = [
                "seller_id" => $key,
                "seller_deposit_amount" => $seller_deposit_amount,
                "commission_value" => $commission_value,
                "commission_percentage" => $commission_percentage,
                "tax" => $tax
            ];
        }

        return $sellers_request;
    }
}
