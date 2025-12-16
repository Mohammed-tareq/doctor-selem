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
        'classification',
        'writer',
        'post_by',
    ];

    protected function casts(): array
    {
        return [
            'year' => 'date',
        ];
    }

    /**
     * Get the sections for the article.
     */
    public function sections()
    {
        return $this->hasMany(Section::class, 'article_id');
    }
}

