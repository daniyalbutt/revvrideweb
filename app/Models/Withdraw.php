<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Withdraw extends Model
{
    protected $table = 'vendor_withdraws';

    protected $fillable = [
        'amount',
        'description',
        'comments',
        'status',
        'user_id'
    ];

    public function images(){
        return $this->hasMany(WithdrawImages::class, 'withdraw_id', 'id');
    }

}
