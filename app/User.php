<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    const USER_ROLE_ADMIN = 'admin';
    const USER_ROLE_BUSINESS_OWNER = 'business_owner';
    const USER_ROLE_EMPLOYEE = 'employee';

    const VALID_USER_ROLES = [
        self::USER_ROLE_ADMIN,
        self::USER_ROLE_BUSINESS_OWNER,
        self::USER_ROLE_EMPLOYEE,
    ];


}
