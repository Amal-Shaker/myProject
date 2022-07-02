<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HajApp extends Model
{
    public $timestamps = false;

    use HasFactory;
    protected $fillable = [
        'id',
        'main_haj_sid',
        'mabile_number',
        'address',
        'Company_name',
        'app_haj_count',
        'company_id'
        ,'companionlist'
    ];

    // haj - hajApp 1-1
    public function haj()
    {
        return $this->hasOne(HajAccount::class);
    }
  // company - hajApp 1-m
    public function company()
    {
        return $this->belongsTo(CompanyAccount::class);
    }

   
}
