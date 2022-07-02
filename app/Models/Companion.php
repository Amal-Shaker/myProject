<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companion extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'sid';

    protected $table = 'companions';

    use HasFactory;
    protected $fillable = [
        'sid',
        'mobile',
        'address',
        'sid',
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
        'main_haj_sid'
    ];

    public function passport()
    {
        return $this->belongsTo(PassportInfo::class);
    }

    public function withHaj()
    {
        return $this->belongsTo(HajAccount::class);
    }

    // haj - account 1-1
    public function account()
    {
        return $this->hasOne(Account::class);
    }
}
