<?php

namespace App\Http\Services;

use App\Models\Masseuse;
use App\Models\ServiceLanguage;

class MassagePlaceService
{

    public static function addListStaff($listStaffs, $placeId)
    {
        $listStaffs = array_map(function ($staff) use ($placeId) {
            $staff["massage_place_id"] = $placeId;
            return $staff;
        }, $listStaffs);

        return Masseuse::insert($listStaffs);
    }

    public static function addServiceLanguage($listServiceLanguage, $placeId)
    {
        $listServiceLanguage = array_map(function ($serviceLanguage) use ($placeId) {
            $newServiceLanguage["message_place_id"] = $placeId;
            $newServiceLanguage["language"] = $serviceLanguage;
            return $newServiceLanguage;
        }, $listServiceLanguage);

        return ServiceLanguage::insert($listServiceLanguage);
    }

    public static function addRegisterRequest($placeInfo)
    {
    }

    public static function addNewPlace($requestId)
    {
    }
}
