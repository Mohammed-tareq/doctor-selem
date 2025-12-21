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

        $Articales = Article::sum('num_view');
        $Books = Book::sum('num_view');
        $Audios = Audio::sum('num_view');

        $mostView = max($Articales, $Books, $Audios);

        $allUser = $Articales + $Books + $Audios;

        $data = [
            'articales' => $articales,
            'books' => $books,
            'audios' => $audios,
            'user_subscribe' => $users,
            'user_views' => $allUser,
            'most_view' => $mostView,
        ];
        return apiResponse(200, 'success', $data);

    }
}
