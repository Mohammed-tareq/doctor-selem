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
        'content',
    ];

    protected $casts = [
        'content' => 'json',
    ];

   
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
