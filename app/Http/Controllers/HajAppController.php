<?php

namespace App\Http\Controllers;

use App\Models\Companion;
use App\Models\HajAccount;
use App\Models\HajApp;
use App\Models\UserInfo;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HajAppController extends Controller
{




    public function createApp(Request $request)
    {
        $request->validate([
            'company_id' => 'required|int |exists:company_accounts,company_id',
            'main_haj_sid' => 'required|int |exists:user_infos,sid',
            'address' => 'string|max:255',
            'Company_name' => 'required|string|max:255 |exists:company_accounts,Company_name',
            'mabile_number' => 'string|max:10',
        ]);

        $checkId = HajApp::where('main_haj_sid', $request->main_haj_sid)->value('main_haj_sid');
        if ($checkId == null) {
            $userInfo = UserInfo::where('sid', $request->main_haj_sid)->get();
            $userId = User::where('sid', $request->main_haj_sid)->value('id');
            $hajAccount =  HajAccount::create([
                'main_haj_sid' => $userInfo->value('sid'),
                'name1' => $userInfo->value('name1'),
                'name2' => $userInfo->value('name2'),
                'name3' => $userInfo->value('name3'),
                'name4' => $userInfo->value('name4'),
                'gender' => $userInfo->value('gender'),
                'mother_name' => $userInfo->value('mother_name'),
                'area' => $userInfo->value('area'),
                'city' => $userInfo->value('city'),
                'street' => $userInfo->value('street'),
                'house_no' => $userInfo->value('house_no'),
                'mobile' => $userInfo->value('mobile'),
                'age' => $userInfo->value('age'),
                'tel' => $userInfo->value('tel'),
                'birth_place' => $userInfo->value('birth_place'),
                'dob' => $userInfo->value('dob'),
                'social_status' => $userInfo->value('social_status'),
                'user_id' => $userId,
            ]);

            $data = $request->all();
            DB::beginTransaction();
            $app = HajApp::create($data);
            DB::commit();
            return response()->json([
                'message' => 'Haj App Added',
                'Haj App' => $app, 'user Info', $hajAccount
            ]);
        } else {
            return response()->json([
                'message' => 'sorry, The SID number is in another request',
                'SID is' => $checkId
            ]);
        }
    }

    public function getAppBySid(Request $request)
    {
        $request = request();
        $id = $request->input("id");

        $app = HajApp::where('main_haj_sid', $id)->get();
        $haj = HajAccount::where('main_haj_sid', $id)->get();
        $companion = Companion::where('main_haj_sid', $id)->get();

        if ($app) {
            $response = [
                "message" => 'successfully get data', 'app data' => $app, 'haj account data' => $haj,
                'companion data' => $companion
            ];
            return response($response, 200);
        } else {
            $response = ["message" => 'data not found', $app];
            return $response;
        }
    }


    public function countOfHajApp()
    {   $request = request();
        $id = $request->input("id");
        $hajAppCount = HajApp::when($id, function ($query, $id) {
            return $query->where("company_id", $id)->count();
        });
 
        $response = ["message" => "haj App Counts are", $hajAppCount];
        return $response;
    }



    public function getAllHajAppByCompanyId()
    {
        $request = request();
        $id = $request->input("id");
        $Info = HajApp::where("company_id", $id)->get();
        $userInfo = HajAccount::where("main_haj_sid", $Info->value('main_haj_sid'))->get();

        if ($Info->value('company_id') != null) {
            $response = [
                "message" => 'successfully get data', 'Haj app data' => $Info,"Haj Info"=>$userInfo
            ];
            return response($response, 200);
        } else {
            $response = ["message" => 'data not found', $Info];
            return $response;
        }
    }
}
