<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    private Transaction $transactionModel;
    public function __construct(Transaction $transactionModel)
    {
        $this->transactionModel = $transactionModel;
    }

    public function index(){
        $wallet = auth()->user()->wallet;
        $transactions = $this->transactionModel->where("wallet_id", $wallet->id)->paginate(10);
        return view("point.transactions.transactions")->with([
            'wallet' => $wallet,
            'transactions' => $transactions,
        ]);
    }
}