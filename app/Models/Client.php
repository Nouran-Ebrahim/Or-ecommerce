<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable
{
    // use HasApiTokens, Notifiable, SoftDeletes;
    use HasApiTokens, Notifiable;
    protected $guarded = [];

    protected $table = 'clients';

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime'];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function favourites()
    {
        return $this->belongsToMany(Product::class, 'product_favourites', 'client_id', 'product_id');
    }
    public function WashList()
    {
        return $this->belongsToMany(Product::class, 'product_favourites', 'client_id', 'product_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function Country()
    {
        return $this->belongsTo(Country::class);
    }
}
