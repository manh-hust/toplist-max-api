<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'nickname' => 'required|max:255',
            'content' => 'required',
            'email' => 'email'
        ];
    }

    public function messages()
    {
        return [
            'nickname.required' => 'nickname is required!',
            'nickname.max' => 'nickname is max 255 characters!',
            'content.required' => 'content is required!',
            'email.email' => 'email is invalid!'
        ];
    }
}
