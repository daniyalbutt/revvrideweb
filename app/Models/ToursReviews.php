<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToursReviews extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'tour_reviews';

    protected $fillable = [
        'user_id',
        'tour_id',
        'comment',
        'rating'
    ];

    public function getUser(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    

}