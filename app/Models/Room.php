<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_id',
        'room_Number',
        'floor_id'
    ];


    //haj-room 1-1
    public function haj()
    {
        return $this->hasMany(HajAccount::class);
    }
    //haj-floor 1-1
    public function floor()
    {
        return $this->belongsTo(floor::class);
    }
}
