<?php

namespace App\Http\Resources\Audios;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AudioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'audio_id' => $this->id,
            'audio_title' => $this->title,
            'audio_details' => $this->details,
            'audio_content' => asset($this->content),
            'audio_project' => asset($this->project->image_cover),
            'audio_date' => $this->created_at->format('d/M/Y'),
            'audio_time' => $this->created_at->format('H:i A')
        ];
    }
}
