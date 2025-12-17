<?php

namespace App\Http\Resources\Books;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'book_id' => $this->id,
            'book_name' => $this->title,
            'date' => $this->date->format('Y'),
            'image_cover' => $this->images[0],
            'publishing_house' => $this->publishing_house    ,
        ];

        return $data;
    }
}
