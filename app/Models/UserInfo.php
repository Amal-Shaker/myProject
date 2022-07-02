<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model


{
    use HasFactory;
    protected $table = 'user_infos';

    use HasFactory;
    protected $fillable = [
        'sid',
        'name1',
        'name2',
        'name3',
        'name4',
        'region',
        'season',
        'gender',
        'mother_name',
        'area',
        'city',
        'street',
        'house_no',
        'mobile',
        'address',
        'birth_place',
        'dob',
        'social_status',
        'age',
      ];

    

    
}
