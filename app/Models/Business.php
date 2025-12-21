<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $table = 'business';

    protected $fillable = [
        'start_date',
        'end_date',
        'content',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'content' => 'array',
        ];
    }

    /**
     * Get the user that owns the business.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

