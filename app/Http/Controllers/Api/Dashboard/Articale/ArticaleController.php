<?php

namespace App\Http\Controllers\Api\Dashboard\Articale;

use App\Http\Controllers\Controller;
use App\Http\Resources\Articles\ArticleCollection;
use App\Http\Resources\Articles\ArticleResource;
use App\Models\Article;

class ArticaleController extends Controller
{
    public function index()
    {
        $search = request('keyword', null);
        $per_page = request('per_page', 9);
        $search = $search ? trim(strip_tags($search)) : null;

        $articles = Article::when($search, fn($query) => $query->where('title', 'like', "%{$search}%"))
            ->latest()
            ->paginate($per_page);
        if($articles->isEmpty()) apiResponse(404, 'articles not found');

        return apiResponse(200, 'success',new  ArticleCollection($articles));
    }

    public function show($id)
    {
        $article = Article::with(['sections','category'])->find($id);
        if(!$article) apiResponse(404, 'article not found');
        return apiResponse(200, 'success', ArticleResource::make($article));

    }



    public function delete($id)
    {
        $article = Article::find($id);
        if(!$article) apiResponse(404, 'article not found');

        $article->delete();
        return apiResponse(200, 'article deleted successfully');
    }
}
