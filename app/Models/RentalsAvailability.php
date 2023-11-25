<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalsAvailability extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'rental_availability';

}
