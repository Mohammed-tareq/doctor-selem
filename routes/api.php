<?php

use App\Http\Controllers\Api\Dashboard\Articale\ArticaleController;
use App\Http\Controllers\Api\Dashboard\Audio\AdminAudioController;
use App\Http\Controllers\Api\Dashboard\Auth\ForgetPasswordController;
use App\Http\Controllers\Api\Dashboard\Auth\LoginController;
use App\Http\Controllers\Api\Dashboard\Auth\ResetPasswordController;
use App\Http\Controllers\Api\Dashboard\Blog\AdminBlogController;
use App\Http\Controllers\Api\Dashboard\Book\BookAdminController;
use App\Http\Controllers\Api\Dashboard\Category\CategoryController;
use App\Http\Controllers\Api\Dashboard\Home\HomeAdminController;
use App\Http\Controllers\Api\Dashboard\Project\ProjectAudioController;
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


    // =================================== home page admin ======================//
    Route::get('/home-page', HomeAdminController::class);
    // =================================== end home page admin ======================//

    //=============================== get categories ================================//
    Route::get('/categories', [CategoryController::class, 'index']);
    //=============================== end categories ================================//

    // =================================== articles ======================//
    Route::controller(ArticaleController::class)->group(function () {
        Route::get('/articles', 'index');
        Route::prefix('article')->group(function () {
            Route::get('/{id}', 'show');
            Route::post('/store', 'store');
            Route::put('/update/{id}', 'update');
            Route::delete('/delete/{id}', 'delete');
        });
    });
    // =================================== end articles ======================//

    // =================================== blogs ======================//
    Route::controller(AdminBlogController::class)->group(function () {
        Route::get('/blogs', 'index');
        Route::prefix('blog')->group(function () {
            Route::get('/{id}', 'show');
            Route::post('/store', 'store');
            Route::put('/update/{id}', 'update');
            Route::delete('/delete/{id}', 'delete');
        });
    });
    // =================================== end blogs ======================//

    // =================================== books ======================//
    Route::controller(BookAdminController::class)->group(function () {
        Route::get('/books', 'index');
        Route::prefix('book')->group(function () {
            Route::get('/{id}', 'show');
            Route::post('/store', 'store');
            Route::put('/update/{id}', 'update');
            Route::delete('/delete/{id}', 'delete');
        });
    });
    // =================================== end books ======================//

    // =================================== Project ======================//
    Route::controller(ProjectAudioController::class)->group(function () {
        Route::get('/projects', 'index')->name('projects');
        Route::prefix('project')->group(function () {
            Route::get('/{id}', 'show');
            Route::post('/store', 'store');
            Route::put('/update/{id}', 'update');
            Route::delete('/delete/{id}', 'delete');
        });
    });
    // =================================== end project ======================//

    // =================================== Audio ======================//
    Route::controller(AdminAudioController::class)->prefix('audio')->group(function () {
            Route::post('/store', 'store');
            Route::put('/update/{id}', 'update');
            Route::delete('/delete/{id}', 'delete');
        });
    // =================================== end Audio ======================//


});

//==================================== end admin ==================================//
