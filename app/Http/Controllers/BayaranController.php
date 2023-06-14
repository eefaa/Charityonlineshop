<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class BayaranController extends Controller
{
    public function processPayment(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $charge = Charge::create([
                'amount' => $request->input('amount'),
                'currency' => 'usd',
                'source' => $request->input('stripeToken'),
                'description' => 'Payment description',
            ]);

            // Handle successful payment
            return response()->json(['success' => true, 'message' => 'Payment succeeded.']);
        } catch (\Exception $e) {
            // Handle payment failure
            return response()->json(['success' => false, 'message' => 'Payment failed: ' . $e->getMessage()]);
        }
    }
}
