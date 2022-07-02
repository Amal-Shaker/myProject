<?php

namespace App\Http\Controllers;

use App\Models\CompanyAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function createCompany(Request $request)
    {
        $request->validate([
            // 'company_id' => 'required|int |exists:company_accounts,company_id',
            'mobile' => 'required',
            'tel' => 'required',
            'about_us' => 'required',
            'Company_name' => 'required',
            'logo' => 'required',
            'address' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        $checkId = CompanyAccount::where('user_id', $request->user_id)->value('user_id');
        if ($checkId == null) {
            $data = $request->all();
            DB::beginTransaction();
            $company = CompanyAccount::create($data);
            DB::commit();
            return response()->json(['message' => 'Company Added', 'Company Info' => $company]);
        } else {
            return response()->json(['message' => 'You already create a company account']);
        }
    }

    public function getAllCompanyNames()
    {
        $company = CompanyAccount::get(['Company_name', 'company_id']);
        return response()->json(["message" => 'successfuly get Data', $company]);
    }

    public function getCompanyInfo()
    {
        $request = request();
        $id = $request->input("id");
        $company = CompanyAccount::where('company_id', $id)->get();
        if ($company->value('company_id')!=null) {
            $response = [
                "message" => 'successfully get data', 'company data' => $company
            ];
            return response($response, 200);
        } else {
            $response = ["message" => 'data not found', $company];
            return $response;
        }
    }
    
    public function getCompanyInfoByUserId()
    {
        $request = request();
        $id = $request->input("id");
        $company = CompanyAccount::where('user_id', $id)->get();
        if ($company->value('user_id')!=null) {
            $response = [
                "message" => 'successfully get data', 'company data' => $company
            ];
            return response($response, 200);
        } else {
            $response = ["message" => 'data not found', $company];
            return $response;
        }
    }
    
    
    public function update(Request $request, $id)
    {
        $company = CompanyAccount::find($id);
        $company->update([
        'mobile' => $request->get('mobile'),
        'tel' => $request->get('tel'),
        'about_us' => $request->get('about_us'),
        'Company_name' => $request->get('Company_name'),
        'logo' => $request->get('logo'),
        'address' => $request->get('address'),
        ]);
        $company->save();
        return $company;
    }
}
