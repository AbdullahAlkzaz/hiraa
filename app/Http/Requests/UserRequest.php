<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Session;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(($this->path() == 'user/update' || $this->path() == 'user/permissions/update') && (!(auth()->user()->hasRole('admin') || auth()->user()->hasPermissionTo('modify-users') || auth()->user()->id == $this->id))){
            return false;
        }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->path() == 'users/update'){
            return [
                "id" => "required|exists:users,id|integer|min:1",
                "name" => "required|min:4|max:191",
                "email" => "required|email|min:8|max:191|unique:users,email," . $this->id,
                'phone' => 'required|regex:/(01)[0-9]{9}/unique:users,phone,' . $this->id, 
                'is_seller' => 'required|in:0,1',
                'id_image_front' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'id_image_back' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'date_of_pirth' => 'required|string',
                'gender' => 'required|in:0,1,2',
                'address_1' => 'required|string|min:3',
                'address_2' => 'required|string|min:3',
                'government' => 'required|string|min:3',
                'city' => 'required|string|min:2',
                'area' => 'required|string|min:2',
                'postal_code' => 'required|string',
                'shop_name' => 'required_if:is_seller,1',
                'product_category' => 'required_if:is_seller,1',
                'shop_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'shop_address' => 'required_if:is_seller,1',
                'activity_type' => 'required_if:is_seller,1|in:0,1,2',
                'breakable_product' => 'required_if:is_seller,1|in:0,1,2',
            ];
        }
        if($this->path() == 'users/store'){
            return [
                "email" => "required|email|unique:users,email|min:8|max:191",
                "password" => [
                    'required',
                    'min:6',
                    "max:191",
                    // 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
                    'confirmed'
                ],
                "name" => "required|min:4|max:191",
                'phone' => 'required|regex:/(01)[0-9]{9}/unique:users,phone', 
                'is_seller' => 'required|in:0,1',
                'id_image_front' => 'required|image|mimes:jpeg,png,jpg,gif',
                'id_image_back' => 'required|image|mimes:jpeg,png,jpg,gif',
                'date_of_pirth' => 'required|string',
                'gender' => 'required|in:0,1,2',
                'address_1' => 'required|string|min:3',
                'address_2' => 'required|string|min:3',
                'government' => 'required|string|min:3',
                'city' => 'required|string|min:2',
                'area' => 'required|string|min:2',
                'postal_code' => 'required|string',
                'shop_name' => 'required_if:is_seller,1',
                'product_category' => 'required_if:is_seller,1',
                'shop_logo' => 'required_if:is_seller,1|image|mimes:jpeg,png,jpg,gif',
                'shop_address' => 'required_if:is_seller,1',
                'activity_type' => 'required_if:is_seller,1|in:0,1,2',
                'breakable_product' => 'required_if:is_seller,1|in:0,1,2',
            ];
        }
        if($this->path() == 'companies/store'){
            return [
                "email" => "required|email|unique:users,email|min:8|max:191",
                "password" => [
                    'required',
                    'min:6',
                    "max:191",
                    'confirmed'
                ],
                "name" => "required|min:4|max:191",
                'phone' => 'required|regex:/(01)[0-9]{9}/|unique:users,phone',
                'address_1' => 'required|string|min:3',
                'address_2' => 'required|string|min:3',
                'government' => 'required|string|min:3',
                'city' => 'required|string|min:2',
                'area' => 'required|string|min:2',
                'postal_code' => 'required|string',
                'manager_name' => 'required|string',
                'manager_email' => 'required|email',
                'manager_phone' => 'required|regex:/(01)[0-9]{9}/',
                'tax_number' => 'required|string',
                'manager_national_number' => 'required|string',
            ];
        }
        if($this->path() == 'offices/store'){
            return [
                "email" => "required|email|unique:users,email|min:8|max:191",
                "password" => [
                    'required',
                    'min:6',
                    "max:191",
                    'confirmed'
                ],
                "name" => "required|min:4|max:191",
                'phone' => 'required|regex:/(01)[0-9]{9}/|unique:users,phone',
                'address_1' => 'required|string|min:3',
                'address_2' => 'required|string|min:3',
                'government' => 'required|string|min:3',
                'city' => 'required|string|min:2',
                'area' => 'required|string|min:2',
                'postal_code' => 'required|string',
                'manager_name' => 'required|string',
                'manager_email' => 'required|email',
                'manager_phone' => 'required|regex:/(01)[0-9]{9}/',
                'tax_number' => 'required|string',
                'manager_national_number' => 'required|string',
            ];
        }
        if($this->path() == 'companies/update'){
            return [
                "id" => "required|exists:users,id|integer|min:1",
                "email" => "required|email|min:8|max:191|unique:users,email," . $this->id,                "name" => "required|min:4|max:191",
                'phone' => 'required|regex:/(01)[0-9]{9}/unique:users,phone,' . $this->id, 
                'address_1' => 'required|string|min:3',
                'address_2' => 'required|string|min:3',
                'government' => 'required|string|min:3',
                'city' => 'required|string|min:2',
                'area' => 'required|string|min:2',
                'postal_code' => 'required|string',
                'manager_name' => 'required|string',
                'manager_email' => 'required|email',
                'manager_phone' => 'required|regex:/(01)[0-9]{9}/',
                'tax_number' => 'required|string',
                'manager_national_number' => 'required|string',
            ];
        }
        if($this->path() == 'offices/update'){
            return [
                "id" => "required|exists:users,id|integer|min:1",
                "email" => "required|email|min:8|max:191|unique:users,email," . $this->id,                "name" => "required|min:4|max:191",
                'phone' => 'required|regex:/(01)[0-9]{9}/unique:users,phone,' . $this->id, 
                'address_1' => 'required|string|min:3',
                'address_2' => 'required|string|min:3',
                'government' => 'required|string|min:3',
                'city' => 'required|string|min:2',
                'area' => 'required|string|min:2',
                'postal_code' => 'required|string',
                'manager_name' => 'required|string',
                'manager_email' => 'required|email',
                'manager_phone' => 'required|regex:/(01)[0-9]{9}/',
                'tax_number' => 'required|string',
                'manager_national_number' => 'required|string',
            ];
        }
        if($this->path() == 'users/permissions/update'){
            return [
                "id" => "required|exists:users,id|integer|min:1",
                "allowed"    => "array",
                "allowed.*"  => "string|distinct",
            ];
        }
        return [];
    }
    protected function failedValidation(Validator $validator)
    {
        Session::flash('validation_message', $validator->errors()->first()); 
    }
    public function messages()
    {
        return [
            "email.required" => __('auth.email_required'),
            "email.unique" =>  __("auth.user_already_exists"),
            "email.email" => __("auth.not_valid_email"),
            "email.min" => __("auth.email_min"),
            "email.max" => __("auth.email_max"),
            "email.exists" => __("auth.user_not_exists"),
            "id.exists" =>  __("auth.user_not_exists"),
            "password.required" => __("auth.password_required"),
            "password.confirmed" => __("auth.password_confirmed"),
            "password.min" => __("auth.password_min"),
            "password.max" => __("auth.password_max"),
            "password.regex" => __("auth.password_regex"),
            "name.required" => __("auth.name_required"),
            "name.min" =>  __("auth.name_min"),
            "name.max" =>  __("auth.name_max"),
            "token.required" => __("auth.token_required"),
            "token.exists" => __("auth.token_exists"),
        ];
    }

    protected function failedAuthorization()
    {
        session::flash('is_authorized',0);
    }
}
