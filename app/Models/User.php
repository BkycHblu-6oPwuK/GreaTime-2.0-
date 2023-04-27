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
    protected $guarded = false;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'tel',
        'surname',
        'inn',
        'street',
        'city',
        'region',
        'postal_code',
        'country',
        'status',
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
        'email_verified_at' => 'datetime',
    ];

    public function favourites()
    {
        return $this->hasMany(Favourites::class,'id_user','id');
    }

    public function basket()
    {
        return $this->hasMany(Busket::class,'id_user','id');
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class,'id_user','id');
    }

    public function orders()
    {
        return $this->hasMany(Orders::class,'id_user','id');
    }

    public function productsInBasket()
    {
        return $this->belongsToMany(Products::class,'busket','id_user','id_product');
    }

    public function productsInFavourites()
    {
        return $this->belongsToMany(Products::class,'favourites','id_user','id_product');
    }
}
