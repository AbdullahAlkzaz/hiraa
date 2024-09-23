<?php

namespace App\Http\Requests;

use App\Models\Price;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePriceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->user()->hasRole("admin")){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'price' => 'required|numeric|min:0',
            'coupon' => 'nullable|numeric|min:0',
            'discount_type' => 'required|in:percentage,fixed', // التحقق من نوع الخصم
            'coupon_time' => 'nullable|numeric|min:0',
            'features' => 'required|array',
            'lecture_duration' => 'required|integer|in:30,45,60',
            'sessions_per_week' => 'required|integer|min:1',
        ];
    }
}
