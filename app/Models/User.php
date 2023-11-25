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
    protected $fillable = [
        'user_type',
        'display_picture',
        'user_name',
        'first_name',
        'last_name',
        'email',
        'gender',
        'phone',
        'dob',
        'otp',
        'lati',
        'longi',
        'license_number',
        'license_file',
        'user_type',
        'user_type',
        'password',
        'stripe_cus'
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

    public function get_certificates(){
        return $this->hasMany(Certificate::class,'user_id');
    }

    public function get_categories(){
        return $this->hasMany(UserCategories::class,'user_id');
    }

    public function get_booking(){
        return $this->hasMany(Bookings::class,'user_id');
    }

}
