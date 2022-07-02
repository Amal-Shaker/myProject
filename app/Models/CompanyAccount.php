<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAccount extends Model
{   
    
    public $timestamps = false;
    protected $primaryKey = 'company_id';


    use HasFactory;
    protected $fillable = [
        'company_id',
        'Company_name',
        'user_id',
        'logo',
        'address',
        'id',
        'mobile',
        'about_us',
        'tel',
        'building_id',
        'created_at',
        'updated_at',
    ];
    // account - haj 1-1
    public function accounts()
    {
        return $this->hasOne(Account::class);
    }

  // company - Buildings m-m
    public function companyBuildings()
    {
        return $this->belongsToMany(CompanyAccount::class,Buildings::class);
    }

     // company- rating 1-m
     public function rating()
     {
         return $this->hasMany(Rating::class);
     }

      // company- rating 1-m
      public function sos()
      {
          return $this->hasMany(SOS::class);
      }
}
