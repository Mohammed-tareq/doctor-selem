<?php

namespace App\Http\Resources\Articles;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            "article_id" => $this->id,
            "article_title" => $this->title,
            'article_time' => $this->created_at->format('H:i A'),
            'article_date' => $this->year->format('d/M/Y'),
        ];

        return $data;

    }
}
