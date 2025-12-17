<?php

namespace App\Http\Resources\Audios;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AudioCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'audios' => AudioResource::collection($this->collection),
            'count' => $this->count()
        ];
    }
}
