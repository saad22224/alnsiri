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
            'lawyer_uuid' => 'required|exists:lawyer,uuid',
            'user_uuid' => 'required|exists:users,uuid',
        ]);
        $lawyerRate = LaweyrRate::create($request->all());
        $lawyer = Lawyer::where('uuid', $request->lawyer_uuid)->first();
        $user = User::where('uuid', $request->user_uuid)->first();
        return response()->json([
            'lawyerRate' => $lawyerRate,
            'lawyer_name' => $lawyer->first_name . ' ' . $lawyer->last_name,
            'lawyer_rate' => $lawyerRate->rate_count,
            'lawyer_rate_content' => $lawyerRate->rate_content,
            'user_name' => $user->name
        ]);
    }
    public function getLawyerRateByLawyerUUID($lawyer_uuid)
    {
        $lawyerRate = LaweyrRate::where('lawyer_uuid', $lawyer_uuid)->get();
        return response()->json($lawyerRate);
    }


}
