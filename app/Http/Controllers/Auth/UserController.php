<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
class UserController extends Controller
{
    public function register(Request $request)
    {
        // Check if email exists
        $existingEmail = User::where('email', $request->email)->first();
        if ($existingEmail) {
            return response()->json([
                'message' => 'Email already exists',

            ], 422);
        }

        // Check if phone exists
        $existingPhone = User::where('phone', $request->phone)->first();
        if ($existingPhone) {
            return response()->json([
                'message' => 'Phone number already exists',

            ], 422);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

                    $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'password' => Hash::make($request->password),
                    ]);

                    // Generate token
                    $token = Str::random(60);
                    $user->forceFill([
                        'remember_token' => $token
                    ])->save();


                    return response()->json([
                        'message' => 'User registered successfully',
                        'token' => $token,
                        'data' => $user,
                        'user_type' => 'user'
                    ]);



    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Generate token
        $token = $user->createToken('authToken')->accessToken;

        // Generate remember token
        $rememberToken = Str::random(60);

        // Store the remember token in the database
        $user->forceFill([
            'remember_token' => $rememberToken,
        ])->save();

        // Return the token as part of the API response
        return response()->json([
            'remember_token' => $rememberToken,
            'message' => 'Login successful',
            'data' => $user
        ]);
    }


    public function logout(Request $request)
    {
        // Get user from token
        $user = $request->user();

        if ($user) {
            $user->forceFill([
                'remember_token' => null,
            ])->save();
            $user->token()->revoke();
        }

        return response()->json(['message' => 'Logged out successfully']);
    }
    public function getProfile(Request $request)
    {
        $user = $request->user();

        // Debugging: Log the user object
        Log::info('User retrieved in getProfile:', ['user' => $user]);

        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }
        return response()->json(['data' => $user]);
    }
    public function updateProfile(Request $request)
    {
        try {
            // Get the user using the remember_token from the request header
            $rememberToken = $request->header('Authorization');
            $user = User::where('remember_token', $rememberToken)->first();

            if (!$user) {
                return response()->json(['message' => 'User not authenticated'], 401);
            }

            $request->validate([
                'name' => 'string|max:255',
                'email' => 'string|email|unique:users,email,' . $user->id,
                'phone' => 'string|unique:users,phone,' . $user->id,
                'password' => 'string|min:8|confirmed',
            ]);

            // Only update fields that were provided
            if ($request->has('name')) {
                $user->name = $request->name;
            }
            if ($request->has('email')) {
                $user->email = $request->email;
            }
            if ($request->has('phone')) {
                $user->phone = $request->phone;
            }
            if ($request->has('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            return response()->json([
                'message' => 'Profile updated successfully',
                'user' => $user
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while updating profile',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
