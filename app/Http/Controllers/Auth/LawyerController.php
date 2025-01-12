<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lawyer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LawyerController extends Controller
{
   public function register(Request $request)
   {
        try {
            // Check if email exists
            $existingEmail = Lawyer::where('email', $request->email)->first();
            if ($existingEmail) {
                return response()->json([
                    'message' => 'Email already exists',
                ], 422);
            }

            // Check if phone exists
            $existingPhone = Lawyer::where('phone_number', $request->phone)->first();
            if ($existingPhone) {
                return response()->json([
                    'message' => 'Phone number already exists',
                ], 422);
            }

            $request->validate([
                'first_name' => 'required|string|max:255',
                'middle_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:lawyer',
                'city' => 'required|string|max:255',
                'password' => 'required|string|min:8',
                'repeat_password' => 'required|string|min:8|same:password',
                'phone_number' => 'required|string|unique:lawyer',
                'otp' => 'required|string',
                'experience' => 'required|integer',
            ]);

            $data = $request->all();
            $data['password'] = Hash::make($request->password);
            $data['repeat_password'] = Hash::make($request->repeat_password);

            $lawyer = Lawyer::create($data);

            // Generate token
            $token = Str::random(60);
            $lawyer->forceFill([
                'remember_token' => $token
            ])->save();

            return response()->json([
                'message' => 'User registered successfully',
                'data' => $lawyer,
                'token' => $token
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred during registration',
                'error' => $e->getMessage()
            ], 500);
        }
   }

   public function login(Request $request)
{
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    $lawyer = Lawyer::where('email', $request->email)->first();

    if (!$lawyer || !Hash::check($request->password, $lawyer->password)) {
        return response()->json([
            'message' => 'Invalid credentials'
        ], 401);
    }
    // Check if lawyer account is disabled
    if ($lawyer->status === 0) {
        return response()->json([
            'message' => 'Sorry You Are Blocked From Admin'
        ], 403);
    }

    // Generate remember token
    $lawyer->remember_token = Str::random(60);
    $lawyer->save();

    return response()->json([
        'message' => 'Login successful',
        'token' => $lawyer->remember_token,
        'data' => $lawyer
    ]);
}
    public function edit(Request $request)
    {
        try {
            $lawyer = Lawyer::where('remember_token', $request->header('Authorization'))->first();

            if (!$lawyer) {
                return response()->json([
                    'message' => 'Unauthorized'
                ], 401);
            }

            $request->validate([
                'name' => 'string|max:255',
                'email' => 'string|email|unique:lawyers,email,' . $lawyer->id,
                'phone' => 'string|max:20',
                'address' => 'string',
                'experience' => 'string',
                'specialization' => 'string',
                'description' => 'string'
            ]);

            $lawyer->update($request->all());

            return response()->json([
                'message' => 'Profile updated successfully',
                'lawyer' => $lawyer
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while updating profile',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}

