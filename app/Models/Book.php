<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $table = 'books';

    protected $fillable = [
        'title',
        'lang',
        'summary',
        'images',
        'link',
        'publishing_house',
        'date',
        'edition_number',
        'pages',
        'category_id',
        'goals',
        'num_view'
    ];

    protected $casts = [
        'date' => 'date',
        'images' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

