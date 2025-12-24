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
        $data = [
            'section_order' => $this->order,
            'section_title' => $this->title,
        ];
        $data['section_content'] = is_string($this->content)
            ? []
            : collect($this->content)->map(function ($item) {
                if($item['type'] !== 'text'){
                    return [
                        'type' => $item['type'],
                        'content' => $item['content'],
                    ];
                }
                return [
                    'type' => $item['type'],
                    'content' => asset('/public/'.$item['content'])
                ];
            })->toArray();
        return $data;
    }
}
