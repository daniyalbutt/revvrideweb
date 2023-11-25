<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalsReviews extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'rental_reviews';

    protected $fillable = [
        'user_id',
        'rental_id',
        'comments',
        'rating'
    ];

    public function getUser(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}