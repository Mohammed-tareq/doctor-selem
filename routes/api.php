<?php

use App\Http\Controllers\Api\FrontEnd\Setting\SettingController;
use App\Http\Controllers\Api\FrontEnd\User\UserInfoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// =================================  User info ===========================//
Route::get('/user-info' , UserInfoController::class);
// =================================== end User info ===========================//

//=============================== setting =================================//
Route::get('/setting' , SettingController::class);
//=============================== End setting =================================//