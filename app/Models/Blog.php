<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';

    protected $fillable = [
        'title',
        'content',
        'image_cover',
        'type',
        'date',
        'publisher',
        'category_id',
        'num_view',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'content' => 'json',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

