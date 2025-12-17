<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'lang',
        'summary',
        'images',
        'link',
        'publishing_house',
        'date',
        'type',
        'edition_number',
        'pages',
        'category_id',
        'goals',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'images' => 'json',
        ];
    }

    /**
     * Get the category that owns the book.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

