<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Vaccination;


class HajAccount extends Model
{
    public $timestamps = false;

    use HasFactory;
    protected $fillable = [
        'main_haj_sid',
        'name1',
        'name2',
        'name3',
        'name4',
        'status',
        'region',
        'season',
        'haj_relationship',
        'gender',
        'mother_name',
        'area',
        'city',
        'street',
        'house_no',
        'mobile',
        'tel',
        'birth_place',
        'sid_muhrem',
        'dob',
        'social_status',
        'age',
        'user_id',
        'room_id',
         
    ];

    // haj - account 1-1
    public function account()
    {
        return $this->hasOne(Account::class);
    }

    // vaccation - haj  1-1
    public function vaccination()
    {
        return $this->belongsTo(Vaccination::class);
    }
    // Passport - haj 1-1
    public function passport()
    {
        return $this->belongsTo(PassportInfo::class);
    }

    public function hajApp()
    {
        return $this->belongsTo(HajApp::class);
    }
    //haj-room 1-1
    public function hajRoom()
    {
        return $this->belongsTo(Room::class);
    }

    public function withHaj()
    {
        return $this->hasMany(PersonWithHaj::class);
    }

     // haj- rating 1-1
     public function Rating()
     {
         return $this->hasOne(Rating::class);
     }

       // haj- SOS 1-1
       public function sOS()
       {
           return $this->hasOne(SOS::class);
       }

 
}
