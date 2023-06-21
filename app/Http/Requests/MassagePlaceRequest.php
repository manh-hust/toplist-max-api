<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MassagePlaceRequest extends BaseRequest
{

    public function rules()
    {
        return [
            "name" => "required|unique:massage_places,name",
            "address" => "required",
            "description" => "required",
            // "photoUrl" => "required",
            "languages" => "required|array|min:1",
            "languages.*" => "required|string|distinct",
            "staffs" => "required|array|min:1",
            "staffs.*.name" => "required",
            "staffs.*.age" => "required|integer|min:18",
            "staffs.*.experience" => "required|integer|min:0",
            // "staffs.*.image" => "required",
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Name is required",
            "name.unique" => "Name already exist",
            "address.required" => "Address is required",
            "description.required" => "Description is required",
            "photoUrl.required" => "PhotoUrl is required",
            "languages.required" => "Languages is required",
            "languages.array" => "Languages must be an array",
            "languages.min" => "Languages must have at least 1 item",
            "languages.*.required" => "Language is required",
            "languages.*.string" => "Language must be a string",
            "languages.*.distinct" => "Language must be unique",
            "staffs.required" => "Staffs is required",
            "staffs.array" => "Staffs must be an array",
            "staffs.min" => "Staffs must have at least 1 item",
            "staffs.*.name.required" => "Staff name is required",
            "staffs.*.age.required" => "Staff age is required",
            "staffs.*.age.integer" => "Staff age must be an integer",
            "staffs.*.age.min" => "Staff age must be greater than or equal to 18",
            "staffs.*.experience.required" => "Staff experience is required",
            "staffs.*.experience.integer" => "Staff experience must be an integer",
            "staffs.*.experience.min" => "Staff experience must be greater than or equal to 0",
            "staffs.*.image.required" => "Staff image is required",
        ];
    }
}
