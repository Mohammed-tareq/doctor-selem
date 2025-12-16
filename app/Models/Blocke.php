<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blocke extends Model
{
    use HasFactory;

    protected $table = 'blockes';

    protected $fillable = [
        'type',
        'content',
        'section_id',
    ];

    /**
     * Get the section that owns the block.
     */
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}

