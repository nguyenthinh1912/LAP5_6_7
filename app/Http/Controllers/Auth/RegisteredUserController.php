<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use HasFactory, Notifiable;

    protected $fillable = [
        'fullname', 'username', 'email', 'password', 'avatar', 'role', 'active'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
