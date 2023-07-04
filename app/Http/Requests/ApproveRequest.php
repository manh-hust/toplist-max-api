<?php

namespace App\Http\Requests;


class ApproveRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'id' => 'required|integer|exists:massage_places,id',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'id is required',
            'id.integer' => 'id must be integer',
            'id.exists' => 'id must be exists',
        ];
    }
}