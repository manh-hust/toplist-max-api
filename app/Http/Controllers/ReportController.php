<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Models\Report;
use App\Helpers\ApiResponse;
use App\Models\MassagePlace;

class ReportController extends Controller
{
    public function createReport(ReportRequest $request, $id)
    {
        $massagePlace = MassagePlace::find($id);
        if ($massagePlace == null) {
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
        $reports = Report::all();
        return ApiResponse::createSuccessResponse($reports);
    }

    public function getReportsById($id)
    {
        $massagePlace = MassagePlace::find($id);
        if ($massagePlace == null) {
            return ApiResponse::createFailedResponse(["Massage place not found!"], 404);
        }

        $reports = Report::where('massage_place_id', $id)->get();
        return ApiResponse::createSuccessResponse($reports);
    }
}
