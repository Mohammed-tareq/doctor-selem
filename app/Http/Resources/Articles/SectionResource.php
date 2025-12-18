<?php

namespace App\Http\Resources\Articles;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'section_order' => $this->order,
            'section_title' => $this->title,
            'section_content' => $this->content,

        ];
    }
}
