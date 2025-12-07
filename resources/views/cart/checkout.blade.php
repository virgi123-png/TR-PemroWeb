<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .container { max-width: 1200px; margin: 0 auto; }
        .page-header { text-align: center; padding: 40px 0; }
        .page-header h2 { font-weight: 700; margin-bottom: 15px; }
        .page-header p { color: #6c757d; font-size: 1.1rem; }
        .invalid-feedback { display: block; }
    </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            <i class="fas fa-shopping-bag"></i> E-Commerce
        </a>
        <span class="navbar-text text-muted">Checkout</span>
    </div>
</nav>

<div class="container py-5">
    <!-- Header -->
    <div class="page-header">
        <h2>Checkout</h2>
        <p class="lead">Lengkapi data berikut untuk menyelesaikan pemesanan Anda</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-4">
            <h5><i class="fas fa-exclamation-circle"></i> Terjadi Kesalahan:</h5>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4">
            <i class="fas fa-times-circle"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-5">
        <!-- Order Summary (Right) -->
        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Ringkasan Pesanan</span>
                <span class="badge bg-primary rounded-pill">{{ $cartItems->count() }}</span>
            </h4>
            <ul class="list-group mb-3">
                @forelse($cartItems as $item)
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">{{ $item->product->nama_produk }}</h6>
                        <small class="text-muted">x{{ $item->quantity }}</small>
                    </div>
                    <span class="text-muted">Rp {{ number_format($item->quantity * $item->product->harga_produk, 0, ',', '.') }}</span>
                </li>
                @empty
                <li class="list-group-item text-center text-muted py-3">Keranjang kosong</li>
                @endforelse

                <li class="list-group-item d-flex justify-content-between">
                    <span>Subtotal</span>
                    <strong>Rp {{ number_format($subtotal, 0, ',', '.') }}</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Biaya Pengiriman</span>
                    <strong id="display-shipping">Rp 0</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between" id="handling-fee-display" style="display: none;">
                    <span>Biaya Penanganan (COD)</span>
                    <strong id="handling-fee-value"></strong>
                </li>
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <span>Total</span>
                    <strong id="display-total">Rp {{ number_format($subtotal, 0, ',', '.') }}</strong>
                </li>
            </ul>
        </div>

        <!-- Checkout Form (Left) -->
        <div class="col-md-7 col-lg-8">
            <form action="{{ route('cart.checkout') }}" method="POST" id="checkoutForm" class="needs-validation" novalidate>
                @csrf

                <!-- Billing Address Section -->
                <h4 class="mb-3">Alamat Pengiriman</h4>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="first_name" class="form-label">Nama Depan *</label>
                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                               id="first_name" value="{{ old('first_name') }}" required>
                        @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-sm-6">
                        <label for="last_name" class="form-label">Nama Belakang *</label>
                        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                               id="last_name" value="{{ old('last_name') }}" required>
                        @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               id="email" value="{{ old('email', $user->email) }}" required>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror"
                               id="phone" placeholder="+62..." value="{{ old('phone') }}">
                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Alamat Lengkap *</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                               id="address" placeholder="Jl. Contoh No. 123" value="{{ old('address') }}" required>
                        @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12">
                        <label for="address2" class="form-label">Alamat Lanjutan (Opsional)</label>
                        <input type="text" name="address2" class="form-control"
                               id="address2" placeholder="Apt, Suite, Kompleks, dll" value="{{ old('address2') }}">
                    </div>

                    <div class="col-md-5">
                        <label for="country" class="form-label">Negara *</label>
                        <input type="text" name="country" class="form-control @error('country') is-invalid @enderror"
                               id="country" value="{{ old('country') }}" required onchange="updateShippingAuto()">
                        @error('country') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="state" class="form-label">Provinsi/State *</label>
                        <input type="text" name="state" class="form-control @error('state') is-invalid @enderror"
                               id="state" value="{{ old('state') }}" required onchange="updateShippingAuto()">
                        @error('state') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="city" class="form-label">Kota *</label>
                        <input type="text" name="city" class="form-control @error('city') is-invalid @enderror"
                               id="city" value="{{ old('city') }}" required onchange="updateShippingAuto()">
                        @error('city') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="postcode" class="form-label">Kode Pos *</label>
                        <input type="text" name="postcode" class="form-control @error('postcode') is-invalid @enderror"
                               id="postcode" value="{{ old('postcode') }}" required onchange="updateShippingAuto()">
                        @error('postcode') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="alert alert-info mt-3 mb-4">
                    <i class="fas fa-info-circle"></i>
                    <strong>Biaya Pengiriman Otomatis:</strong>
                    <div class="mt-2">Indonesia: Rp 10.000 | USA: Rp 25.000 | Lainnya: Rp 36.000</div>
                </div>

                <hr class="my-4">

                <!-- Payment Method Section -->
                <h4 class="mb-3">Metode Pembayaran</h4>

                <div class="my-3">
                    <div class="form-check">
                        <input id="pm-cash" name="payment_method" type="radio" class="form-check-input" value="cash" checked required onchange="selectPayment('cash')">
                        <label class="form-check-label" for="pm-cash">
                            <strong><i class="fas fa-money-bill-wave"></i> Tunai (COD)</strong>
                            <br><small class="text-muted">Bayar saat barang diterima + Biaya Penanganan Rp 2.500</small>
                        </label>
                    </div>
                </div>

                <div class="my-3">
                    <div class="form-check">
                        <input id="pm-noncash" name="payment_method" type="radio" class="form-check-input" value="non-cash" required onchange="selectPayment('non-cash')">
                        <label class="form-check-label" for="pm-noncash">
                            <strong><i class="fas fa-university"></i> Non Tunai</strong>
                            <br><small class="text-muted">Gratis biaya penanganan</small>
                        </label>
                    </div>
                </div>

                <!-- Inline Payment Form -->
                <div id="payment-form-section" style="display: none;">
                    <hr class="my-4">
                    <h5 class="mb-3">Pilih Metode Pembayaran</h5>

                    <div class="row gy-2 mb-3">
                        <div class="col-12">
                            <div class="form-check">
                                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" value="credit" checked onchange="updatePaymentFields()">
                                <label class="form-check-label" for="credit">Credit Card</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input id="debit" name="paymentMethod" type="radio" class="form-check-input" value="debit" onchange="updatePaymentFields()">
                                <label class="form-check-label" for="debit">Debit Card</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" value="paypal" onchange="updatePaymentFields()">
                                <label class="form-check-label" for="paypal">PayPal</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input id="banktransfer" name="paymentMethod" type="radio" class="form-check-input" value="bank_transfer" onchange="updatePaymentFields()">
                                <label class="form-check-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input id="ewallet" name="paymentMethod" type="radio" class="form-check-input" value="ewallet" onchange="updatePaymentFields()">
                                <label class="form-check-label" for="ewallet">E-Wallet</label>
                            </div>
                        </div>
                    </div>

                    <!-- Card Fields -->
                    <div id="card-payment-fields" class="row gy-3">
                        <div class="col-md-6">
                            <label for="cc-name" class="form-label">Nama Pemilik Kartu *</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="Nama sesuai kartu">
                        </div>
                        <div class="col-md-6">
                            <label for="cc-number" class="form-label">Nomor Kartu *</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="1234 5678 9012 3456" maxlength="19">
                        </div>
                        <div class="col-md-3">
                            <label for="cc-expiration" class="form-label">Exp (MM/YY) *</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="12/25" maxlength="5">
                        </div>
                        <div class="col-md-3">
                            <label for="cc-cvv" class="form-label">CVV *</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="123" maxlength="4">
                        </div>
                    </div>

                    <!-- Bank Transfer Fields -->
                    <div id="bank-transfer-fields" style="display: none;" class="row gy-3">
                        <div class="col-12">
                            <label class="form-label">Nama Bank *</label>
                            <input type="text" class="form-control" id="bank-name" placeholder="BCA, Mandiri, BNI">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Nomor Rekening *</label>
                            <input type="text" class="form-control" id="bank-account" placeholder="1234567890">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Atas Nama *</label>
                            <input type="text" class="form-control" id="bank-account-name" placeholder="Nama pemilik rekening">
                        </div>
                    </div>

                    <!-- E-Wallet Fields -->
                    <div id="ewallet-fields" style="display: none;" class="row gy-3">
                        <div class="col-12">
                            <label class="form-label">Jenis E-Wallet *</label>
                            <select class="form-select" id="ewallet-type">
                                <option value="">-- Pilih E-Wallet --</option>
                                <option value="gopay">GoPay</option>
                                <option value="ovo">OVO</option>
                                <option value="dana">DANA</option>
                                <option value="linkaja">LinkAja</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Nomor/ID E-Wallet *</label>
                            <input type="text" class="form-control" id="ewallet-id" placeholder="Nomor terdaftar">
                        </div>
                    </div>
                </div>

                <!-- Hidden Inputs -->
                <input type="hidden" name="bank_method" id="bank_method_hidden">
                <input type="hidden" name="cc_name" id="cc_name_hidden">
                <input type="hidden" name="cc_number" id="cc_number_hidden">
                <input type="hidden" name="cc_expiration" id="cc_expiration_hidden">
                <input type="hidden" name="cc_cvv" id="cc_cvv_hidden">
                <input type="hidden" name="bank_name" id="bank_name_hidden">
                <input type="hidden" name="bank_account" id="bank_account_hidden">
                <input type="hidden" name="bank_account_name" id="bank_account_name_hidden">
                <input type="hidden" name="ewallet_type" id="ewallet_type_hidden">
                <input type="hidden" name="ewallet_id" id="ewallet_id_hidden">
                <input type="hidden" name="shipping_cost" id="shipping_cost_hidden">

                <hr class="my-4">

                <!-- Action Buttons -->
                <div class="d-flex gap-2">
                    <a href="{{ route('cart.index') }}" class="btn btn-secondary flex-grow-1">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary flex-grow-1">
                        <i class="fas fa-check"></i> Pesan Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<footer class="bg-light py-4 text-center text-muted mt-5 border-top">
    <p class="mb-0">&copy; 2024 E-Commerce. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const subtotal = {{ $subtotal }};
    let shippingCost = 0;

    function selectPayment(method) {
        const paymentForm = document.getElementById('payment-form-section');
        paymentForm.style.display = (method === 'non-cash') ? 'block' : 'none';
        updateTotal();
    }

    function updatePaymentFields() {
        const method = document.querySelector('input[name="paymentMethod"]:checked')?.value;
        document.getElementById('card-payment-fields').style.display = (method === 'credit' || method === 'debit') ? 'block' : 'none';
        document.getElementById('bank-transfer-fields').style.display = (method === 'bank_transfer') ? 'block' : 'none';
        document.getElementById('ewallet-fields').style.display = (method === 'ewallet') ? 'block' : 'none';
    }

    function updateTotal() {
        const pm = document.querySelector('input[name="payment_method"]:checked').value;
        let fee = pm === 'cash' ? 2500 : 0;
        const total = subtotal + shippingCost + fee;

        document.getElementById('display-shipping').textContent = 'Rp ' + shippingCost.toLocaleString('id-ID');
        document.getElementById('display-total').textContent = 'Rp ' + total.toLocaleString('id-ID');

        const handlingFeeDisplay = document.getElementById('handling-fee-display');
        if (fee > 0) {
            handlingFeeDisplay.style.display = 'flex';
            document.getElementById('handling-fee-value').textContent = 'Rp ' + fee.toLocaleString('id-ID');
        } else {
            handlingFeeDisplay.style.display = 'none';
        }
    }

    function updateShippingAuto() {
        const country = document.getElementById('country').value.toLowerCase().trim();
        const state = document.getElementById('state').value.trim();
        const city = document.getElementById('city').value.trim();
        const postcode = document.getElementById('postcode').value.trim();

        if (!country || !state || !city || !postcode) {
            shippingCost = 0;
            updateTotal();
            return;
        }

        if (country.includes('indonesia')) {
            shippingCost = 10000;
        } else if (country.includes('usa') || country.includes('america')) {
            shippingCost = 25000;
        } else {
            shippingCost = 36000;
        }
        updateTotal();
    }

    document.getElementById('checkoutForm').addEventListener('submit', function(e) {
        const country = document.getElementById('country').value.trim();
        const city = document.getElementById('city').value.trim();
        const postcode = document.getElementById('postcode').value.trim();
        const state = document.getElementById('state').value.trim();

        if (!country || !state || !city || !postcode) {
            e.preventDefault();
            alert('Harap lengkapi semua data alamat pengiriman');
            return false;
        }

        if (shippingCost === 0) {
            e.preventDefault();
            alert('Biaya pengiriman tidak terhitung');
            return false;
        }

        const pm = document.querySelector('input[name="payment_method"]:checked').value;

        if (pm === 'non-cash') {
            const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked');
            if (!paymentMethod) {
                e.preventDefault();
                alert('Pilih metode pembayaran');
                return false;
            }

            const method = paymentMethod.value;

            if (method === 'credit' || method === 'debit') {
                if (!document.getElementById('cc-name').value.trim() || !document.getElementById('cc-number').value.trim() ||
                    !document.getElementById('cc-expiration').value.trim() || !document.getElementById('cc-cvv').value.trim()) {
                    e.preventDefault();
                    alert('Lengkapi semua data kartu');
                    return false;
                }
                document.getElementById('cc_name_hidden').value = document.getElementById('cc-name').value.trim();
                document.getElementById('cc_number_hidden').value = document.getElementById('cc-number').value.trim();
                document.getElementById('cc_expiration_hidden').value = document.getElementById('cc-expiration').value.trim();
                document.getElementById('cc_cvv_hidden').value = document.getElementById('cc-cvv').value.trim();
                document.getElementById('bank_method_hidden').value = method === 'credit' ? 'kartu_kredit' : 'kartu_debit';
            } else if (method === 'bank_transfer') {
                if (!document.getElementById('bank-name').value.trim() || !document.getElementById('bank-account').value.trim() ||
                    !document.getElementById('bank-account-name').value.trim()) {
                    e.preventDefault();
                    alert('Lengkapi semua data transfer bank');
                    return false;
                }
                document.getElementById('bank_name_hidden').value = document.getElementById('bank-name').value.trim();
                document.getElementById('bank_account_hidden').value = document.getElementById('bank-account').value.trim();
                document.getElementById('bank_account_name_hidden').value = document.getElementById('bank-account-name').value.trim();
                document.getElementById('bank_method_hidden').value = 'transfer_bank';
            } else if (method === 'ewallet') {
                if (!document.getElementById('ewallet-type').value || !document.getElementById('ewallet-id').value.trim()) {
                    e.preventDefault();
                    alert('Lengkapi semua data e-wallet');
                    return false;
                }
                document.getElementById('ewallet_type_hidden').value = document.getElementById('ewallet-type').value;
                document.getElementById('ewallet_id_hidden').value = document.getElementById('ewallet-id').value.trim();
                document.getElementById('bank_method_hidden').value = 'e_wallet';
            } else if (method === 'paypal') {
                document.getElementById('bank_method_hidden').value = 'paypal';
            }
        }

        document.getElementById('shipping_cost_hidden').value = shippingCost;
        return true;
    });

    document.addEventListener('DOMContentLoaded', function() {
        updateShippingAuto();
        updateTotal();
    });
</script>

</body>
</html>
