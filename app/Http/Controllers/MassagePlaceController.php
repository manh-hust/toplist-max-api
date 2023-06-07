<?php

namespace App\Http\Controllers;

use App\Models\MassagePlace;
use App\Helpers\ApiResponse;
use App\Http\Resources\MassagePlaceResource;
use Illuminate\Http\Request;

class MassagePlaceController extends Controller
{
    protected const LIMIT = 10;
    protected const OFFSET = 0;

    public function getAllMassagePlaces(Request $request)
    {
        $limit = $request->get("limit") ?  (int)$request->get("limit") : self::LIMIT;
        $offset = $request->get("offset") ? (int)$request->get("offset") :  self::OFFSET;
        $rate = (int)$request->get("rate");
        $address = $request->get("address");
        $language = $request->get("language");

        $query = MassagePlace::query();

        if ($rate > 0) {
            $query->where("rate", "=", $rate);
        }
        if ($address) {
            $query->where("address", "like", "%$address%");
        }
        if ($language) {
            $query->whereHas(
                'serviceLanguages',
                function ($query) use ($language) {
                    $query->where('language', 'like', "%$language%");
                }
            );
        }
        $massagePlaces =  $query->with('serviceLanguages')
            ->limit($limit)
            ->offset($offset)
            ->get();

        $total = $query->count();

        $pageInfo = [
            "limit" => $limit,
            "offset" => $offset,
            "total" => $total
        ];

        return ApiResponse::createSuccessResponse([
            "massagePlaces" => MassagePlaceResource::collection($massagePlaces),
            "pageInfo" => $pageInfo
        ]);
    }

    public function getMassagePlace($id)
    {
        $massagePlace = MassagePlace::with('serviceLanguages')->find($id);
        if (!$massagePlace) {
            return ApiResponse::createFailedResponse(["Massage place not found"], 404);
        }
        return ApiResponse::createSuccessResponse(new MassagePlaceResource($massagePlace));
    }
}
