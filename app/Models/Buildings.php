<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buildings extends Model
{
    use HasFactory;
    protected $fillable = [
        'building_id',
        'city',
        'building_name',
        'address'
    ];

    // m-m 
    public function companyBuildings()
    {
        return $this->belongsToMany(Buildings::class,CompanyAccount::class);
    }

    // building -floors 1-m
    public function floors()
    {
        return $this->hasMany(floor::class);
    }

}
