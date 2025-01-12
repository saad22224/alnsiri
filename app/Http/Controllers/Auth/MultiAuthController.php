<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lawyer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MultiAuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);

            // Attempt to find the user in both User and Lawyer models
            $user = User::where('email', $request->email)->first();
            $userType = 'user';

            if (!$user) {
                $user = Lawyer::where('email', $request->email)->first();
                $userType = 'lawyer';
            }

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }

            // Check if lawyer account is disabled
            if ($userType === 'lawyer' && $user->status === 0) {
                return response()->json(['message' => 'Sorry You Are Blocked From Admin'], 403);
            }

            // Generate remember token
            $rememberToken = Str::random(60);
            $user->forceFill(['remember_token' => $rememberToken])->save();

            return response()->json([
                'message' => 'Login successful',
                'token' => $rememberToken,
                'data' => $user
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred during login', 'error' => $e->getMessage()], 500);
        }
    }
}
