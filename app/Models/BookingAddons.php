<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingAddons extends Model
{
    protected $table = 'booking_addons';

    protected $fillable = [
        'booking_id',
        'rental_id',
        'rental_addons_id',
        'quantity',
        'amount',
        'total'
    ];

    public function getAddons(){
        return $this->hasOne(RentalsAddons::class, 'id', 'rental_addons_id');
    }
}