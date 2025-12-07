<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
        .success-container { background: white; border-radius: 10px; box-shadow: 0 10px 40px rgba(0,0,0,0.2); overflow: hidden; }
        .success-header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 40px 30px; text-align: center; }
        .success-icon { font-size: 60px; margin-bottom: 15px; }
        .success-body { padding: 40px 30px; }
        .order-info-card { background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 15px 0; border-left: 4px solid #667eea; }
        .info-row { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #e0e0e0; }
        .info-row:last-child { border-bottom: none; }
        .info-label { font-weight: 600; color: #333; }
        .info-value { color: #666; }
        .payment-instruction { background: #fff3cd; padding: 20px; border-radius: 8px; margin: 20px 0; border-left: 4px solid #ffc107; }
        .payment-instruction h5 { color: #856404; margin-bottom: 15px; }
        .bank-detail { background: white; padding: 15px; border: 2px solid #667eea; border-radius: 8px; margin: 10px 0; text-align: center; }
        .bank-detail-label { font-size: 12px; color: #999; text-transform: uppercase; }
        .bank-detail-value { font-size: 18px; font-weight: 700; color: #667eea; word-break: break-all; }
        .copy-btn { padding: 5px 10px; font-size: 12px; }
        .status-badge { display: inline-block; padding: 8px 15px; border-radius: 20px; font-weight: 600; margin: 10px 0; }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-completed { background: #d4edda; color: #155724; }
        .items-table { width: 100%; margin: 20px 0; }
        .items-table th { background: #f8f9fa; padding: 12px; font-weight: 600; border-bottom: 2px solid #dee2e6; }
        .items-table td { padding: 12px; border-bottom: 1px solid #dee2e6; }
        .action-buttons { display: flex; gap: 10px; margin-top: 30px; }
        .action-buttons a { flex: 1; padding: 12px 20px; text-align: center; border-radius: 5px; text-decoration: none; font-weight: 600; }
        .btn-primary-custom { background: #667eea; color: white; }
        .btn-primary-custom:hover { background: #5568d3; color: white; }
        .btn-secondary-custom { background: #e0e0e0; color: #333; }
        .btn-secondary-custom:hover { background: #d0d0d0; color: #333; }
        @media (max-width: 768px) {
            .success-body { padding: 20px 15px; }
            .info-row { flex-direction: column; }
            .info-value { margin-top: 5px; }
            .action-buttons { flex-direction: column; }
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="success-container">
        <!-- Header -->
        <div class="success-header">
            <div class="success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1 class="mb-2">Pesanan Berhasil Dibuat!</h1>
            <p class="mb-0">Terima kasih telah berbelanja bersama kami</p>
        </div>

        <!-- Body -->
        <div class="success-body">
            <!-- Status Badge -->
            <div class="text-center">
                <span class="status-badge status-pending">
                    <i class="fas fa-clock"></i> Menunggu Pembayaran
                </span>
            </div>

            <!-- Order Info -->
            <div class="order-info-card">
                <h5 class="mb-3"><i class="fas fa-receipt"></i> Informasi Pesanan</h5>
                <div class="info-row">
                    <span class="info-label">Nomor Pesanan:</span>
                    <span class="info-value">#{{ $order->id }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Tanggal:</span>
                    <span class="info-value">{{ $order->created_at->format('d M Y, H:i') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Status Pembayaran:</span>
                    <span class="info-value">
                        @if($order->payment_status === 'pending')
                            <span class="badge bg-warning">Menunggu</span>
                        @elseif($order->payment_status === 'completed')
                            <span class="badge bg-success">Lunas</span>
                        @else
                            <span class="badge bg-danger">Gagal</span>
                        @endif
                    </span>
                </div>
            </div>

            <!-- Customer Info -->
            <div class="order-info-card">
                <h5 class="mb-3"><i class="fas fa-user"></i> Informasi Penerima</h5>
                <div class="info-row">
                    <span class="info-label">Nama:</span>
                    <span class="info-value">{{ $order->customer_name }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Email:</span>
                    <span class="info-value">{{ $order->email }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Telepon:</span>
                    <span class="info-value">{{ $order->phone ?? '-' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Alamat:</span>
                    <span class="info-value">{{ $order->address }}, {{ $order->city }}, {{ $order->state }}, {{ $order->country }} {{ $order->postcode }}</span>
                </div>
            </div>

            <!-- Items -->
            <div class="order-info-card">
                <h5 class="mb-3"><i class="fas fa-box"></i> Produk yang Dipesan</h5>
                <table class="items-table">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th style="text-align: right; width: 80px;">Qty</th>
                            <th style="text-align: right; width: 120px;">Harga</th>
                            <th style="text-align: right; width: 120px;">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product_name }}</td>
                            <td style="text-align: right;">{{ $item->quantity }}</td>
                            <td style="text-align: right;">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                            <td style="text-align: right;">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Payment Info -->
            <div class="order-info-card">
                <h5 class="mb-3"><i class="fas fa-money-check"></i> Rincian Pembayaran</h5>
                <div class="info-row">
                    <span class="info-label">Metode Pembayaran:</span>
                    <span class="info-value">
                        @if($order->payment_method === 'cash')
                            <span class="badge bg-success">Tunai (COD)</span>
                        @else
                            <span class="badge bg-info">Non-Tunai</span>
                        @endif
                    </span>
                </div>
                @if($order->payment_details)
                <div class="info-row">
                    <span class="info-label">Detail Pembayaran:</span>
                    <span class="info-value">{{ $order->payment_details }}</span>
                </div>
                @endif
                <div class="info-row">
                    <span class="info-label">Subtotal:</span>
                    <span class="info-value">Rp {{ number_format($order->subtotal, 0, ',', '.') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Biaya Pengiriman:</span>
                    <span class="info-value">Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}</span>
                </div>
                <div class="info-row" style="border-bottom: 2px solid #667eea; padding-top: 15px;">
                    <span class="info-label" style="font-size: 16px;">Total Pembayaran:</span>
                    <span class="info-value" style="font-size: 16px; color: #667eea; font-weight: 700;">Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Payment Instructions -->
            @if($order->payment_method === 'non-cash')
            <div class="payment-instruction">
                <h5><i class="fas fa-info-circle"></i> Instruksi Pembayaran</h5>

                @if($order->payment_details && strpos($order->payment_details, 'Transfer Bank') !== false)
                <p>Silakan lakukan transfer ke rekening berikut:</p>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="bank-detail">
                            <div class="bank-detail-label">Nama Bank</div>
                            <div class="bank-detail-value" id="bank-name-display">BCA</div>
                            <button class="btn btn-sm copy-btn mt-2" onclick="copyToClipboard('bank-name-display')">
                                <i class="fas fa-copy"></i> Salin
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bank-detail">
                            <div class="bank-detail-label">Nomor Rekening</div>
                            <div class="bank-detail-value" id="bank-account-display">1234567890</div>
                            <button class="btn btn-sm copy-btn mt-2" onclick="copyToClipboard('bank-account-display')">
                                <i class="fas fa-copy"></i> Salin
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bank-detail mt-3">
                    <div class="bank-detail-label">Atas Nama</div>
                    <div class="bank-detail-value" id="bank-name-account-display">PT. E-Commerce Indonesia</div>
                    <button class="btn btn-sm copy-btn mt-2" onclick="copyToClipboard('bank-name-account-display')">
                        <i class="fas fa-copy"></i> Salin
                    </button>
                </div>

                <div class="alert alert-warning mt-3 mb-0">
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Penting:</strong> Pastikan nominal transfer sesuai dengan total pembayaran di atas (Rp {{ number_format($order->total, 0, ',', '.') }}) agar pesanan kami dapat langsung diproses.
                </div>

                @else
                <p>Terima kasih telah memilih pembayaran {{ $order->payment_details ?? 'non-tunai' }}.</p>
                <div class="alert alert-info mt-3 mb-0">
                    <i class="fas fa-info-circle"></i>
                    Pesanan Anda akan diproses setelah pembayaran kami terima dan verifikasi.
                </div>
                @endif
            </div>

            @else
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i>
                <strong>Pembayaran COD (Tunai):</strong> Anda akan melakukan pembayaran sebesar <strong>Rp {{ number_format($order->total, 0, ',', '.') }}</strong> saat barang tiba. Pesanan Anda akan segera diproses dan dikirim.
            </div>
            @endif

            <!-- Action Buttons -->
            <div class="action-buttons">
                <a href="{{ url('/product') }}" class="btn-primary-custom">
                    <i class="fas fa-shopping-bag"></i> Lanjut Belanja
                </a>
                <a href="{{ url('/') }}" class="btn-secondary-custom">
                    <i class="fas fa-home"></i> Kembali Beranda
                </a>
            </div>

            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; text-align: center; color: #999; font-size: 14px;">
                <p>Terima kasih atas kepercayaan Anda. Jika ada pertanyaan, silakan hubungi customer service kami.</p>
            </div>
        </div>
    </div>
</div>

<script>
    // Sample data - ganti dengan data dari server
    const bankData = {
        'bank_name': 'BCA',
        'bank_account': '1234567890',
        'bank_account_name': 'PT. E-Commerce Indonesia'
    };

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('bank-name-display').textContent = bankData.bank_name;
        document.getElementById('bank-account-display').textContent = bankData.bank_account;
        document.getElementById('bank-name-account-display').textContent = bankData.bank_account_name;
    });

    function copyToClipboard(elementId) {
        const element = document.getElementById(elementId);
        const text = element.textContent;

        navigator.clipboard.writeText(text).then(function() {
            const btn = event.target.closest('button');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-check"></i> Tersalin!';
            setTimeout(function() {
                btn.innerHTML = originalText;
            }, 2000);
        }).catch(function(err) {
            alert('Gagal menyalin: ' + err);
        });
    }
</script>

</body>
</html>
