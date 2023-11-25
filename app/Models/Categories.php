<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function rentals(){
        return $this->hasMany(Rentals::class, 'category_id' , 'id');
    }
    
}
