<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePriceRequest;
use App\Http\Requests\UpdatePriceRequest;
use App\Models\Price;
use Illuminate\Http\Request;
use App\Services\ContactMethodService;


class PriceController extends Controller
{
    protected $contactMethodService;
    protected $priceModel;

    public function __construct(Price $priceModel, ContactMethodService $contactMethodService)
    {
        $this->priceModel = $priceModel;
        $this->contactMethodService = $contactMethodService;
    }
    public function index(Request $request)
    {
        $prices = $this->priceModel->where(function ($query) use ($request) {
            if (isset($request->title)) {
                $query->where("title", $request->title);
            }
        })->paginate(20);


        return view('hiraa.prices.index')->with([
            'prices' => $prices,
        ]);
    }

    
    public function show(Request $request)
    {
        $query = $this->priceModel->newQuery();
        
        if ($request->has('time') && trim($request->input('time')) !== '') {
            $query->where('lecture_duration', $request->input('time'));
        }
        
        if ($request->has('title') && trim($request->input('title')) !== '') {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }
        
        $prices = $query->paginate(20);

        foreach ($prices as $price) {
            $price->formatted_price = $this->formatPrice($price->price);
            $price->formatted_final_price = $this->formatPrice($price->final_price);
        }
        
        if ($request->ajax()) {
            return view('hiraa.prices.partials.prices', compact('prices'));
        }

        $contactIcons = $this->contactMethodService->getContactMethods();
        
        return view('hiraa.prices.show')->with([
            'prices' => $prices,
            'contactIcons' => $contactIcons,
        ]);
    }
 
    public function create()
    {
        return view("hiraa.prices.create");
    }

    public function store(CreatePriceRequest $request)
    {
        $data = $request->validated();
        
        if (isset($data['features']) && is_array($data['features'])) {
            $data['features'] = json_encode($data['features']);
        }        
        
        $price = $data['price'];
        $couponValue = $data['coupon'] ?? 0;
        $discountType = $data['discount_type'] ?? null;
        
        // التحقق من وجود الكوبون ونوع الخصم
        if ($discountType && !empty($couponValue)) {
            if ($discountType == 'percentage') {
                $data['final_price'] = $price - ($price * ($couponValue / 100));
            } elseif ($discountType == 'fixed') {
                $data['final_price'] = $price - $couponValue;
            } else {
                $data['final_price'] = $price;
            }
        } else {
            $data['final_price'] = $price; // بدون خصم إذا لم يتم تحديد نوع الخصم
        }
                
        // حساب تاريخ انتهاء الخصم إذا كانت مدة الكوبون محددة
        if (isset($data['coupon_time'])) {
            $data['coupon_end_date'] = now()->addDays($data['coupon_time']);
        }
                
        // $data = $request->validated();
        // dd($data); // تحقق من البيانات المرسلة وتأكد أن discount_type موجودة

        // إنشاء سجل السعر في قاعدة البيانات
        $this->priceModel->create($data);


        
        session()->flash('message', __("The price was created successfully."));
        
        return redirect()->route('prices.index');
    }

    

    public function edit($id)
    {
        $price = $this->priceModel->find($id);
        return view("hiraa.prices.edit", compact('price'));
    }

    public function update(UpdatePriceRequest $request, $id)
    {
        // إيجاد السعر بواسطة الـ ID
        $price = $this->priceModel->findOrFail($id);

        // تحديث البيانات العامة
        $validatedData = $request->validated();
        
        // تحديث الميزات (features)
        if ($request->has('features')) {
            $validatedData['features'] = json_encode($request->input('features'));
        }

        // تحديث السعر
        $price->update($validatedData);

        // إظهار رسالة نجاح
        session()->flash('message', __("تم تعديل التسعير بنجاح"));

        // إعادة التوجيه إلى صفحة الأسعار
        return redirect()->route('prices.index');
    }


    public function delete($id)
    {
        $this->priceModel->find($id)->delete();
        session()->flash('message', __("تم حذف التسعير بنجاح"));
        return back();
    }

    public function formatPrice($price)
    {
        // تنسيق السعر لإزالة الأصفار الزائدة
        return rtrim(rtrim(number_format($price, 2), '0'), '.');
    }

}
