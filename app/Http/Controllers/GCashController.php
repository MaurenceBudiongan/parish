<?php

// app/Http/Controllers/GCashController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GCashController extends Controller
{
    public function initiatePayment(Request $request)
    {
        $amount = $request->input('amount') * 100; // amount in centavos

        $response = Http::withBasicAuth(env('PAYMONGO_SECRET_KEY'), '')
            ->post('https://api.paymongo.com/v1/sources', [
                'data' => [
                    'attributes' => [
                        'amount' => $amount,
                        'redirect' => [
                            'success' => route('gcash.success'),
                            'failed' => route('gcash.failed'),
                        ],
                        'type' => 'gcash',
                        'currency' => 'PHP'
                    ]
                ]
            ]);

        if ($response->successful()) {
            $source = $response->json()['data'];
            return redirect($source['attributes']['redirect']['checkout_url']);
        }

        return back()->withErrors(['error' => 'Failed to create GCash payment.']);
    }

    public function success(Request $request)
    {
        return view('gcash.success');
    }

    public function failed(Request $request)
    {
        return view('gcash.failed');
    }
}
