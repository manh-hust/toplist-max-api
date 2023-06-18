<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Resources\MasseuseResource;
use Illuminate\Http\Request;
use App\Models\Masseuse;

class MasseuseController extends Controller
{
    public function getALlStaffs($id)
    {
        $staffs = Masseuse::with('masseuseServiceLanguages')->where('massage_place_id', $id)->get();

        if ($staffs->isEmpty())
            return ApiResponse::createFailedResponse(["No staffs found"], 404);

        return ApiResponse::createSuccessResponse(MasseuseResource::collection($staffs));
    }

    public function getStaff($id, $staffId)
    {
        $staff = Masseuse::with('masseuseServiceLanguages')->where('massage_place_id', $id)->where('id', $staffId)->first();

        if (!$staff)
            return ApiResponse::createFailedResponse(["No staff found"], 404);

        return ApiResponse::createSuccessResponse(new MasseuseResource($staff));
    }
}
