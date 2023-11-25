<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tours extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function Images()
    {
        return $this->hasMany(ToursImages::class, 'tour_id', 'id');
    }

    public function get_reviews()
    {
        return $this->hasMany(ToursReviews::class, 'tour_id', 'id')->orderBy('id', 'desc');
    }
}
