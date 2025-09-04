@extends('layouts.app')

@section('content')
<style>
    /* Global Styles & Fonts */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #FFFFFF; /* Ganti background jadi putih bersih */
        color: #333;
    }

    /* Skeleton Animation */
    @keyframes shimmer {
        0% { background-position: -200px 0; }
        100% { background-position: calc(200px + 100%) 0; }
    }

    .skeleton {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200px 100%;
        animation: shimmer 1.5s ease-in-out infinite;
        border-radius: 4px;
    }

    /* Checkout Layout */
    .checkout-container {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding: 120px 20px 50px;
        min-height: 80vh;
        gap: 60px;
        flex-wrap: wrap;
        max-width: 1100px;
        margin: 0 auto;
    }

    /* Bagian Kiri (Keranjang) & Kanan (Form) */
    .cart-section, .checkout-section {
        flex: 1;
        min-width: 320px;
        max-width: 500px;
    }
    
    .cart-header h2, .checkout-header h2 {
        font-family: 'Times New Roman', Times, serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 30px;
    }

    /* Styling Kartu Paket */
    .package-card {
        background: #F8F8F8;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 30px;
        border: 1px solid #EAEAEA;
    }
    .package-card h3 {
        font-family: 'Times New Roman', Times, serif;
        font-size: 1.8rem;
        color: #C5B358;
        margin-top: 0;
    }
    .package-card ul {
        list-style: none;
        padding-left: 0;
        color: #666;
    }
    .package-card ul li {
        margin-bottom: 8px;
        position: relative;
        padding-left: 20px;
    }
    .package-card ul li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: #C5B358;
    }
    
    /* Styling Ringkasan Pembayaran */
    .summary-section {
        background: #F8F8F8;
        border-radius: 15px;
        padding: 25px;
        border: 1px solid #EAEAEA;
    }
    .summary-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        font-size: 1rem;
        color: #555;
    }
    .summary-total {
        border-top: 2px dashed #C5B358;
        padding-top: 20px;
        margin-top: 20px;
        font-weight: bold;
        font-size: 1.2rem;
    }
    .summary-total .value { color: #C5B358; }

    /* Styling Form Checkout */
    .form-group { margin-bottom: 25px; }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #555;
    }
    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
        transition: border-color 0.3s, box-shadow 0.3s;
    }
    .form-control:focus {
        border-color: #C5B358;
        box-shadow: 0 0 0 3px rgba(197, 179, 88, 0.2);
        outline: none;
    }
    .btn-checkout {
        width: 100%;
        padding: 15px;
        background-color: #C5B358;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .btn-checkout:hover { background-color: #a89b47; }
    
    /* Responsive */
    @media (max-width: 992px) {
        .checkout-container {
            flex-direction: column;
            align-items: center;
            padding-top: 80px;
            gap: 30px;
        }
    }

    /* Skeleton Specifics */
    .skeleton-header { height: 40px; width: 60%; margin-bottom: 30px; }
    .skeleton-package-card { padding: 25px; margin-bottom: 30px; }
    .skeleton-package-title { height: 28px; width: 50%; margin-bottom: 20px; }
    .skeleton-feature { height: 16px; margin-bottom: 10px; }
    .skeleton-summary-item { display: flex; justify-content: space-between; margin-bottom: 15px; }
    .skeleton-summary-label { height: 16px; width: 30%; }
    .skeleton-summary-value { height: 16px; width: 25%; }
    .skeleton-summary-total { border-top: 2px dashed #ccc; padding-top: 20px; margin-top: 20px; }
    .skeleton-label { height: 16px; width: 40%; margin-bottom: 8px; }
    .skeleton-input { height: 48px; width: 100%; }
    .skeleton-checkout-btn { height: 54px; width: 100%; margin-top: 20px; }
</style>

<div id="skeleton-checkout">
    <div class="checkout-container">
        {{-- Keranjang Belanja Skeleton --}}
        <div class="cart-section">
            <div class="cart-header"><div class="skeleton skeleton-header"></div></div>
            <div class="package-card skeleton-package-card">
                <div class="skeleton skeleton-package-title"></div>
                <div class="skeleton skeleton-feature" style="width: 80%;"></div>
                <div class="skeleton skeleton-feature" style="width: 70%;"></div>
                <div class="skeleton skeleton-feature" style="width: 75%;"></div>
            </div>
            <div class="summary-section">
                <div class="skeleton-summary-item">
                    <div class="skeleton skeleton-summary-label"></div>
                    <div class="skeleton skeleton-summary-value"></div>
                </div>
                <div class="skeleton-summary-item">
                    <div class="skeleton skeleton-summary-label"></div>
                    <div class="skeleton skeleton-summary-value"></div>
                </div>
                <div class="skeleton-summary-item skeleton-summary-total">
                    <div class="skeleton skeleton-summary-label"></div>
                    <div class="skeleton skeleton-summary-value"></div>
                </div>
            </div>
        </div>
        {{-- Checkout Form Skeleton --}}
        <div class="checkout-section">
            <div class="checkout-header"><div class="skeleton skeleton-header"></div></div>
            <div class="form-group"><div class="skeleton skeleton-label"></div><div class="skeleton skeleton-input"></div></div>
            <div class="form-group"><div class="skeleton skeleton-label"></div><div class="skeleton skeleton-input"></div></div>
            <div class="form-group"><div class="skeleton skeleton-label"></div><div class="skeleton skeleton-input"></div></div>
            <div class="skeleton skeleton-checkout-btn"></div>
        </div>
    </div>
</div>

<div id="real-checkout" style="display: none;">
    <div class="checkout-container">
        {{-- Keranjang Belanja Section --}}
        <div class="cart-section">
            <div class="cart-header"><h2>Keranjang Anda</h2></div>
            
            <div class="package-card">
                <h3>{{ $packageData['name'] ?? 'Nama Paket' }}</h3>
                <ul>
                    @if(isset($packageData['features']))
                        @foreach($packageData['features'] as $feature)
                            <li>{{ $feature }}</li>
                        @endforeach
                    @endif
                </ul>
            </div>
            
            <div class="summary-section">
                <div class="summary-item">
                    <span class="label">Subtotal</span>
                    <span class="value">{{ $packageData['price_formatted'] ?? 'Rp 0' }}</span>
                </div>
                <div class="summary-item">
                    <span class="label">Diskon</span>
                    <span class="value">Rp 0</span>
                </div>
                <div class="summary-item summary-total">
                    <span class="label">Total</span>
                    <span class="value">{{ $packageData['price_formatted'] ?? 'Rp 0' }}</span>
                </div>
            </div>
        </div>
        
        {{-- Checkout Form Section --}}
        <div class="checkout-section">
            <div class="checkout-header"><h2>Detail Pembayaran</h2></div>
            
            <form action="#" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone">Nomor Telepon</label>
                    <input type="tel" id="phone" name="phone" class="form-control" required>
                </div>
                 <div class="form-group">
                    <label for="event_date">Tanggal Acara</label>
                    <input type="date" id="event_date" name="event_date" class="form-control" required>
                </div>
                <button type="submit" class="btn-checkout">Lanjutkan ke Pembayaran</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const skeleton = document.getElementById('skeleton-checkout');
        const realContent = document.getElementById('real-checkout');

        // Simulasikan loading data
        setTimeout(() => {
            skeleton.style.display = 'none';
            realContent.style.display = 'block';
        }, 1500); // 1.5 detik
    });
</script>
@endsection