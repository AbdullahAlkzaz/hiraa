<?php

namespace App\Http\Requests;

use App\Models\Type;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Session;

class UpdateShipmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->user()->type_id == Type::OFFICE_TYPE || auth()->user()->hasRole("admin") ){
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
            "id" => "required|integer|exists:shipments,id",
            "user_id" => "required|integer|exists:users,id",
            "creator_type" => "required|string|in:admin,regular",
            "receiver_name" => "required|string",
            "receiver_phone" => "required|string",
            "receiver_address" => "required|string",
            "receiver_government" => "required|string",
            "receiver_area" => "required|string",
            "receiver_id" => "nullable|string",
            "is_receive" => "required|in:0,1",
            "coupon_code" => "nullable|string",
            "sender_id" => "required|string",
            "sender_name" => "required_if:creator_type,admin|string",
            "sender_phone" => "required_if:creator_type,admin|string",
            "sender_address" => "required_if:creator_type,admin|string",
            "sender_government" => "required_if:creator_type,admin|string",
            "sender_area" => "required_if:creator_type,admin|string",
            "product_description" => "required|string",
            "product_count" => "required|integer",
            "shipment_size" => "required|string",
            "company_id" => "required|integer|exists:users,id",
            "office_id" => "required_if:creator_type,regular|integer|exists:users,id",
            "client_price" => "required|numeric|min:1",
            "money_transfer_type" => "required|string",
            "point_price" => "required|numeric|min:1",
            "note" => "nullable|string",
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        Session::flash('validation_message', $validator->errors()->first());
    }
}
