<?php

namespace App\Http\Controllers\Api\Dashboard\Articale;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleRequest;
use App\Http\Resources\Articles\ArticleCollection;
use App\Http\Resources\Articles\ArticleResource;
use App\Http\Utils\ImageManagement;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

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
        if ($articles->isEmpty()) apiResponse(404, 'articles not found');

        return apiResponse(200, 'success', new  ArticleCollection($articles));
    }

    public function show($id)
    {
        $article = Article::with(['sections', 'category'])->find($id);
        if (!$article) apiResponse(404, 'article not found');
        return apiResponse(200, 'success', ArticleResource::make($article));

    }

    public function store(ArticleRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $article = Article::create([
                'title' => $data['title'],
                'type' => $data['type'],
                'year' => $data['year'],
                'category_id' => $data['category_id'],
                'writer' => $data['writer'] ?? auth()->user()->name,
                'post_by' => $data['post_by'],
                'references' => $data['references'] ?? null,

            ]);
            if (!$article) return apiResponse(500, 'Internal server error');
            $sections = collect($data['sections'])->map(function ($section) {
                $section['content'] = collect($section['content'])->map(function ($item) {
                    if ($item['type'] === 'image' && $item['content'] instanceof \Illuminate\Http\UploadedFile) {
                        $item['content'] = ImageManagement::uploadImage($item['content'], 'image');
                    }
                    if ($item['type'] === 'video' && $item['content'] instanceof \Illuminate\Http\UploadedFile) {
                        $item['content'] = ImageManagement::uploadImage($item['content'], 'video');
                    }
                    return $item;
                })->toArray();

                return $section;
            })->toArray();

            $article->sections()->createMany($sections);
            $article->load('sections');
            if (!$article->exists()) return apiResponse(500, 'Internal server error');
            DB::commit();
            return apiResponse(200, 'Article created successfully', ArticleResource::make($article));
        } catch (\Exception $e) {
            DB::rollBack();
            return apiResponse(500, 'Internal server error');
        }

    }

    public function update(ArticleRequest $request, $id)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $article = Article::with('sections')->find($id);
            if (!$article) apiResponse(404, 'article not found');
            $article->update([
                'title' => $data['title'] ?? $article->title,
                'type' => $data['type'] ?? $article->type,
                'year' => $data['year'] ?? $article->year,
                'category_id' => $data['category_id'] ?? $article->category_id,
                'writer' => $data['writer'] ?? $article->writer,
                'post_by' => $data['post_by'] ?? $article->post_by,
                'references' => $data['references'] ?? $article->references,
            ]);

            if (isset($data['sections'])) {
                foreach ($data['sections'] as $section) {
                    $section['content'] = collect($section['content'])->map(function ($item) {
                        if ($item['type'] === 'image' && $item['content'] instanceof \Illuminate\Http\UploadedFile) {
                            $item['content'] = ImageManagement::uploadImage($item['content'], 'image');
                        }
                        if ($item['type'] === 'video' && $item['content'] instanceof \Illuminate\Http\UploadedFile) {
                            $item['content'] = ImageManagement::uploadImage($item['content'], 'video');
                        }
                        return $item;
                    })->toArray();

                    $article->sections()->updateOrCreate(
                        ['id' => $section['id'] ?? null],
                        [
                            'title' => $section['title'],
                            'order' => $section['order'],
                            'content' => $section['content'],
                        ]
                    );
                }
            }

            $article->load('sections');

            DB::commit();
            return apiResponse(200, 'Article updated successfully', ArticleResource::make($article));

        } catch (\Exception $e) {
            DB::rollBack();
            return apiResponse(500, $e->getMessage());
        }
    }

    public function delete($id)
    {
        $article = Article::find($id);
        if (!$article) apiResponse(404, 'article not found');

        $article->delete();
        return apiResponse(200, 'article deleted successfully');
    }
}
