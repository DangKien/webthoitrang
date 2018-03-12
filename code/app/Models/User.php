<?php

namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use NF\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use NF\Roles\Traits\HasRoleAndPermission;

class User extends Authenticatable implements HasRoleAndPermissionContract, CanResetPassword
{
    use Notifiable;
    use HasRoleAndPermission;
    use CanResetPasswordTrait;

    const STATUS_ACTIVE  = 1;
    const STATUS_PENDING = 0;
    protected $table     = "users";

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
}
