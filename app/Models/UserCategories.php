<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCategories extends Model
{
    use HasFactory;
    
    protected $table = 'user_categories';

    protected $fillable = [
        'user_id',
        'category_id',
    ];

    public function get_category(){
        return $this->hasMany(Categories::class,'category_id');
    }

    public function category(){
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }


}
