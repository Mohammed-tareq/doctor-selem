<?php

namespace App\Http\Resources\Blogs;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'blog_id' => $this->id,
            'blog_title' => $this->title,
            'blog_date' => $this->created_at->format('d/M/Y'),
            'blog_time' => $this->created_at->format('g:i A'),
            'blog_views' => $this->num_view,
            'blog_image_cover' => asset($this->image_cover),
            $this->mergeWhen($this->whenLoaded('category'), [
                'blog_classification' =>$this->category->title,
                'blog_image_content' => asset($this->image_content),
                'blog_content' => $this->content,
            ])
        ];
    }
}
