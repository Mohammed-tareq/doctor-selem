<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;
    protected $table = 'audios';

    protected $fillable = [
        'title',
        'content',
        'details',
        'project_id',
        'type',
        'num_view'
    ];


    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}


