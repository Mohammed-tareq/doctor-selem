<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'year',
        'category_id',
        'writer',
        'post_by',
        'references',
    ];

    protected function casts(): array
    {
        return [
            'year' => 'date',
            'references' => 'json',
        ];
    }

    /**
     * Get the sections for the article.
     */
    public function sections()
    {
        return $this->hasMany(Section::class, 'article_id');
    }

    /**
     * Get the category that owns the article.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}


