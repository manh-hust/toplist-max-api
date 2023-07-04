<?php

namespace App\Http\Controllers;

use App\Enums\PlaceStatus;
use App\Http\Requests\ReportRequest;
use App\Models\Report;
use App\Helpers\ApiResponse;
use App\Models\MassagePlace;
use App\Http\Resources\ReportResource;

class ReportController extends Controller
{
    public function createReport(ReportRequest $request, $id)
    {
        $massagePlace = MassagePlace::find($id);
        if ($massagePlace == null || $massagePlace->status != PlaceStatus::ACTIVE) {
            return ApiResponse::createFailedResponse(["Massage place not found!"], 404);
        }

        $report = new Report();
        $report->nickname = request()->nickname;
        $report->content = request()->content;
        $report->massage_place_id = $id;
        if (request()->has('email')) {
            $report->email_address = request()->email;
        } else
            $report->email_address = null;
        $report->save();

        return ApiResponse::createSuccessResponse([]);
    }

    public function getAllReports()
    {
        $reports = Report::with('massagePlace')->get();
        return ApiResponse::createSuccessResponse(ReportResource::collection($reports));
    }

    public function getReportsById($id)
    {
        $massagePlace = MassagePlace::find($id);
        if ($massagePlace == null || $massagePlace->status != PlaceStatus::ACTIVE) {
            return ApiResponse::createFailedResponse(["Massage place not found!"], 404);
        }

        $reports = Report::where('massage_place_id', $id)->get();
        return ApiResponse::createSuccessResponse($reports);
    }

    public function deleteReport($id)
    {
        $report = Report::find($id);
        if ($report == null) {
            return ApiResponse::createFailedResponse(["Report not found!"], 404);
        }
        $report->delete();
        return ApiResponse::createSuccessResponse([]);
    }
}
