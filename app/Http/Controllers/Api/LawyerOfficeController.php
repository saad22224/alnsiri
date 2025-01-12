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
            'office_name' => 'required|string',
            'office_address' => 'required|string',
            'office_phone' => 'required|string',
            'office_email' => 'required|email',
            'lawyer_id' => 'required|exists:lawyer,id',
            'speciality_id' => 'required|exists:speciality,id',
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
