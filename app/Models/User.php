<?php

namespace App\Models;

use App\Enums\UserRole;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    const ACTIVE_STATUS_DEFAULT = false;
    const CART_IDS_DEFAULT = '';
    const FIRST_NAME_DEFAULT = '';
    const LAST_NAME_DEFAULT = '';
    const ROLE_DEFAULT = UserRole::ROLE_USER;

    protected $attributes = [
        'first_name' => self::FIRST_NAME_DEFAULT,
        'last_name' => self::LAST_NAME_DEFAULT,
        'is_active' => self::ACTIVE_STATUS_DEFAULT,
        'role' => self::ROLE_DEFAULT,
    ];

    protected $fillable = [
        'username',
        'email',
        'first_name',
        'last_name',
        'is_active',
        'role',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'date:d/m/Y',
        'updated_at' => 'date:d/m/Y',
    ];

    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    public function setFullNameAttribute($value)
    {

        $names = explode(' ', $value);
        $this->first_name = $names[0] ?? '';
        $this->last_name = $names[1] ?? '';
    }

    public function scopeAdmin($query)
    {
        return $query->where('role', UserRole::ROLE_ADMIN);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function productReview()
    {
        return $this->hasMany(ProductReview::class);
    }
}
