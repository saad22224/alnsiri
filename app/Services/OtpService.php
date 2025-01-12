<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class OtpService
{
    protected $httpClient;
    protected $infobipUrl;
    protected $apiKey;
    protected $sender;

    public function __construct()
    {
        $this->httpClient = new Client();
        $this->infobipUrl = env('jj6dpn.api.infobip.com', 'https://api.infobip.com'); // Infobip API URL
        $this->apiKey = env('16e13b8688454160415cd42d5042e682-8245cba8-6c4f-4245-b02d-4a777e343ad5'); // Your Infobip API key
        $this->sender = env('wael mohamed'); // Sender name or number
    }
    public function sendOtp($phoneNumber)
    {
        // Generate a random OTP
        $otp = rand(100000, 999999);

        // Save OTP to cache for 5 minutes (you can adjust this)
        Cache::put("otp_{$phoneNumber}", $otp, now()->addMinutes(5));

        // Send OTP via Infobip SMS API
        try {
            $response = $this->httpClient->post("{$this->infobipUrl}/sms/2/text/advanced", [
                'json' => [
                    'messages' => [
                        [
                            'from' => $this->sender,
                            'to' => $phoneNumber,
                            'text' => "Your OTP code is: {$otp}",
                        ]
                    ]
                ],
                'headers' => [
                    'Authorization' => "App {$this->apiKey}",
                    'Content-Type' => 'application/json',
                ]
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            return null;
        }
    }

    public function validateOtp($phoneNumber, $otp)
    {
        // Retrieve the OTP from cache and compare
        $cachedOtp = Cache::get("otp_{$phoneNumber}");

        return $cachedOtp && $cachedOtp == $otp;
    }
}
