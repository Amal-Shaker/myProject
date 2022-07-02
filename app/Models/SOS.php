<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SOS extends Model
{    public $timestamps = false;

    use HasFactory;
    protected $table = 'sos';

    protected $fillable = [
        'id',
        'sid',
        'address',
        'isFinish',
        'company_id',
        'latitude',
        'longitude',


    ];

    // haj - hajApp 1-1
    public function haj()
    {
        return $this->belongsTo(HajAccount::class);
    }
    // company - hajApp 1-m
    public function company()
    {
        return $this->belongsTo(CompanyAccount::class);
    }
}
