<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RatingRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'nickname' => 'required|max:255',
            'content' => 'required',
            'email' => 'email',
            'point' => 'integer|min:0|max:5'
        ];
    }

    public function messages()
    {
        return [
            'nickname.required' => 'nickname is required!',
            'nickname.max' => 'nickname is max 255 characters!',
            'content.required' => 'content is required!',
            'email.email' => 'email is invalid!',
            'point.integer' => 'point is integer!',
            'point.min' => 'point is min 0!',
            'point.max' => 'point is max 5!'
        ];
    }
}
