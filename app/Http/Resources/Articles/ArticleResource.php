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
        $withSections = $this->relationLoaded('sections');

        $data = [
            "article_id" => $this->id,
            "article_title" => $this->title,
            'article_time' => $this->created_at->format('H:i A'),
            'article_date' => $withSections
                ? $this->year->format('Y')
                : $this->year->format('d/M/Y'),

            $this->mergeWhen($withSections, [
                'article_classification' => $this->whenLoaded('category') ? $this->category->title : null,
                'article_type' => $this->type,
                'article_author' => $this->writer,
                'article_publisher' => $this->post_by,
                'article_reference' => $this->reference,
                'total_word_count' => $this->total_word_count,
                'article_sections_count' => $this->sections()->count(),
                'article_sections' => SectionResource::collection($this->whenLoaded('sections')),
            ]),
        ];

        return $data;

    }
}
