<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePriceRequest;
use App\Http\Requests\UpdatePriceRequest;
use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    private Price $priceModel;
    public function __construct(Price $priceModel) {
        $this->priceModel = $priceModel;
    }

    public function index(Request $request){
        $prices = $this->priceModel->where(function($query) use($request){
            if(isset($request->government)){
                $query->where("government", $request->government);
            }
            if(isset($request->area)){
                $query->where("area", $request->area);
            }
        })->paginate(10);
        return view("point.prices.prices")->with([
            'prices' => $prices,
        ]);
    }

    public function create(){
        return view("point.prices.price_add")->with([
            'sizes' => Price::SIZES,
        ]);
    }
    public function store(CreatePriceRequest $request){
        $this->priceModel->create($request->validated());
        session()->flash('message', __("تم انشاء التسعير بنجاح"));
        return redirect("prices"); 
    }

    public function show($id){
        $price = $this->priceModel->find($id);
        $sizes = Price::SIZES;
        return view("point.prices.price_view", compact('price', "sizes"));
    }

    public function update(UpdatePriceRequest $request){
        $this->priceModel->where("id", $request->id)->update($request->validated());
        session()->flash('message', __("تم تعديل التسعير بنجاح"));
        return back();
    }
    public function delete($id){
        $this->priceModel->find($id)->delete();
        session()->flash('message', __("تم حذف التسعير بنجاح"));
        return back();
    }
}
