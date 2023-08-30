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
            "id" => "required|integer|exists:prices,id",
            "government" => "required|string|min:2",
            "from_government" => "required|string|min:2",
            "area" => "required|string|min:2",
            "from_area" => "required|string|min:2",
            "price" => "required|numeric|min:1",
            "size" => "required|string|in:". implode(",", Price::SIZES),
        ];
    }
}
