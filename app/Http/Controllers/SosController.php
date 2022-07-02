<?php

namespace App\Http\Controllers;

use App\Models\SOS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SosController extends Controller
{
    public function createSos(Request $request)
    {
        $request->validate([
            'sid' => 'required|int |exists:user_infos,sid',
            'address' => 'nullable',
            'isFinish' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'company_id' => 'required|int |exists:company_accounts,company_id',
        ]);

        $checkId = SOS::where('sid', $request->sid)->value('sid');
        // $isFinshed = SOS::where('isFinish', $request->isFinish)->value('isFinish');

        if ($checkId == null) {
            $data = $request->all();
            DB::beginTransaction();
            $passport = SOS::create($data);
            DB::commit();
            return response()->json(['message' => 'sos Added', 'sos Info' => $passport]);
        } else {
            return response()->json(['message' => 'You already sent a sos']);
        }
    }

    public function getAllSOSByCompanyId()
    {
        $request = request();
        $id = $request->input("id");
        $Info = SOS::where("company_id", $id)->get();

        if ($Info->value('company_id') != null) {
            $response = [
                "message" => 'successfully get data', 'company data' => $Info
            ];
            return response($response, 200);
        } else {
            $response = ["message" => 'data not found', $Info];
            return $response;
        }
    }

    public function countOfSos()
    {
        $request = request();
        $id = $request->input("id");
        $sos = SOS::where("company_id", $id)->count();
        $response = ["message" => "sos Count is", $sos];
        return $response;
    }

    public function getAllSos()
    {
        $sos = SOS::get();
        $response = ["message" => "SOSs are", $sos];
        return $response;
    }
    
    public function delete()
    {
          $request = request();
         $id = $request->input("id");
         $sos=SOS::where('id',$id)->first();
 
        if ($sos) {
            $sos->delete();
            $response = ["message" => 'Successful sos removed'];
            return response($response, 200);
        } else
            return response('Not success');
     }

}
