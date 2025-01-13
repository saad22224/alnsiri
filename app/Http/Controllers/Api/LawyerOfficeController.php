<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LawyerOffice;
use App\Models\Speciality;
class LawyerOfficeController extends Controller
{
    public function createLawyerOffice(Request $request)
    {
        $request->validate([
            'lawyer_uuid' => 'required|exists:lawyer,uuid',
            'speciality_id' => 'required|exists:speciality,id',
            'google_map_url' => 'nullable|string',
            'law_office' => 'nullable|string',
            'call_number' => 'nullable|string',
            'whatsapp_number' => 'nullable|string',
            'specialties' => 'nullable|array',
            'speaking_english' => 'nullable|boolean',

        ]);
        $lawyerOffice = LawyerOffice::create($request->all());
        return response()->json($lawyerOffice, 201);
    }

    public function getAllLawyerOffices()
    {
        $lawyerOffices = LawyerOffice::all();
        return response()->json($lawyerOffices);
    }

    public function getLawyerOfficeById($id)
    {
        $lawyerOffice = LawyerOffice::find($id);
        return response()->json($lawyerOffice);
    }
}
