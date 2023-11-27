<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class WithdrawImages extends Model
{
    protected $table = 'vendor_withdraw_images';

    protected $fillable = [
        'withdraw_id',
        'image',
    ];

}
