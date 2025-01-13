<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LawyerChance;
use App\Models\Speciality;
class LawyerChanceController extends Controller
{
    public function createLawyerChance(Request $request)
    {
        $request->validate([
            'order_number' => 'required|integer',
            'case_type' => 'required|string',
            'case_details' => 'required|string',
            'speciality' => 'required|string',
            'city' => 'required|string',
            'date' => 'required|date',
            'price' => 'required|integer',
            'user_uuid' => 'required|exists:users,uuid',
            'lawyer_uuid' => 'required|exists:lawyer,uuid',
        ]);
        $lawyerChance = LawyerChance::create($request->all());
        return response()->json($lawyerChance);
    }
    public function getLawyerChancesByUserUUID($user_uuid)
    {
        $lawyerChances = LawyerChance::where('user_uuid', $user_uuid)->get();
        return response()->json($lawyerChances);
    }
    public function getLawyerChancesByLawyerUUID($lawyer_uuid)
    {
        $lawyerChances = LawyerChance::where('lawyer_uuid', $lawyer_uuid)->get();
        return response()->json($lawyerChances);
    }
    public function getAllLawyerChances()
    {
        try {
            $lawyerChances = LawyerChance::all();
            return response()->json($lawyerChances);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve lawyer chances', 'message' => $e->getMessage()], 500);
        }
    }
}
