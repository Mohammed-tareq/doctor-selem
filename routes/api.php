<?php

use App\Http\Controllers\Api\Dashboard\Auth\ForgetPasswordController;
use App\Http\Controllers\Api\Dashboard\Auth\LoginController;
use App\Http\Controllers\Api\Dashboard\Auth\ResetPasswordController;
use App\Http\Controllers\Api\FrontEnd\Article\ArticleController;
use App\Http\Controllers\Api\FrontEnd\Audio\AudioController;
use App\Http\Controllers\Api\FrontEnd\Blog\BlogController;
use App\Http\Controllers\Api\FrontEnd\Book\BookController;
use App\Http\Controllers\Api\FrontEnd\Setting\SettingController;
use App\Http\Controllers\Api\FrontEnd\Subscribe\SubcribeController;
use App\Http\Controllers\Api\FrontEnd\User\UserInfoController;
use Illuminate\Support\Facades\Route;


// =================================  User info ===========================//
Route::get('/home-info', UserInfoController::class);
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
    Route::get('/{book_id}', 'getBook');
});
// =================================== end books ========================//
// ================================== Blogs ===========================///
Route::prefix('blogs')->controller(BlogController::class)->group(function () {
    Route::get('/', 'getBlogs');
    Route::get('/{blog_id}', 'getBlog');
});
// =================================== end blogs ========================//
// ================================== Audios ===========================//
Route::prefix('audios')->controller(AudioController::class)->group(function () {
    Route::get('/', 'getAudios');
    Route::get('/{audio_id}', 'getAudio');
});
// =================================== end Audios ========================//
//=============================== setting =================================//
Route::get('/setting', SettingController::class);
//=============================== End setting =================================//
// ================================ subscribe  ================================//
Route::post('/subscribe', SubcribeController::class);
// ================================ end subscribe  ================================//


//==================================== start admin ==================================//

//===================================== Auth ========================================//
Route::post('/auth-login', [LoginController::class, 'login']);
Route::post('/forget-password', ForgetPasswordController::class);
Route::post('/reset-password', ResetPasswordController::class);
//===================================== end Auth ========================================//


Route::prefix('admin')->middleware('auth:sanctum')->group(function () {

    Route::get('/user', function () {
        return auth()->user();
    });
    Route::delete('/logout', [LoginController::class, 'logout']);
});

//==================================== end admin ==================================//
Route::fallback(function () {
    return apiResponse(405, 'Bad Request');
});