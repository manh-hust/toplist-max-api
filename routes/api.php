<?php

use App\Http\Controllers\MassagePlaceController;
use App\Http\Controllers\MasseuseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('massage-places')->group(function () {
    Route::get("/", [MassagePlaceController::class, "getAllMassagePlaces"]);
    Route::get("/{id}", [MassagePlaceController::class, "getMassagePlace"]);
    Route::post("/", [MassagePlaceController::class, "requestRegister"]);

    Route::get("/{id}/staffs", [MasseuseController::class, "getALlStaffs"]);
    Route::get("/{id}/staffs/{staffId}", [MasseuseController::class, "getStaff"]);

    Route::get("/{id}/comments", [CommentController::class, "getAllCommentsPlace"]);
    Route::post("/{id}/comments", [CommentController::class, "createComment"]);

    Route::get("/{id}/ratings", [RatingController::class, "getAllRatings"]);
    Route::post("/{id}/ratings", [RatingController::class, "createRating"]);

    Route::get("/{id}/reports", [ReportController::class, "getReportsById"]);
    Route::post("/{id}/reports", [ReportController::class, "createReport"]);
});


Route::prefix('admin')->group(function () {
    Route::post("/login", [AuthController::class, "login"]);

    Route::get("/massage-places/request", [MassagePlaceController::class, "getAllRequest"]);
    Route::post("/massage-places/approve", [MassagePlaceController::class, "approveRegister"]);
    Route::post("/massage-places/reject", [MassagePlaceController::class, "rejectRegister"]);

    Route::get("/reports", [ReportController::class, "getAllReports"]);
    Route::delete("/reports/{id}", [ReportController::class, "deleteReport"]);

    Route::get("/comments", [CommentController::class, "getAllComments"]);
    Route::delete("/comments/{id}", [CommentController::class, "deleteComment"]);
});

Route::post("/upload", [MassagePlaceController::class, "upload"]);
