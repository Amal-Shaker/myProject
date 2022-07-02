<?php

namespace App\Http\Controllers;

use App\Models\PassportInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PassportInfoController extends Controller
{
    public function createPassportInfo(Request $request)
    {
        $request->validate([
            'name1' => 'required',
            'name2' => 'required|max:1',
            'name3' => 'required|max:1',
            'name4' => 'required',
            'passport_expiry' => 'required',
            'passport_image' => 'nullable',
            'haj_image' => 'nullable',
            'passport_number' => 'required|unique:passport_infos|max:9',
            'main_haj_sid'=>'required|exists:haj_accounts,main_haj_sid|max:9'
        ]);

        
        $data = $request->all();

        DB::beginTransaction();
        $passport = PassportInfo::create($data);
        DB::commit();
        return response()->json(['message' => 'passport Added', 'passport Info' => $passport]);
    }
}
