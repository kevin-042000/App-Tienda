<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relación muchos a muchos con roles.
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // Cambié el nombre del método a camelCase
    public function roleUsers()
    {
        return $this->belongsToMany(Role::class, 'role_user')->withTimestamps();
    }
}
