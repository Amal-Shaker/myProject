<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassportInfo extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name1',
        'name2',
        'name3',
        'name4',
        'passport_number',
        'passport_expiry',
        'passport_image',
        'haj_image',
        'main_haj_sid'
        
    ];

    public function haj()
    {
        return $this->hasOne(HajAccount::class);
    } 

    public function withHaj()
    {
        return $this->hasOne(PersonWithHaj::class);
    } 
}
