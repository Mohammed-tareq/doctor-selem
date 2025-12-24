<?php

namespace App\Http\Controllers\Api\Dashboard\Articale;

use App\Events\NewAddEvent;
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
        if ($articles->isEmpty()) return apiResponse(404, 'articles not found');

        return apiResponse(200, 'success', new  ArticleCollection($articles));
    }

    public function show($id)
    {
        $article = Article::with(['sections', 'category'])->find($id);
        if (!$article) return apiResponse(404, 'article not found');
        return apiResponse(200, 'success', ArticleResource::make($article));
    }

    public function store(ArticleRequest $request)
    {
        $data = $request->validated();
        if (empty($data)) return apiResponse(422, 'validation error');
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

            $article->load('sections');
            foreach ($article->sections() as $section) {
                collect($section->content)->each(function ($item) {
                    if (is_array($item) && ($item['type'] ?? null) === 'image' && isset($item['content'])) {
                        ImageManagement::deleteImage($item['content']);
                    }
                });
            }

            $sections = collect($data['sections'] ?? [])->map(function ($section) {
                $section['content'] = collect($section['content'] ?? [])->map(function ($item) {
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
            DB::commit();
            $article->total_word_count = $this->getArticle($article->id);

            if ($article) {
                $eventData = $article->toArray();
                unset($eventData['category_id'], $eventData['created_at'], $eventData['updated_at'], $eventData['sections']);
                // event(new NewAddEvent($eventData));
            }
            return apiResponse(200, 'Article created successfully', ArticleResource::make($article));
        } catch (\Exception $e) {
            DB::rollBack();
            return apiResponse(500, 'Internal server error');
        }
    }

    public function update(ArticleRequest $request, $id)
    {
        $data = $request->validated();
        if (empty($data)) return apiResponse(422, 'validation error');
        try {
            DB::beginTransaction();

            $article = Article::with('sections')->find($id);
            if (!$article) return apiResponse(404, 'article not found');
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
        if (!$article) return apiResponse(404, 'article not found');
        collect($article->sections)->each(function ($section) {
            $contentItems = is_string($section->content)
                ? [['type' => $section->type, 'content' => $section->content]]
                : $section->content;

            collect($contentItems)->each(function ($item) {
                if (is_array($item) && ($item['type'] ?? null) === 'image' && isset($item['content'])) {
                    ImageManagement::deleteImage($item['content']);
                }
            });
        });
        $article->delete();
        return apiResponse(200, 'article deleted successfully');
    }

    protected function getArticle($id)
    {
        $article = Article::with([
            'sections',
            'category:id,title'
        ])->find($id);

        if (!$article) {
            return apiResponse(404, 'Article not found');
        }

        $totalSectionsWords = 0;

        $article->sections = $article->sections->map(function ($section) use (&$totalSectionsWords) {

            $section->word_count = 0;
            $content = $section->content; // already casted to array

            if (!$content) {
                return $section;
            }

            if (isset($content['type'])) {
                if ($content['type'] === 'text') {
                    $section->word_count = str_word_count(
                        strip_tags($content['content'] ?? ''),
                        0,
                        'أ-ي'
                    );
                }
            } else {
                foreach ($content as $item) {
                    if (($item['type'] ?? null) === 'text') {
                        $section->word_count += str_word_count(
                            strip_tags($item['content'] ?? ''),
                            0,
                            'أ-ي'
                        );
                    }
                }
            }

            $totalSectionsWords += $section->word_count;

            return $section;
        });

        $referencesText = is_array($article->references)
            ? implode(' ', $article->references)
            : ($article->references ?? '');

        $referencesWordCount = str_word_count(
            strip_tags($referencesText),
            0,
            'أ-ي'
        );

        $article->total_word_count = $totalSectionsWords + $referencesWordCount;
        return $article->total_word_count;
    }
}
