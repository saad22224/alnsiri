<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LaweyrRate;
use App\Models\User;
use App\Models\Lawyer;
class LaweyrRateController extends Controller
{
    public function getAllRates()
    {
        try {
            $rates = LaweyrRate::all();
            return response()->json($rates);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve rates', 'message' => $e->getMessage()], 500);
        }
    }
    public function createLawyerRate(Request $request)
    {
        $request->validate([
            'rate_count' => 'required|integer',
            'rate_content' => 'required|string',
            'lawyer_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);
        $lawyerRate = LaweyrRate::create($request->all());
        $lawyer = Lawyer::find($request->lawyer_id);
        $user = User::find($request->user_id);
        return response()->json([
            'lawyerRate' => $lawyerRate,
            'lawyer_name' => $lawyer->first_name . ' ' . $lawyer->last_name,
            'lawyer_rate' => $lawyerRate->rate_count,
            'lawyer_rate_content' => $lawyerRate->rate_content,
            'user_name' => $user->name
        ]);
    }


}
