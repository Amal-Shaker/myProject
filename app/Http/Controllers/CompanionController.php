<?php

namespace App\Http\Controllers;

use App\Models\Companion;
use App\Models\HajAccount;
use App\Models\UserInfo;
use App\Models\HajApp;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class CompanionController extends Controller
{
    public function addCompanion(Request $request)
    {
        $request->validate([
            'sid' => 'required|int',
            'address' => 'string|max:255',
            'mobile' => 'string|max:10',
            'main_haj_sid' => 'required|int |exists:haj_accounts,main_haj_sid',
        ]);
      $companionSid=$request->sid;

        // $checkId = HajApp::where('main_haj_sid', )->value('main_haj_sid');
        $checkIdHaj = HajAccount::where('main_haj_sid', $companionSid)->value('main_haj_sid');
        $checkIdCom = Companion::where('sid', $companionSid)->value('sid');

        if ($checkIdCom==null&&$checkIdHaj==null) {

            $userInfo = UserInfo::where('sid', $companionSid)->get();
            // $userId = User::where('sid', $request->$companionSid)->value('id');
            $hajAccount =  Companion::create([
                'sid' => $userInfo->value('sid'),
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
                'mobile' => $request->mobile,
                'age' => $userInfo->value('age'),
                'tel' => $userInfo->value('tel'),
                'birth_place' => $userInfo->value('birth_place'),
                'dob' => $userInfo->value('dob'),
                'social_status' => $userInfo->value('social_status'),
                // 'user_id'=>$userId,
                'address' =>$request->address,
                'main_haj_sid' =>$request->main_haj_sid,


             ]);

        return response()->json(['message' => 'Companion Added', 'Companion info' => $hajAccount]);
    }
    else{
        return response()->json(['message' => 'The SID number already exists']);
  
    }}



    public function getALLCompanionWithHaj()
    {
        $request = request();
        $id = $request->input("id");

        $companion = Companion::where('main_haj_sid', $id)->get();
 
        if ($companion->value('sid')==null) {
            $response = ["message" => 'companion does not exist'];
            return response($response, 422);
        } else {
            $response = ["message" => 'successfully get data', $companion];
            return $response;
        }
    }
   
    
    
    public function delete()
    {
        $request = request();
           $sid = $request->input("sid");
         $companion=Companion::where('sid',$sid)->first();
 
        if ($companion) {
            $companion->delete();
            $response = ["message" => 'Successful companion removed'];
            return response($response, 200);
        } else
            return response('Not success');
     }
    
    
    
}

