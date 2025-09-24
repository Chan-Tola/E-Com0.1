<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon; 

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    // Table name 
    const TABLENAME = 'users';

    // Column names
    const USERNAME = 'username';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const FULLNAME = 'fullname';
    const STATUS = 'status';
    const LAST_SEEN_AT = 'last_seen_at';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const PHONE_NUMBER = 'phone_number';
    const USER_TYPE = 'user_type';
    const PROFILE_IMAGE = 'profile_image';

    // active status
    const STATUS_ACTIVE = 'active';
    const STATUS_OFFLINE = 'offline';

    // uset types
    CONST USER_TYPE_BUSSINESS = 'business';
    CONST USER_TYPE_INDIVIDUALT = 'individualt';


    // Fillable fields
    const FILLABLE = [
        self::USERNAME,
        self::EMAIL,
        self::PASSWORD,
        self::FULLNAME,
        self::STATUS,
        self::LAST_SEEN_AT,
        self::PHONE_NUMBER,
        self::USER_TYPE,
        self::PROFILE_IMAGE,
    ];

    // Hidden fields
    const HIDDEN = [
        self::PASSWORD,
        'remember_token',
    ];

    protected $fillable = self::FILLABLE;
    protected $hidden   = self::HIDDEN;

    // cast property
    protected $casts = [
        self::LAST_SEEN_AT => 'datetime',
    ];

    public function setActive()
    {
        $this->update([
            self::STATUS => self::STATUS_ACTIVE,
            self::LAST_SEEN_AT => now(),
        ]);
    }

    public function setOffline()
    {
        $this->update([
            self::STATUS => self::STATUS_OFFLINE,
            self::LAST_SEEN_AT => now(),
        ]);
    }

    public function isActive()
    {
        return $this->{self::STATUS} === self::STATUS_ACTIVE;
    }

    public function isOffline()
    {
        return $this->{self::STATUS} === self::STATUS_OFFLINE;
    }

    public function getLastSeen()
    {
        if ($this->{self::LAST_SEEN_AT}) {
            return $this->{self::LAST_SEEN_AT}->diffForHumans();
        }
        return 'Never';
    }
}
