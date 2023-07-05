<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $username = config('app.username');
        $password = config('app.password');

        if ($request->username != $username || $request->password != $password) {
            return ApiResponse::createFailedResponse(['Username or password is incorrect'], 401);
        }

        return ApiResponse::createSuccessResponse(['token' => '123456789']);
    }
}
