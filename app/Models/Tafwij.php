<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tafwij extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'type',
        'dateTime',
        'sid'
    ];

      // haj - hajApp 1-1
      public function account()
      {
          return $this->hasOne(HajAccount::class);
      }
}
