<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable  = [
        'lastname',
        'firstname',
        'sex',
        'username',
        "email",
        "phone",
        'address',
        "password",
        "createDay",
        'image',
        "status",
        "member_id",
        'role',
        'birthday',
        'language',
        'address_shipping',
        'order_item_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];
    public $timestamps = false;
    protected $primaryKey = 'id';
    public  const ROLE = [
        'admin' => 1,
        'customer' => 2,
    ];
    //Role user
    public const STATUS = [
        'active' => 1,
        'is_active' => 2
    ];
}
