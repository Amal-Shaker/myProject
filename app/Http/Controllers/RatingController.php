<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function createRating(Request $request)
    {
        $request->validate([
            'company_id' => 'required|int |exists:company_accounts,company_id',
            'haj_id' => 'required|int |exists:haj_accounts,main_haj_sid',
            'rating_note' => 'string|max:255',
            'rating' => 'int|max:5',
        ]);

        $checkId = Rating::where('haj_id', $request->haj_id)->value('haj_id');
        if ($checkId == null) {
            $data = $request->all();
            DB::beginTransaction();
            $rating = Rating::create($data);
            DB::commit();
            return response()->json(['message' => 'Rating Added', 'Rating' => $rating]);
        } else {
            return response()->json(['message' => 'You already sent a Rating']);
        }
    }
}
