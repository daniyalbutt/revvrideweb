<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rentals extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

    public function Images()
    {
        return $this->hasMany(RentalsImages::class, 'rental_id', 'id');
    }

    public function addons()
    {
        return $this->hasMany(RentalsAddons::class, 'rental_id', 'id');
    }

    public function availability()
    {
        return $this->hasMany(RentalsAvailability::class, 'rental_id', 'id');
    }

}