<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyRooms extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_type_id',
        'room_name',
        'room_description',
    ];
    public function getRoomfiles() {
        return  $this->hasMany(PrImage::class,'property_room_id', 'id');
     }
}
