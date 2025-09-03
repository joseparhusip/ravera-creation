@extends('layouts.app')

@section('content')
<style>
    /* Global Styles & Fonts */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f9f9f9;
        color: #333;
    }

    /* Checkout Layout */
    .checkout-container {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding: 100px 20px;
        min-height: 80vh;
        gap: 50px;
        flex-wrap: wrap;
    }

    /* Shopping Cart Section */
    .cart-section {
        width: 100%;
        max-width: 450px;
        padding: 40px;
        background: transparent;
        border-radius: 15px;
        box-shadow: none;
        border: none;
        overflow: visible;
    }

    .cart-header h2, .checkout-header h2 {
        font-family: 'Times New Roman', Times, serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 30px;
    }

    .package-card {
        background: #F4F2E7;
        border-radius: 10px;
        padding: 25px;
        display: flex;
        gap: 20px;
        align-items: flex-start;
        margin-bottom: 30px;
        border: 1px solid #e0e0e0;
        overflow: visible;
    }

    .package-image-placeholder {
        width: 80px;
        height: 80px;
        background-color: #C5B358;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        color: #fff;
        font-weight: bold;
        flex-shrink: 0;
    }

    .package-details {
        flex-grow: 1;
        min-width: 0;
    }

    .package-details h3 {
        font-family: 'Times New Roman', Times, serif;
        font-size: 1.3rem;
        color: #C5B358;
        margin-top: 0;
        margin-bottom: 10px;
    }

    .package-details ul {
        list-style: none;
        padding: 0;
        margin: 0;
        font-size: 0.85rem;
        color: #555;
    }

    .package-details ul li {
        margin-bottom: 4px;
    }

    .package-price {
        font-family: 'Times New Roman', Times, serif;
        font-size: 1.1rem;
        font-weight: bold;
        color: #C5B358;
        margin-top: 15px;
    }

    /* Fixed styles for the payment options dropdown */
    .payment-select-container {
        position: relative;
        width: 100%;
        margin-top: 15px;
        z-index: 100;
    }

    .payment-dropdown-btn {
        width: 100%;
        padding: 8px 12px;
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 6px;
        text-align: left;
        cursor: pointer;
        font-size: 0.9rem;
        position: relative;
        box-sizing: border-box;
    }
    
    .payment-dropdown-btn:after {
        content: '▼';
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 0.7rem;
        color: #777;
    }

    .payment-options-dropdown {
        position: absolute;
        width: 100%;
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 6px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        z-index: 1000;
        display: none;
        top: 100%;
        left: 0;
        margin-top: 2px;
        box-sizing: border-box;
        max-height: 120px;
        overflow-y: auto;
    }

    .payment-options-dropdown.open {
        display: block;
    }

    .payment-option-item {
        padding: 10px 12px;
        cursor: pointer;
        transition: background-color 0.2s ease;
        font-size: 0.9rem;
        border-bottom: 1px solid #f0f0f0;
    }

    .payment-option-item:last-child {
        border-bottom: none;
    }

    .payment-option-item:hover {
        background-color: #f4f2e7;
    }

    /* Summary Section */
    .summary-section {
        margin-top: 30px;
        padding: 20px;
        background: #F4F2E7;
        border-radius: 10px;
        border: 1px solid #e0e0e0;
    }
    
    .summary-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-size: 1rem;
        color: #555;
    }
    
    .summary-item.total {
        font-weight: bold;
        font-size: 1.2rem;
        color: #C5B358;
        border-top: 1px dashed #C5B358;
        padding-top: 15px;
        margin-top: 15px;
    }

    /* Checkout Form Section */
    .checkout-section {
        width: 100%;
        max-width: 450px;
        padding: 40px;
        background: transparent;
        border-radius: 15px;
        box-shadow: none;
        border: none;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ddd;
        font-size: 1rem;
        transition: border-color 0.3s ease;
        background-color: #fcfcfc;
        box-sizing: border-box;
    }

    .form-control:focus {
        outline: none;
        border-color: #C5B358;
        box-shadow: 0 0 0 3px rgba(197, 179, 88, 0.2);
    }
    
    .form-label {
        font-size: 0.9rem;
        color: #777;
        display: block;
        margin-bottom: 5px;
    }

    .coupon-group {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }

    .coupon-group .form-control {
        flex-grow: 1;
    }

    .coupon-btn {
        padding: 12px 20px;
        background-color: #C5B358;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .coupon-btn:hover {
        background-color: #a89b47;
    }

    .coupon-message {
        font-size: 0.85rem;
        margin-top: 5px;
        text-align: center;
    }

    .coupon-message.success {
        color: green;
    }

    .coupon-message.error {
        color: red;
    }

    .checkbox-container {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 20px;
        font-size: 0.95rem;
        color: #555;
    }

    .checkbox-container input[type="checkbox"] {
        cursor: pointer;
    }

    .checkout-btn {
        width: 100%;
        padding: 15px;
        background-color: #C5B358;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: 20px;
    }

    .checkout-btn:hover {
        background-color: #a89b47;
    }
    
    .checkout-btn:disabled {
        background-color: #ccc;
        cursor: not-allowed;
    }

    @media (max-width: 768px) {
        .checkout-container {
            flex-direction: column;
            align-items: center;
            padding-top: 80px;
        }

        .package-card {
            flex-direction: column;
            text-align: center;
        }

        .package-image-placeholder {
            align-self: center;
        }
    }
