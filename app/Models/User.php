<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    public const SUPPER_ADMIN_ROLE = 1;
    public const ADMIN_ROLE = 2;
    public const STAFF_ROLE = 3;
    public const USER_ROLE = 0;

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function banners()
    {
        return $this->hasMany(Banner::class, foreignKey:'user_id', localKey:'id');
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class, foreignKey:'user_id', localKey:'id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, foreignKey:'user_id', localKey:'id');
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class, foreignKey:'user_id', localKey:'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, foreignKey:'user_id', localKey:'id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, foreignKey:'user_id', localKey:'id');
    }
}
