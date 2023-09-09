<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    private Transaction $transactionModel;
    private User $userModel;
    public function __construct(Transaction $transactionModel, User $userModel)
    {
        $this->transactionModel = $transactionModel;
        $this->userModel = $userModel;
    }

    public function index(){
        $wallet = auth()->user()->wallet;
        $transactions = $this->transactionModel->where("wallet_id", $wallet->id)->where("show", 1)->paginate(10);
        return view("point.transactions.transactions")->with([
            'wallet' => $wallet,
            'transactions' => $transactions,
        ]);
    }

    public function send($user_id){
        $user = $this->userModel->find($user_id);
        if($user->wallet){
            $this->transactionModel->where("wallet_id", $user?->wallet?->id)->update(["show" => 1]);
            session()->flash('message', __("تم ارسال عمليات التحويل للعميل"));
            return back();
        }
        session()->flash('message', __("هذا العميل ليس لديه محغظة"));
        return back();
    }
}