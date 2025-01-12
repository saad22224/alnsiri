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
        try {
            $request->validate([
                'order_number' => 'required|integer',
                'case_type' => 'required|string',
                'case_details' => 'required|string',
                'speciality' => 'required|string',
                'city' => 'required|string',
                'date' => 'required|date',
                'price' => 'required|integer',
                'user_id' => 'required|integer',
            ]);
            $lawyerChance = LawyerChance::create($request->all());
            return response()->json($lawyerChance);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create lawyer chance', 'message' => $e->getMessage()], 500);
        }
    }
    public function getLawyerChancesByUserId($user_id)
    {
        try {
            $lawyerChances = LawyerChance::where('user_id', $user_id)->get();
            return response()->json($lawyerChances);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve lawyer chances by user ID', 'message' => $e->getMessage()], 500);
        }
    }
    public function getLawyerChancesByLawyerId($lawyer_id)
    {
        try {
            $lawyerChances = LawyerChance::where('lawyer_id', $lawyer_id)->get();
            return response()->json($lawyerChances);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve lawyer chances by lawyer ID', 'message' => $e->getMessage()], 500);
        }
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
