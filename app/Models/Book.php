<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'lang',
        'summary',
        'images',
        'link',
        'publishing_house',
        'date',
        'type',
        'edition_number',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'datetime',
            'images' => 'json',
        ];
    }
}

