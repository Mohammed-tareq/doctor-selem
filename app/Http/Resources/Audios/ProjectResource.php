<?php

namespace App\Http\Resources\Audios;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'project_id' => $this->id,
            'project_title' => $this->title,
            'project_image_cover' => $this->image_cover,
            'project_audio' => AudioResource::collection($this->whenLoaded('audios')),
        ];
    }
}
