<?php

namespace App\Http\Controllers\Api\Dashboard\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Audio;
use App\Models\Book;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $articales = Article::count();
        $books = Book::count();
        $audios = Audio::count();
        $users = Subscribe::count();
        $data = [
            'articales' => $articales,
            'books' => $books,
            'audios' => $audios,
            'users' => $users,
        ];
        return apiResponse(200, 'success', $data);

    }
}
