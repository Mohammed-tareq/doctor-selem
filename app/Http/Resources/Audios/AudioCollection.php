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
            'count' => $this->count(),
            'pagination' => [
                'total' => $this->total(),

                'current_page' => $this->currentPage(),

                'last_page' => $this->lastPage(),

                'per_page' => $this->perPage(),


                'from' => $this->firstItem(),
                'to'   => $this->lastItem(),
                'links' => [
                    'first' => $this->url(1),
                    'last'  => $this->url($this->lastPage()),
                    'prev'  => $this->previousPageUrl(),
                    'next'  => $this->nextPageUrl(),
                ],

                'pagination_links' => $this->linkCollection()->toArray(),
            ],
        ];
    }
}
