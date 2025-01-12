<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CheckEmailAuthController extends Controller
{
    public function checkEmail(Request $request)
    {
        $email = $request->input('email');

        try {
            $user = DB::table('users')->where('email', $email)->first();
            if ($user) {
                return response()->json([
                    'email' => $user->email,
                    'user_type' => $user->user_type,
                ]);
            }

            $lawyer = DB::table('lawyer')->where('email', $email)->first();
            if ($lawyer) {
                return response()->json([
                    'email' => $lawyer->email,
                    'user_type' => $lawyer->user_type,
                ]);
            }

            return response()->json(['message' => 'Email does not exist'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while checking the email'], 500);
        }
    }
}
