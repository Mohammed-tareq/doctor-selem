<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'content',
        'image_cover',
        'image_content',
        'publisher',
        'category_id',
        'num_view',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

