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
        $data = [
            'project_id' => $this->id,
            'project_title' => $this->title,
            'project_image_cover' => asset('/public/'.$this->image_cover),
            'project_audio' => AudioResource::collection($this->whenLoaded('audios')),
        ];

        if($this->audios_count !== null) {
            $data['audios_count'] = $this->audios->count();
        }

        return $data;
    }
}
