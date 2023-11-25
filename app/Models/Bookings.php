<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    protected $table = 'bookings';

    protected $fillable = [
        'booking_code',
        'user_id',
        'comments',
        'reviews',
        'datetime',
        'duration',
        'insurance_amountion',
        'bookable_type',
        'booking_status',
        'adults',
        'rental_availability_id',
        'total'
    ];
}