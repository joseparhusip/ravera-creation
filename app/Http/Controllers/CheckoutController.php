<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // Get package information from request
        $package = $request->get('package', 'silver');
        
        // Define package details
        $packages = [
            'silver' => [
                'name' => 'Paket Silver',
                'price' => 8000000,
                'features' => [
                    'Dekorasi minimalis dan elegan',
                    'Tata rias untuk pengantin dan rias pendamping',
                    'Hair do / hijab untuk ibu mempelai'
                ]
            ],
            'platinum' => [
                'name' => 'Paket Platinum',
                'price' => 11000000,
                'features' => [
                    'Dekorasi elegan sesuai tema pilihan',
                    'Tata rias untuk pengantin dan rias pendamping',
                    'Hair do / hijab untuk 2 orang',
                    'Hair do / hijab untuk ibu mempelai'
                ]
            ],
            'gold' => [
                'name' => 'Paket Gold',
                'price' => 15000000,
                'features' => [
                    'Dekorasi elegan dengan tema khusus',
                    'Tata rias untuk pengantin dan rias pendamping',
                    'Hair do / hijab untuk 3 orang',
                    'Tata rias untuk ibu mempelai'
                ]
            ]
        ];
        
        $selectedPackage = $packages[$package] ?? $packages['silver'];
        
        return view('user.checkout', compact('selectedPackage', 'package'));
    }
    
    public function process(Request $request)
    {
        // Validate request
        $request->validate([
            'phone' => 'required|string|max:20',
            'bank' => 'required|string',
            'package' => 'required|string',
            'down_payment' => 'required|numeric|min:0',
            'coupon_code' => 'nullable|string',
            'discount_amount' => 'nullable|numeric|min:0'
        ]);
        
        // Define available coupons
        $coupons = [
            'ulbikeren' => 500000,   // Diskon Rp 500.000
            'ulbimantap' => 1000000, // Diskon Rp 1.000.000
            'ulbihebat' => 2000000   // Diskon Rp 2.000.000
        ];
        
        // Define package prices
        $packagePrices = [
            'silver' => 8000000,
            'platinum' => 11000000,
            'gold' => 15000000
        ];
        
        $packagePrice = $packagePrices[$request->package] ?? $packagePrices['silver'];
        
        // Calculate subtotal based on down payment
        $subtotal = $request->down_payment == '1' ? ($packagePrice * 0.5) : $packagePrice;
        
        // Get discount amount from form hidden input
        $discountAmount = $request->discount_amount;
        
        // Calculate final total
        $finalAmount = max(0, $subtotal - $discountAmount);
        $pkpAmount = round($finalAmount * 0.001); // PKP 0.1%
        $totalAmount = $finalAmount + $pkpAmount;
        
        // Store order data (you can save this to database)
        $orderData = [
            'phone' => $request->phone,
            'bank' => $request->bank,
            'package' => $request->package,
            'description' => $request->description,
            'is_down_payment' => $request->down_payment == '1',
            'subtotal' => $subtotal,
            'coupon_code' => $request->coupon_code,
            'discount_amount' => $discountAmount,
            'pkp_amount' => $pkpAmount,
            'total_amount' => $totalAmount,
            'created_at' => now()
        ];
        
        // Process the order (save to database, send email, etc.)
        // For now, just redirect with success message
        
        session(['order_data' => $orderData]);
        
        return redirect()->route('checkout.success')->with('success', 'Pesanan Anda berhasil diproses!');
    }
    
    public function success()
    {
        $orderData = session('order_data');
        return view('user.checkout-success', compact('orderData'));
    }
}