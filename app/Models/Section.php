<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'order',
        'article_id',
    ];

    /**
     * Get the article that owns the section.
     */
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    /**
     * Get the blocks for the section.
     */
    public function blockes()
    {
        return $this->hasMany(Blocke::class, 'section_id');
    }
}

