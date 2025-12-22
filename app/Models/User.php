<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable , HasApiTokens;


    protected $fillable = [
        'name',
        'full_name',
        'email',
        'password',
        'bio',
        'cv',
        'personal_aspect',
        'educational_aspect',
        'image_cover',
        'images',
        'phone',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'images' => 'array',
        ];
    }


    public function businesses()
    {
        return $this->hasMany(Business::class);
    }
}
