<?php

use App\Http\Controllers\Api\FrontEnd\Article\ArticleController;
use App\Http\Controllers\Api\FrontEnd\Audio\AudioController;
use App\Http\Controllers\Api\FrontEnd\Book\BookController;
use App\Http\Controllers\Api\FrontEnd\Setting\SettingController;
use App\Http\Controllers\Api\FrontEnd\User\UserInfoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// =================================  User info ===========================//
Route::get('/user-info', UserInfoController::class);
// =================================== end User info ===========================//


// ================================== Artilces ===========================//
Route::prefix('articles')->controller(ArticleController::class)->group(function () {
    Route::get('/', 'getArticles');
    Route::get('/{article_id}', 'getArticle');
});
// =================================== end Artilces ========================//


// ================================== Books ===========================//
Route::prefix('books')->controller(BookController::class)->group(function () {
    Route::get('/', 'getBooks');
});
// =================================== end books ========================//


// ================================== Audios ===========================//
Route::prefix('audios')->controller(AudioController::class)->group(function () {
    Route::get('/', 'getAudios');
});
// =================================== end Audios ========================//




//=============================== setting =================================//
Route::get('/setting', SettingController::class);
//=============================== End setting =================================//