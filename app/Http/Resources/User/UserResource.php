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
            'user_cv' => $this->cv,
            'user_personal' => $this->personal_aspect,
            'user_educational' => $this->educational_aspect,
            'user_image_cover' => $this->image_cover,
            'user_images' => $this->images,

        ];
    }
}
