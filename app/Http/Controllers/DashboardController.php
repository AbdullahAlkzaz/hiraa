<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use App\Services\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Invoice\InvoiceRepositoryInterface;
use App\Repositories\Inventory\InventoryRepositoryInterface;
use App\Repositories\Safe\SafeRepositoryInterface;
use App\Models\Settings;
use App\Repositories\Product\ProductRepositoryInterface;

class DashboardController extends Controller
{
    private UserRepositoryInterface $repository;
    private Settings $settingsModel;
    public function __construct(UserRepositoryInterface $userRepository, Settings $settingsModel )
    {
        $this->repository = $userRepository;
        $this->settingsModel = $settingsModel;
    }
    public function show(){
        $sales = 0;
        $count_customers = 0;
        $count_products = 0;
        $revenue = 0;
        $count_order = 0;
        $transactions_by_descriptions = [];
        $wallet_withdraw = 0;
        $wallet_deposit = 0;
        $top_products = [];
        $inprogress_orders = [];
        $count_orders_in_progress = 0;
        $count_orders_completed = 0;
        $count_orders = 0;
        $inprogress_orders = Helpers::get_percentage_between($count_orders, $count_orders_completed);
        $companies = [];
        return view("dashboard", compact('transactions_by_descriptions', 'wallet_withdraw', 'wallet_deposit', 'top_products', 'inprogress_orders', 'count_orders_in_progress', 
        'count_orders_completed', 'count_customers', 'count_products', 'sales', 'revenue', 'count_orders', 'companies'));
    }
    public function editSettings(){
        $settings = $this->settingsModel->orderBy('id','desc')->first();
        return view('website.settings.edit')->with(['settings'=>$settings, 'title' => __('website.title_settings') ]);
    }
    public function updateSettings(SettingsRequest $request){
        if(session()->has('validation_message')){
            return redirect()->back()->withErrors(['message'=>session("validation_message")])->withInput();
        }
        $this->settingsModel->where('id',$request->id)->update([
            'app_name'=>$request->app_name,
            'app_phone'=>$request->app_phone,
            'address'=>$request->address,
        ]);
        return redirect()->back()->with(['success' => __("website.settings_updated_successfully")]);
    }
}
