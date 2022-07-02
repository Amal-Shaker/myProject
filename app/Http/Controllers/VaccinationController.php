<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use App\Models\Vaccination;
use Illuminate\Http\Request;

class VaccinationController extends Controller
{
    public function index()
    {
        $request = request();
        $haj_id = $request->input("id");
        $vacc = Vaccination::when($haj_id, function ($query, $haj_id) {
            return $query->where("sid", $haj_id)->get();
        });

        $response = ["message" => "Vaccination data is", $vacc];
        return response($response, 200);
    }
 
}
