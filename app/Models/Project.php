<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_cover',
        'category_id',
        'speaker',
    ];

    /**
     * Get the category that owns the project.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Get the audio files for the project.
     */
    public function audios()
    {
        return $this->hasMany(Audio::class, 'project_id');
    }
}

