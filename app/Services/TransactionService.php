<?php


namespace App\Services;


use App\Constants\ConstantsGeneral;
use App\Http\Traits\ApiResponse;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionService
{
    use ApiResponse;

    protected $model;

    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }

    public function getTransactions()
    {
        return $this->mainQuery()->paginate(ConstantsGeneral::PAGINATION_ITEMS_COUNT);
    }


    /**
     * Store Transaction Data In DB
     * @param $wallet
     * @param $amount
     * @param int $type
     * @param int $status
     * @param string $description
     * @param int|null $order_id
     * @param null $balance
     */
    public function storeTransaction($wallet, $amount, int $type, int $status, string $description, int $order_id = null, $balance = null)
    {
        // Get description transaction
        $description = DB::table('descriptions')->where('key', $description)->first();
        // Set transaction data
        $transaction = [
            'wallet_id' => $wallet->id,
            'user_id' => $wallet->user_id,
            'amount' => $amount,
            'type' => $type,
            'description_id' => $description->id,
            'balance' => $balance ?? $wallet->balance,
            'order_id' => $order_id,
            'status' => $status,
        ];

        $this->model->create($transaction);
    }


    /**
     * Make failure transaction
     * @param $user_wallet
     * @param $request
     * @param $type
     * @param $desc
     */
    public function failureTransaction($user_wallet, $request, $type, $desc)
    {
        $this->storeTransaction($user_wallet, $request['amount'], $type, 0, $desc, $request['order_id'] ?? null);
    }


    /**
     * Get key from array
     * @param $value
     * @param $array
     * @return bool|false|int|string
     * @throws \ErrorException
     */
    public function getIndex($value, $array)
    {
        $index = array_search($value, $array);
        if($index === false) {
            $this->throwException('The index not available');
        }
        return $index;
    }
    public function customerTransactions($customer_id, $data){
        $transactions = $this->model->with('wallet')->select('transactions.*', 'description_translations.description')
        ->leftjoin('description_translations', 'description_translations.description_id', '=', 'transactions.description_id')
        ->where('description_translations.locale', 'en')
        ->where('transactions.user_id', $customer_id)
        ->orderby('id', 'DESC')
        ->where(function ($query) use ($data) {
            if (isset($data['id']) && $data['id'] != null) {
                $query->where('transactions.id', 'like', '%' . $data['id'] . '%');
            }
            if (isset($data['user_id']) && $data['user_id'] != null) {
                $query->where('transactions.user_id', 'like', '%' . $data['user_id'] . '%');
            }
            if (isset($data['order_id']) && $data['order_id'] != null) {
                $query->where('transactions.order_id', 'like', '%' . $data['order_id'] . '%');
            }
            if (isset($data['bank_id']) && $data['bank_id'] != null) {
                $query->where('transactions.bank_id', 'like', '%' . $data['bank_id'] . '%');
            }
            if (isset($data['description_id']) && $data['description_id'] != 'all') {
                $query->where('transactions.description_id', $data['description_id']);
            }
            if (isset($data['type']) && $data['type'] != 'all') {
                $query->where('transactions.type', $data['type']);
            }
            if (isset($data['amount']) && $data['amount'] != null) {
                $query->where('transactions.amount', 'like', '%' . $data['amount'] . '%');
            }
            if (isset($data['balance']) && $data['balance'] != null) {
                $query->where('transactions.balance', 'like', '%' . $data['balance'] . '%');
            }
            if (isset($data['status']) && $data['status'] != 'all') {
                $query->where('transactions.status', $data['status']);
            }
            if (isset($data['created_at']) && $data['created_at'] != null) {
                $query->whereDate('transactions.created_at', $data['created_at']);
            }
        })
        ->paginate(20);

        $merchant_ids = [];
        $customer_ids = [];
        $others = [];
        foreach ($transactions as $transaction) {
            if (isset($transaction->wallet)) {
                if ($transaction->wallet->user_type == 'merchant') {
                    $merchant_ids[] = $transaction->user_id;
                } elseif ($transaction->wallet->user_type == 'customer') {
                    $customer_ids[] = $transaction->user_id;
                } else {
                    $others[] = $transaction->user_id;
                }
            } else {
                $others[] = $transaction->user_id;
            }
        }
        $companies = CompanyHelper::companies_by_company_ids($merchant_ids);
        $companies = CompanyHelper::company_to_array($companies);
        $subscribers = SubscriberHelper::subscribers_by_subscriber_ids($customer_ids);
        $subscribers = SubscriberHelper::subscriber_to_array($subscribers);
        foreach ($transactions as $transaction) {
            if (isset($transaction->wallet)) {
                if ($transaction->wallet->user_type == 'merchant') {
                    $user_name = (isset($companies[$transaction->user_id])) ? $companies[$transaction->user_id]['company_name'] : '-';
                    $transaction->user_name = $user_name;
                } elseif ($transaction->wallet->user_type == 'customer') {
                    $user_name = (isset($subscribers[$transaction->user_id])) ? $subscribers[$transaction->user_id]['subscriber_name'] : '-';
                    $transaction->user_name = $user_name;
                }
            } else {
                $user_name = "-";
            }
            $transaction->user_name = $user_name;
        }
        return $transactions;
    }

    public function mainQuery()
    {
        return $this->model->latest('transactions.id')
            ->where('transactions.user_id', auth()->id())
            ->where('description_translations.locale', app()->getLocale())
            ->join('description_translations', 'transactions.description_id', 'description_translations.description_id')
            ->select('transactions.*', 'description_translations.description');
    }

}
