<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HajAccount;


class Vaccination extends Model
{
    use HasFactory;
    protected $fillable = [
        'vacc-id',
        'vacc-place',
        'vacc-date',
        'vacc-time',
        'haj-id',
    ];

    public function haj()
    {
        return $this->hasOne(HajAccount::class);
    }
}
