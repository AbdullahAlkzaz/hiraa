<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function setTransaction($data)
    {
        $transaction = $this->create($data);
        $wallet_debit_palance = $this->where("wallet_id",$data['wallet_id'])->where("type","debit")->sum("amount");
        $wallet_credit_palance = $this->where("wallet_id",$data['wallet_id'])->where("type","credit")->sum("amount");
        Wallet::where("id", $data['wallet_id'])->update([
            "debit_amount" => $wallet_debit_palance,
            "credit_amount" => $wallet_credit_palance,
        ]);
    }
}