<?php

namespace App\Http\Resources\Books;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $withCategory = $this->relationLoaded('category');
        $data = [
            'book_id' => $this->id,
            'book_name' => $this->title,
            'book_date' => $this->date->format('Y'),
            'image' => $withCategory? $this->images : $this->images[0],
            'publishing_house' => $this->publishing_house,
            $this->mergeWhen($withCategory, [
                'book_lang' => $this->lang,
                'book_pages' => $this->pages,
                'book_edition_number' => $this->edition_number,
                'book_classfiction' => $this->whenLoaded('category') ? $this->category->title : null,
                'book_goals' => $this->goals,
                'book_summary' => $this->summary,
            ])

        ];

        return $data;
    }
}
