<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ministry extends Model

{
    use HasFactory;

    protected $fillable = [
        'mobile',
        'user_id',
        'id'
    ];

      // every haj has one account 1-1
      public function ministryAccount()
      {
          return $this->hasOne(User::class);
      }
}
