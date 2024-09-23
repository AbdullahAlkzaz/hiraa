<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAboutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->user()->hasRole("admin")){
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
            'media_type' => 'required|in:image,video',
            'image' => 'required_if:media_type,image|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Fixed mimes rule
            'video_link' => 'required_if:media_type,video|nullable|url',
            'description' => 'required|string' // Fixed require to required
        ];
    }
}
