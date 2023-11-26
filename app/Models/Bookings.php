<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
        'total',
        'transaction_id'
    ];
    public function bookable()
    {
        return $this->morphTo();
    }
    public function getBookType(){
        return $this->hasOne($this->bookable_type, 'id', 'bookable_id');
    }

    public function checkPast(){
        if($this->datetime != null){
            $otherDate = Carbon::parse($this->datetime);
            $nowDate = Carbon::now();
            $result = $nowDate->gt($otherDate);
            return $result;
        }else{
            $otherDate = Carbon::parse($this->getBookType->end_date);
            $nowDate = Carbon::now();
            $result = $nowDate->gt($otherDate);
            return $result;
        }
    }

    public function getUser(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function addons(){
        return $this->hasMany(BookingAddons::class, 'booking_id', 'id');
    }

    public function getTotalAmount(){
        
    }

}
