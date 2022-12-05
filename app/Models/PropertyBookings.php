<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyBookings extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'room_id',
        'room_price',
    ];
}
