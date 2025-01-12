<?php

namespace App\Services;

use Moyasar\Moyasar;
use Moyasar\Providers\PaymentService;

// Set your API key
Moyasar::setApiKey(env('MOYASAR_API_KEY'));

// Create a PaymentService instance
$paymentService = new PaymentService();

// Fetch a payment by ID
$payment = $paymentService->fetch(env('MOYASAR_BASE_URL'));

// Output payment details
return $payment;
