<?php

namespace App\Http\Controllers\Api\FrontEnd\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Articles\ArticleResource;
use App\Http\Resources\Audios\ProjectResource;
use App\Http\Resources\Books\BookResource;
use App\Http\Resources\User\UserBusinessResource;
use App\Http\Resources\User\UserResource;
use App\Models\Article;
use App\Models\Audio;
use App\Models\Book;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = User::first();

        $articals = Article::count() ?? '0';
        $books_count = Book::count() ?? '0';
        $audios_count = Audio::count() ?? '0';
        $businesses = $user->businesses()->latest()->take(5)->get();

        if (!$businesses) apiResponse(404, 'businesses not found');

        $awords_count = $businesses->flatMap(function ($business) {
            return collect($business->content)
                ->where('type', 'work');
        })->count() ?? '0';

        if (!$user) apiResponse(404, 'user not found');

        $data = [
            'user_info' => UserResource::make($user),
            'articals_count' => $articals,
            'books_count' => $books_count,
            'audios_count' => $audios_count,
            'awords_count' => $awords_count,
            'business' => UserBusinessResource::collection($businesses),
            'books' => $this->getBooks(),
            'articles' => $this->getArticles(),
            'audios' => $this->getAudios(),
        ];
        return apiResponse(200, 'success', $data);

    }

    protected function getBooks()
    {
        $books = Book::latest()->take(3)->get();

        if (!$books) apiResponse(404, 'books not found');
        return BookResource::collection($books);
    }


    protected function getArticles()
    {
        $articles = Article::latest()->take(9)->get();

        if (!$articles) apiResponse(404, 'articles not found');
        return ArticleResource::collection($articles);
    }

    protected function getAudios()
    {
        $audios = Project::with(['audios' => fn($q) => $q->oldest()->take(1)])->oldest()->take(4)->get();

        if (!$audios) apiResponse(404, 'audios not found');
        return ProjectResource::collection($audios);
    }


}
