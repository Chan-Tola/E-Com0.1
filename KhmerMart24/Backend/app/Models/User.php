<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Table name
    const TABLENAME = 'users';

    // Column names
    const NAME = 'name';
    const EMAIL = 'email';
    const PASSWORD = 'password';

    // Fillable fields
    const FILLABLE = [
        self::NAME,
        self::EMAIL,
        self::PASSWORD,
    ];

    // Hidden fields
    const HIDDEN = [
        self::PASSWORD,
        'remember_token',
    ];

    protected $fillable = self::FILLABLE;
    protected $hidden   = self::HIDDEN;
}
