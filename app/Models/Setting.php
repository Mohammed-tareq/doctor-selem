<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'setting';
    public $timestamps = false;
    protected $fillable = [
        'site_name',
        'site_email',
        'site_phone',
        'facebook',
        'twitter',
        'linkin',
        'instagram',
        'footer',
    ];
}


