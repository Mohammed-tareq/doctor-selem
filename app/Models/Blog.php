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
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'content' => 'json',
        ];
    }

    /**
     * Get the user who published the blog post.
     */
    public function publisherUser()
    {
        return $this->belongsTo(User::class, 'publisher');
    }
}

