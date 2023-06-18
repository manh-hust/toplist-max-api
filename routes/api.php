<?php

use App\Http\Controllers\MassagePlaceController;
use App\Http\Controllers\MasseuseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReportController;

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

Route::get("/massage-places", [MassagePlaceController::class, "getAllMassagePlaces"]);
Route::get("/massage-places/{id}", [MassagePlaceController::class, "getMassagePlace"]);
Route::get("/massage-places/{id}/staffs", [MasseuseController::class, "getALlStaffs"]);
Route::get("/massage-places/{id}/staffs/{staffId}", [MasseuseController::class, "getStaff"]);
Route::get("/massage-places/{id}/comments", [CommentController::class, "getAllComments"]);
Route::post("/massage-places/{id}/comments", [CommentController::class, "createComment"]);
Route::post("/massage-places/{id}/reports", [ReportController::class, "createReport"]);
