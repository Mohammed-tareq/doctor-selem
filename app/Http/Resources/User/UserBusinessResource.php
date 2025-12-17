<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserBusinessResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'start_date' => $this->start_date->format('Y'),
            'end_date' => $this->start_date->format('Y'),
            'content' => collect($this->content)
                ->pluck('content')
                ->values(),
        ];
    }
}