</style>

<div class="checkout-container">
    {{-- Keranjang Belanja Section --}}
    <div class="cart-section">
        <div class="cart-header">
            <h2>Keranjang Belanja</h2>
        </div>
        
        <div class="package-card">
            <div class="package-image-placeholder">
                <i class="fas fa-gem"></i>
            </div>
            <div class="package-details">
                <h3>{{ $selectedPackage['name'] }}</h3>
                <ul>
                    @foreach ($selectedPackage['features'] as $feature)
                        <li>{{ $feature }}</li>
                    @endforeach
                </ul>
                
                <div class="payment-select-container">
                    <div class="payment-dropdown-btn" id="paymentDropdownBtn">
                        <span id="selectedPaymentText">Bayar penuh</span>
                    </div>
                    <div class="payment-options-dropdown" id="paymentDropdown">
                        <div class="payment-option-item" data-value="full">Bayar penuh</div>
                        <div class="payment-option-item" data-value="down_payment">Uang muka (DP)</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="summary-section">
            <div class="summary-item">
                <span>Subtotal</span>
                <span id="subtotal">Rp 0</span>
            </div>
            <div class="summary-item">
                <span>Diskon Kupon</span>
                <span id="discount-amount">Rp 0</span>
            </div>
            <div class="summary-item">
                <span>Biaya PKP</span>
                <span id="pkp">Rp 0</span>
            </div>
            <div class="summary-item total">
                <span>Total</span>
                <span id="total-price">Rp 0</span>
            </div>
        </div>
    </div>
    
    {{-- Checkout Form Section --}}
    <div class="checkout-section">
        <div class="checkout-header">
            <h2>Checkout</h2>
        </div>
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            
            {{-- Hidden input to store selected package and payment type --}}
            <input type="hidden" name="package" value="{{ $package }}">
            <input type="hidden" name="down_payment" id="downPaymentInput" value="0">
            <input type="hidden" name="discount_amount" id="discountAmountInput" value="0">
            <input type="hidden" name="coupon_code" id="couponCodeInput" value="">
            
            <div class="form-group">
                <label for="phone" class="form-label">Masukkan no telepon sebelum melakukan transaksi*</label>
                <input type="tel" id="phone" name="phone" class="form-control" placeholder="085xxxxxxxxxx" required>
            </div>
            
            <div class="form-group">
                <label for="bank" class="form-label">Pilih metode pembayaran</label>
                <select id="bank" name="bank" class="form-control">
                    <option value="">Pilih bank</option>
                    <option value="bni">BNI</option>
                    <option value="bca">BCA</option>
                    <option value="mandiri">Mandiri</option>
                </select>
            </div>
            
            {{-- Coupon Input Section --}}
            <div class="form-group">
                <label for="coupon" class="form-label">Masukkan kupon diskon</label>
                <div class="coupon-group">
                    <input type="text" id="coupon" name="coupon" class="form-control" placeholder="Kode kupon">
                    <button type="button" class="coupon-btn" id="applyCouponBtn">Terapkan</button>
                </div>
                <div id="coupon-message" class="coupon-message"></div>
            </div>
            
            <div class="form-group">
                <label for="description" class="form-label">Tinggalkan deskripsi untuk brand</label>
                <textarea id="description" name="description" class="form-control" placeholder="Saya sudah melakukan dp a.n Nia Yulandari"></textarea>
            </div>
            
            <div class="checkbox-container">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">Saya setuju dengan <a href="#" style="color: #C5B358;">syarat dan ketentuan</a></label>
            </div>
            
            <button type="submit" class="checkout-btn">Checkout</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const packagePrice = parseInt('{{ $selectedPackage["price"] }}');
        const downPaymentPercentage = 0.5;
        
        const subtotalElement = document.getElementById('subtotal');
        const discountElement = document.getElementById('discount-amount');
        const pkpElement = document.getElementById('pkp');
        const totalElement = document.getElementById('total-price');
        const downPaymentInput = document.getElementById('downPaymentInput');
        const discountAmountInput = document.getElementById('discountAmountInput');
        const couponCodeInput = document.getElementById('couponCodeInput');
        const paymentDropdownBtn = document.getElementById('paymentDropdownBtn');
        const paymentDropdown = document.getElementById('paymentDropdown');
        const selectedPaymentText = document.getElementById('selectedPaymentText');
        const paymentOptions = document.querySelectorAll('.payment-option-item');
        const applyCouponBtn = document.getElementById('applyCouponBtn');
        const couponInput = document.getElementById('coupon');
        const couponMessage = document.getElementById('coupon-message');

        let currentSubtotal = packagePrice;
        let currentDiscount = 0;

        // Function to format currency
        function formatCurrency(amount) {
            return new Intl.NumberFormat('id-ID', { 
                style: 'currency', 
                currency: 'IDR', 
                minimumFractionDigits: 0 
            }).format(amount);
        }

        // Function to update the summary details
        function updateSummary() {
            let totalAmount = Math.max(0, currentSubtotal - currentDiscount);
            const pkpAmount = Math.round(totalAmount * 0.001); // PKP 0.1%
            
            totalAmount += pkpAmount;

            subtotalElement.textContent = formatCurrency(currentSubtotal);
            discountElement.textContent = formatCurrency(currentDiscount);
            pkpElement.textContent = formatCurrency(pkpAmount);
            totalElement.textContent = formatCurrency(totalAmount);
            
            // Update hidden inputs
            discountAmountInput.value = currentDiscount;
        }

        // Initial update
        updateSummary();

        // Toggle payment dropdown
        paymentDropdownBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            paymentDropdown.classList.toggle('open');
        });

        // Handle payment option selection
        paymentOptions.forEach(option => {
            option.addEventListener('click', function(e) {
                e.stopPropagation();
                const value = this.getAttribute('data-value');
                const text = this.textContent;
                
                selectedPaymentText.textContent = text;
                paymentDropdown.classList.remove('open');

                if (value === 'down_payment') {
                    currentSubtotal = Math.round(packagePrice * downPaymentPercentage);
                    downPaymentInput.value = '1';
                } else {
                    currentSubtotal = packagePrice;
                    downPaymentInput.value = '0';
                }
                
                // Recalculate summary after changing payment type
                updateSummary();
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!paymentDropdownBtn.contains(e.target) && !paymentDropdown.contains(e.target)) {
                paymentDropdown.classList.remove('open');
            }
        });

        // Handle coupon application
        applyCouponBtn.addEventListener('click', function() {
            const couponCode = couponInput.value.trim().toLowerCase();
            
            // Send request to check coupon (using a simple, dummy check here)
            const validCoupons = {
                'ulbikeren': 500000,
                'ulbimantap': 1000000,
                'ulbihebat': 2000000
            };

            if (validCoupons[couponCode]) {
                currentDiscount = validCoupons[couponCode];
                couponCodeInput.value = couponCode;
                couponMessage.textContent = 'Kupon berhasil diterapkan!';
                couponMessage.className = 'coupon-message success';
            } else {
                currentDiscount = 0;
                couponCodeInput.value = '';
                couponMessage.textContent = 'Kupon tidak valid.';
                couponMessage.className = 'coupon-message error';
            }

            updateSummary();
        });
    });
</script>
@endsection