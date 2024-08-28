<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePriceRequest;
use App\Http\Requests\UpdatePriceRequest;
use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    private Price $priceModel;
    public function __construct(Price $priceModel)
    {
        $this->priceModel = $priceModel;
    }

    public function index(Request $request)
    {
        $prices = $this->priceModel->where(function ($query) use ($request) {
            if (isset($request->title)) {
                $query->where("title", $request->title);
            }
        })->paginate(20);

        return view('hiraa.prices.prices')->with([
            'prices' => $prices,
        ]);
    }

    public function create()
    {
        return view("hiraa.prices.price_add");
    }

    public function store(CreatePriceRequest $request)
    {
        $data = $request->validated();

        if (isset($data['features']) && is_array($data['features'])) {
            $data['features'] = json_encode($data['features']);
        }

        // حساب السعر النهائي بناءً على نوع الخصم وقيمة الكوبون
        $price = $data['price'];
        $couponValue = $data['coupon'] ?? 0;
        $discountType = $data['discount_type'] ?? null;

        if ($discountType == 'percentage') {
            $data['final_price'] = $price - ($price * ($couponValue / 100));
        } elseif ($discountType == 'fixed') {
            $data['final_price'] = $price - $couponValue;
        } else {
            $data['final_price'] = $price; // إذا لم يتم تحديد نوع الخصم
        }

        // حساب تاريخ انتهاء الخصم إذا كانت مدة الكوبون محددة
        if (isset($data['coupon_time'])) {
            $data['coupon_end_date'] = now()->addDays($data['coupon_time']);
        }

        // إنشاء سجل السعر في قاعدة البيانات
        $this->priceModel->create($data);

        session()->flash('message', __("The price was created successfully."));

        return redirect()->route('prices.index');
    }


    public function edite($id)
    {
        $price = $this->priceModel->find($id);
        return view("hiraa.prices.price_view", compact('price'));
    }

    public function update(UpdatePriceRequest $request)
    {
        $this->priceModel->where("id", $request->id)->update($request->validated());
        session()->flash('message', __("تم تعديل التسعير بنجاح"));
        return back();
    }
    public function delete($id)
    {
        $this->priceModel->find($id)->delete();
        session()->flash('message', __("تم حذف التسعير بنجاح"));
        return back();
    }
}
