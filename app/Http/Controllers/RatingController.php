<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\RatingRequest;
use App\Http\Resources\RatingResource;
use App\Models\Rating;
use App\Models\MassagePlace;

class RatingController extends Controller
{
    public function getAllRatings($id)
    {
        $ratings = Rating::where('massage_place_id', $id)->get();
        return ApiResponse::createSuccessResponse(RatingResource::collection($ratings));
    }

    public function createRating(RatingRequest $request, $id)
    {
        $massagePlace = MassagePlace::find($id);
        if (!$massagePlace)
            return ApiResponse::createFailedResponse(["Massage place not found"], 404);

        $rating = new Rating();
        $rating->nickname = request()->nickname;
        $rating->content = request()->content;
        $rating->massage_place_id = $id;
        if (request()->has('point')) {
            $rating->point = request()->point;
        } else
            $rating->point = 0;
        if (request()->has('email')) {
            $rating->email_address = request()->email;
        } else
            $rating->email_address = null;
        $rating->save();

        return ApiResponse::createSuccessResponse([]);
    }
}
