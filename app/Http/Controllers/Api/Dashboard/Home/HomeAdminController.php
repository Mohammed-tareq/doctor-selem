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
        $articales = Article::select('num_view')->sum('num_view');
        $books = Book::count();
        $audios = Audio::count();
        $users = Subscribe::count();

        $allUser = $articales + $books + $audios;

        $data = [
            'articales' => $articales,
            'books' => $books,
            'audios' => $audios,
            'users' => $users,
        ];
        return apiResponse(200, 'success', $data);

    }
}
