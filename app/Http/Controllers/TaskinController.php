<?php

namespace App\Http\Controllers;
use App\Models\Buildings;
use App\Models\HajAccount;
use App\Models\Room;
use App\Models\floor;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TaskinController extends Controller
{
    public function getBuildingData()
    {
      $request = request();
      $haj_id = $request->input("id");
      $room_id = HajAccount::where('main_haj_sid', $haj_id)->value('room_id');
      $room = Room::where('room_id', $room_id)->get();
      $floor_id = $room->value('floor_id');
      $Floor = floor::where("floor_id", $floor_id)->get();
      $build_id = $Floor->value('building_id');
      $building = Buildings::where("building_id", $build_id)->get();
      $response = ["room Infos" => $room, "floor Infos", $Floor, "building Infos", $building];
      return response($response);
      
    }
}
