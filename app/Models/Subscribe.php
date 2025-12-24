<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subscribe extends Model
{
    use Notifiable;
    protected $fillable = ['email'];
}
