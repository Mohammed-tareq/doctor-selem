<?php

namespace App\Http\Controllers\Api\FrontEnd\Article;

use App\Http\Controllers\Controller;
use App\Http\Resources\Articles\ArticleCollection;
use App\Http\Resources\Articles\ArticleResource;
use App\Models\Article;

class ArticleController extends Controller
{
 public function getArticles()
{
    $search = request('keyword');
    $per_page = request('per_page', 9);

    $search = $search ? trim(strip_tags($search)) : null;

    $articles = Article::when($search, fn($q) => $q->where('title', 'like', "%{$search}%"))
        ->latest()
        ->paginate($per_page);

    if ($articles->isEmpty()) {
        return apiResponse(404, 'articles not found');
    }

    return apiResponse(200, 'success', new ArticleCollection($articles));
}

    public function getArticle($id)
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
            }
            else {
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
        return apiResponse(200, 'success', ArticleResource::make($article));
    }

}
