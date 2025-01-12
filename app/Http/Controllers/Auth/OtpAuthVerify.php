<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\OtpService;
use Illuminate\Http\Request;
use App\Models\Lawyer;
class OtpAuthVerify extends Controller
{
    protected $otpService;

    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }

    // Send OTP to the user's phone number
    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string',
        ]);

        // Find the user by phone number (you could also use email or username)
        $user = Lawyer::where('phone_number', $request->phone_number)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Generate OTP and send it via SMS
        $this->otpService->sendOtp($user->phone_number);

        return response()->json(['message' => 'OTP sent successfully']);
    }

    // Verify OTP entered by the user
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|string',
            'phone_number' => 'required|string'
        ]);

        $user = $this->getUserFromRequest($request);

        if ($user === null) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Get the latest OTP record for this user
        $otpRecord = \App\Models\Otp::where('user_id', $user->id)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', now())
            ->latest()
            ->first();

        if (!$otpRecord) {
            return response()->json(['message' => 'Invalid or expired OTP'], 400);
        }

        // Delete the used OTP
        $otpRecord->delete();

        return response()->json(['message' => 'OTP verified successfully']);
    }

    private function getUserFromRequest(Request $request)
    {
        // Assuming you want to get the user by phone number
        return Lawyer::where('phone_number', $request->phone_number)->first();
    }

}
