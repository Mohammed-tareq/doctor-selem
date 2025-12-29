<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_name' => $this->name,
            'user_full_name' => $this->full_name,
            'user_cv' => asset('/public/'.$this->cv),
            'user_personal' => $this->personal_aspect,
            'user_educational' => $this->educational_aspect,
            'user_image_cover' => asset('/public/'.$this->image_cover),
            'user_images' => collect($this->images)->map(function ($image) {
                return asset('/public/'.$image);
            })->toArray(),

        ];
    }
}
