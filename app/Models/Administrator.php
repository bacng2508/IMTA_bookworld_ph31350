<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Administrator extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;

    protected $table = 'administrators';
    protected $fillable = [
        'name',
        'email',
        'avatar',
        'password',
        'tel',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
