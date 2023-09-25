<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Wishlist;
use App\Models\GuestHouse;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

//Tratti per le prenotazioni
use ShayanYS\LaraReserve\Interfaces\CustomerInterface;
use ShayanYS\LaraReserve\Traits\Customer;

class User extends Authenticatable implements CustomerInterface
{
    use HasApiTokens, HasFactory, Notifiable, customer;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_revisor'
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
        'password' => 'hashed',
    ];

    public function guest_houses(){
        return $this->hasMany(GuestHouse::class);
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }
    public function wishlist(){
        return $this->hasOne(Wishlist::class);
    }
}
