<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAudio extends Model
{
    use HasFactory;

    protected $table = 'category_audio';

    protected $fillable = [
        'title',
    ];

    /**
     * Get the audio files for the category.
     */
    public function audios()
    {
        return $this->hasMany(Audio::class, 'category_id');
    }
}

