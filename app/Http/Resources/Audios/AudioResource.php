<?php

namespace App\Http\Resources\Audios;

use App\Models\User;
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
        $withProject = $this->relationLoaded('project');
        $data = [
            'audio_id' => $this->id,
            'audio_title' => $this->title,
            'audio_details' => $this->details,
            'audio_project' =>  asset($this->project->image_cover) ?? null,
            'audio_date' => $this->created_at->format('d/M/Y'),
            'audio_time' => $this->created_at->format('g:i A'),
            'duration' => gmdate("i:s", $this->duration),

        ];
        if ($withProject) {
            $data['audio_content'] = asset($this->content);
            $data['audio_project'] = [
                'project_classfication' => $this->project->category->title,
                'project_title' => $this->project->title,

            ];
            $data['audio_type'] = $this->type;
        }
        return $data;
    }
}
