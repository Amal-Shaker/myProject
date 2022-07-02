<?php

namespace App\Http\Controllers;

use App\Models\HajAccount;
use Illuminate\Http\Request;

class MinistryController extends Controller
{
    public function getAllAcceptedPilgrims()
    {
        $hajs = HajAccount::where("status",1)->get();
             $response = ["message" => "haj accounts are", $hajs];
            return $response;   
        
    } 
}
