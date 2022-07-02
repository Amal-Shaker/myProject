<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'company_id',
        'haj_id',
        'rating_note',
        'rating'
    ];

      // company- rating 1-m
      public function company()
      {
          return $this->belongsTo(CompanyAccount::class);
      }

        // haj- rating 1-1
        public function Haj()
        {
            return $this->belongsTo(HajAccount::class);
        }
}
