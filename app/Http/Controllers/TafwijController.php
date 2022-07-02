<?php

namespace App\Http\Controllers;

use App\Models\Tafwij;
use Illuminate\Http\Request;

class TafwijController extends Controller
{
    public function getTafwijInfo()
    {
        $request = request();
        $id = $request->input("id");

        $Tafwij = Tafwij::where('sid', $id)->get();
        $result=Tafwij::orderBy('dateTime', 'ASC')->get();
    //     User::orderBy('name', 'DESC')
    // ->orderBy('email', 'ASC')
    // ->get();
 
        if ($Tafwij->value('sid')==null) {
            $response = ["message" => 'There is no data yet'];
            return response($response, 422);
        } else {
            $response = ["message" => 'successfully get data', $result];
            return $response;
        }
    }
}
