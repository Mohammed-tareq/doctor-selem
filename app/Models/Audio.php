<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'details',
        'category_id',
    ];

    /**
     * Get the category that owns the audio.
     */
    public function category()
    {
        return $this->belongsTo(CategoryAudio::class, 'category_id');
    }
}

