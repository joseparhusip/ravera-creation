<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    /**
     * Menampilkan halaman checkout dengan detail paket yang dipilih.
     */
    public function show(string $package): View
    {
        // Data master untuk semua paket yang tersedia
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
        
        // Ambil data paket yang sesuai dari URL
        $selectedPackage = $packages[$package] ?? null;

        // Jika paket tidak ada di dalam data master, tampilkan halaman error 404
        if (!$selectedPackage) {
            abort(404, 'Paket tidak ditemukan.');
        }

        // Format harga agar tampilannya lebih rapi (misal: IDR 8.000.000)
        $selectedPackage['price_formatted'] = 'IDR ' . number_format($selectedPackage['price'], 0, ',', '.');
        
        // **PERBAIKAN UTAMA:** Mengarahkan ke view yang benar di dalam folder 'user'
        return view('user.checkout', ['packageData' => $selectedPackage]);
    }
    
    /**
     * Memproses data dari form checkout.
     */
    public function process(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'phone' => 'required|string|max:20',
            'bank' => 'required|string',
            'package' => 'required|string|in:silver,platinum,gold',
            'down_payment' => 'required|in:0,1',
            'coupon_code' => 'nullable|string',
            'description' => 'nullable|string'
        ]);
        
        // Data master untuk kupon dan harga (untuk perhitungan yang aman di server)
        $coupons = [
            'ULBIKEREN' => 500000,
            'ULBIMANTAP' => 1000000,
            'ULBIHEBAT' => 2000000
        ];
        
        $packagePrices = [
            'silver' => 8000000,
            'platinum' => 11000000,
            'gold' => 15000000
        ];
        
        $packagePrice = $packagePrices[$request->package];
        
        // Hitung subtotal berdasarkan pilihan DP (50% jika DP dipilih)
        $subtotal = $request->down_payment == '1' ? ($packagePrice * 0.5) : $packagePrice;
        
        // Hitung diskon secara aman berdasarkan kode kupon yang valid
        $discountAmount = 0;
        $couponCode = strtoupper($request->coupon_code);
        if (isset($coupons[$couponCode])) {
            $discountAmount = $coupons[$couponCode];
        }
        
        // Hitung total akhir setelah diskon dan pajak
        $finalAmount = max(0, $subtotal - $discountAmount);
        $pkpAmount = round($finalAmount * 0.001); // PKP 0.1%
        $totalAmount = $finalAmount + $pkpAmount;
        
        // Siapkan data pesanan untuk disimpan ke session
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
        
        // Simpan data ke session dan arahkan ke halaman sukses
        session(['order_data' => $orderData]);
        return redirect()->route('checkout.success')->with('success', 'Pesanan Anda berhasil diproses!');
    }
    
    /**
     * Menampilkan halaman sukses setelah checkout.
     */
    public function success()
    {
        $orderData = session('order_data');
        
        // Jika tidak ada data di session, kembalikan ke halaman utama
        if(!$orderData) {
            return redirect('/');
        }
        
        // **PERBAIKAN UTAMA:** Mengarahkan ke view success yang benar di dalam folder 'user'
        return view('user.checkout-success', compact('orderData'));
    }
}