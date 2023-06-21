<?php

namespace App\Http\Controllers;

use App\Models\MassagePlace;
use App\Helpers\ApiResponse;
use App\Http\Requests\MassagePlaceRequest;
use App\Http\Resources\MassagePlaceResource;
use Illuminate\Http\Request;
use App\Enums\PlaceStatus;
use Illuminate\Support\Facades\DB;
use App\Http\Services\MassagePlaceService;

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
            ->where("status", "=", PlaceStatus::ACTIVE)
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
        if (!$massagePlace || $massagePlace->status != PlaceStatus::ACTIVE) {
            return ApiResponse::createFailedResponse(["Massage place not found"], 404);
        }
        return ApiResponse::createSuccessResponse(new MassagePlaceResource($massagePlace));
    }

    public function requestRegister(MassagePlaceRequest $request)
    {
        $place = new MassagePlace();
        $place->name = $request->name;
        $place->address = $request->address;
        $place->area = $request->address;
        $place->review_content = $request->description;
        $place->photo_url = $request->photoUrl;
        $place->status = PlaceStatus::PENDING;
        $place->phone_number = $request->phoneNumber ? $request->phoneNumber : "";
        $place->service = $request->service ? $request->service : "Massage";
        $place->max_price = $request->maxPrice ? $request->maxPrice : 0;
        $place->min_price = $request->minPrice ? $request->minPrice : 0;

        $languages = $request->languages;
        $staffs = $request->staffs;

        DB::transaction(function () use ($place, $languages, $staffs) {
            $place->save();
            MassagePlaceService::addServiceLanguage($languages, $place->id);
            MassagePlaceService::addListStaff($staffs, $place->id);
        });

        return ApiResponse::createSuccessResponse([]);
    }

    public function upload(Request $request)
    {
        $file =  $request->file('image') ?  $request->file('image') : $request->file('photoUrl');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('images'), $fileName);
        return ApiResponse::createSuccessResponse(["url" => env("APP_URL", "http://localhost:8000") . "/images/$fileName"]);
    }
}
