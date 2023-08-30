<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    private Coupon $couponModel;
    public function __construct(Coupon $couponModel) {
        $this->couponModel = $couponModel;
    }

    public function index(Request $request){
        $coupons = $this->couponModel->where(function($query) use($request){
            if(isset($request->code)){
                $query->where("code", $request->code);
            }
        })->paginate(10);
        return view("point.coupons.coupons")->with([
            'coupons' => $coupons,
        ]);
    }

    public function create(){
        return view("point.coupons.coupon_add");
    }
    public function store(CreateCouponRequest $request){
        $this->couponModel->create($request->validated());
        session()->flash('message', __("تم انشاءالكوبون بنجاح"));
        return redirect("coupons"); 
    }

    public function show($id){
        $coupon = $this->couponModel->find($id);
        return view("point.coupons.coupon_view", compact('coupon'));
    }

    public function update(UpdateCouponRequest $request){
        $this->couponModel->where("id", $request->id)->update($request->validated());
        session()->flash('message', __("تم تعديل الكوبون بنجاح"));
        return back();
    }
    public function delete($id){
        $this->couponModel->find($id)->delete();
        session()->flash('message', __("تم حذف الكوبون بنجاح"));
        return back();
    }
}
