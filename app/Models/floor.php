<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class floor extends Model
{
    use HasFactory;
    protected $fillable = [
        'floor_id',
        'floor_name',
        'building_id',

    ];

    // building -floors 1-m
    public function building()
    {
        return $this->belongsTo(Buildings::class);
    }

    // building -rooms 1-m
    public function rooms()
    {
        return $this->hasMany(rooms::class);
    }
}
