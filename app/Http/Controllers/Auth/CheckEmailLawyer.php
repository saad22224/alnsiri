<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckEmailLawyer extends Controller
{
    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $email = $request->input('email');
        $lawyer = DB::table('lawyer')->where('email', $email)->first();

        if ($lawyer) {
            return response()->json(['message' => 'Email exists'], 404);
        } else {
            return response()->json(['message' => 'Email does not exist'], 200);
        }
    }
}
