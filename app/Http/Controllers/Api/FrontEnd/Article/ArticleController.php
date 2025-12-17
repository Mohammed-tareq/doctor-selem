<?php

namespace App\Http\Controllers\Api\FrontEnd\Article;

use App\Http\Controllers\Controller;
use App\Http\Resources\Articles\ArticleCollection;
use App\Models\Article;

class ArticleController extends Controller
{
    public function getArticles()
    {

        $search = request('keyword', null);

        $articles = Article::when($search,
            fn($q) => $q->where("title", "like", "%$search%")
        )->latest()->paginate('9');

        if (!$articles) apiResponse(404, 'articles not found');

        return apiResponse(200, 'success',
            new ArticleCollection($articles)->response()->getData(true));

    }
}
