<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    
    public function projects()
    {
        return $this->hasMany(Project::class, 'category_id');
    }


    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id');
    }


    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id');
    }


    public function books()
    {
        return $this->hasMany(Book::class, 'category_id');
    }
}

