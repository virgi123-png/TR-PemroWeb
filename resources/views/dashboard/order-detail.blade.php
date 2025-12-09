<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Order #{{ $order->id }} - Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('images/icons/logo-02.png') }}" type="image/x-icon" />
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: ["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ["{{ asset('assets/css/fonts.min.css') }}"],
            },
            active: function () { sessionStorage.fonts = true; },
        });
    </script>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <style>
        .order-header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; border-radius: 8px; margin: 30px 0 25px 0; }
        .order-header h2 { margin: 0; font-weight: 700; }
        .order-header p { margin: 5px 0 0 0; opacity: 0.9; }
        .info-card { background: white; border: 1px solid #e9ecef; border-radius: 8px; padding: 25px; margin-bottom: 20px; }
        .info-card-title { font-weight: 600; font-size: 1.1rem; margin-bottom: 20px; color: #212529; border-bottom: 2px solid #f0f0f0; padding-bottom: 15px; }
        .info-row { display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid #f0f0f0; }
        .info-row:last-child { border-bottom: none; }
        .info-label { font-weight: 500; color: #666; }
        .info-value { font-weight: 600; color: #212529; }
        .badge-status { padding: 8px 15px; border-radius: 20px; display: inline-block; font-weight: 600; }
        .table-products { width: 100%; }
        .table-products thead { background: #f8f9fa; }
        .table-products th { padding: 15px; font-weight: 600; border: none; }
        .table-products td { padding: 15px; border-bottom: 1px solid #e9ecef; }
        .table-products tbody tr:hover { background: #f8f9fa; }
        .action-buttons { display: flex; gap: 10px; margin-top: 25px; }
        .action-buttons form { flex: 1; }
        .action-buttons button { width: 100%; padding: 12px 20px; border: none; border-radius: 5px; font-weight: 600; cursor: pointer; transition: all 0.3s; }
        .btn-confirm { background: #28a745; color: white; }
        .btn-confirm:hover { background: #218838; }
        .btn-reject { background: #dc3545; color: white; }
        .btn-reject:hover { background: #c82333; }
        .btn-update { background: #007bff; color: white; }
        .btn-update:hover { background: #0056b3; }
        .action-section { background: white; border: 1px solid #e9ecef; border-radius: 8px; padding: 25px; margin-bottom: 20px; }
        .action-section-title { font-weight: 600; font-size: 1.1rem; margin-bottom: 20px; color: #212529; }
        .total-section { background: #f8f9fa; padding: 20px; border-radius: 8px; margin-top: 15px; }
        .total-row { display: flex; justify-content: space-between; padding: 10px 0; }
        .total-row.grand-total { border-top: 2px solid #dee2e6; padding-top: 15px; font-size: 1.2rem; font-weight: 700; color: #007bff; }
        .status-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px; }
        .status-card { background: #f8f9fa; padding: 15px; border-radius: 8px; border-left: 4px solid #007bff; }
        .status-card.warning { border-left-color: #ffc107; }
        .status-card.success { border-left-color: #28a745; }
        .status-card.danger { border-left-color: #dc3545; }
        .status-card-label { font-size: 0.9rem; color: #666; margin-bottom: 5px; }
        .status-card-value { font-weight: 600; color: #212529; }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <div class="logo-header" data-background-color="dark">
                    <a class="logo"><img src="{{ asset('images/icons/logo-02.png') }}" alt="navbar brand" class="navbar-brand" height="20" /></a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar"><i class="gg-menu-right"></i></button>
                        <button class="btn btn-toggle sidenav-toggler"><i class="gg-menu-left"></i></button>
                    </div>
                    <button class="topbar-toggler more"><i class="gg-more-vertical-alt"></i></button>
                </div>
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon"><i class="fa fa-ellipsis-h"></i></span>
                            <h4 class="text-section">Components</h4>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#forms">
                                <i class="fas fa-pen-square"></i>
                                <p>Produk</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="forms">
                                <ul class="nav nav-collapse">
                                    <li><a href="{{ route('dashboard.forms') }}"><span class="sub-item">Tipe Jam</span></a></li>
                                    <li><a href="{{ route('dashboard.products') }}"><span class="sub-item">Jam</span></a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item active submenu">
                            <a data-bs-toggle="collapse" href="#orders">
                                <i class="fas fa-shopping-cart"></i>
                                <p>Pesanan</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse show" id="orders">
                                <ul class="nav nav-collapse">
                                    <li class="active">
                                        <a href="{{ route('dashboard.orders') }}">
                                            <span class="sub-item">Daftar Pesanan</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#tables">
                                <i class="fas fa-table"></i>
                                <p>Tabel</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="tables">
                                <ul class="nav nav-collapse">
                                    <li><a href="{{ route('dashboard.datatables') }}"><span class="sub-item">Data Pengguna</span></a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <div class="logo-header" data-background-color="dark">
                        <a href="{{ route('dashboard') }}" class="logo"><img src="{{ asset('assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand" class="navbar-brand" /></a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar"><i class="gg-menu-right"></i></button>
                            <button class="btn btn-toggle sidenav-toggler"><i class="gg-menu-left"></i></button>
                        </div>
                        <button class="topbar-toggler more"><i class="gg-more-vertical-alt"></i></button>
                    </div>
                </div>
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                        </nav>

                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-envelope"></i>
                            </a>
                            </li>
                            <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <span class="notification">4</span>
                            </a>
                            </li>
                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="{{ asset('images/avatar.JPG') }}" alt="..." class="avatar-img rounded-circle" />
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Hi,</span>
                                        <span class="fw-bold">{{ Auth::user()->name }}</span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg">
                                                    <img src="{{ asset('images/avatar.JPG') }}" alt="image profile" class="avatar-img rounded" />
                                                </div>
                                                <div class="u-text">
                                                    <h4>{{ Auth::user()->name }}</h4>
                                                    <p class="text-muted">{{ Auth::user()->email }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>

            <div class="container-fluid">
                <div class="page-inner">
                    <!-- Header -->
                    <div class="order-header">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h2><i class="fas fa-receipt"></i> Pesanan #{{ $order->id }}</h2>
                                <p>{{ $order->created_at->format('d F Y \p\u\k\u\l H:i') }} | {{ $order->customer_name }}</p>
                            </div>
                            <a href="{{ route('dashboard.orders') }}" class="btn btn-light btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <div class="row">
                        <!-- Kolom Utama -->
                        <div class="col-lg-8">
                            <!-- Status Pesanan -->
                            <div class="info-card">
                                <div class="info-card-title"><i class="fas fa-info-circle"></i> Status Pesanan</div>
                                <div class="status-grid">
                                    <div class="status-card {{ $order->payment_status === 'pending' ? 'warning' : ($order->payment_status === 'completed' ? 'success' : 'danger') }}">
                                        <div class="status-card-label">Status Pembayaran</div>
                                        <div class="status-card-value">
                                            @if($order->payment_status === 'pending')
                                                <i class="fas fa-clock"></i> Menunggu
                                            @elseif($order->payment_status === 'completed')
                                                <i class="fas fa-check"></i> Lunas
                                            @else
                                                <i class="fas fa-times"></i> Gagal
                                            @endif
                                        </div>
                                    </div>
                                    <div class="status-card {{ $order->status === 'processing' ? 'warning' : ($order->status === 'delivered' ? 'success' : 'danger') }}">
                                        <div class="status-card-label">Status Pesanan</div>
                                        <div class="status-card-value">
                                            <i class="fas fa-box"></i> {{ ucfirst($order->status) }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Informasi Pelanggan -->
                            <div class="info-card">
                                <div class="info-card-title"><i class="fas fa-user"></i> Informasi Pelanggan</div>
                                <div class="info-row">
                                    <span class="info-label">Nama</span>
                                    <span class="info-value">{{ $order->customer_name }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Email</span>
                                    <span class="info-value">{{ $order->email }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Telepon</span>
                                    <span class="info-value">{{ $order->phone ?? '-' }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Alamat Pengiriman</span>
                                    <span class="info-value">{{ $order->address }}{{ $order->address2 ? ', ' . $order->address2 : '' }}<br>{{ $order->city }}, {{ $order->state }}<br>{{ $order->country }} {{ $order->postcode }}</span>
                                </div>
                            </div>

                            <!-- Produk -->
                            <div class="info-card">
                                <div class="info-card-title"><i class="fas fa-box"></i> Produk yang Dipesan</div>
                                <table class="table-products">
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

                                <div class="total-section">
                                    <div class="total-row">
                                        <span>Subtotal:</span>
                                        <span>Rp {{ number_format($order->subtotal, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="total-row">
                                        <span>Biaya Pengiriman:</span>
                                        <span>Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="total-row grand-total">
                                        <span>Total Pembayaran:</span>
                                        <span>Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Aksi -->
                        <div class="col-lg-4">
                            <!-- Detail Pembayaran -->
                            <div class="action-section">
                                <div class="action-section-title"><i class="fas fa-credit-card"></i> Detail Pembayaran</div>
                                <div class="info-row" style="border-bottom: 1px solid #e9ecef; padding: 12px 0;">
                                    <span class="info-label">Metode</span>
                                    <span class="info-value">{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</span>
                                </div>
                                @if($order->payment_details)
                                <div class="info-row">
                                    <span class="info-label">Info</span>
                                    <span class="info-value">{{ $order->payment_details }}</span>
                                </div>
                                @endif
                            </div>

                            <!-- Aksi Pembayaran -->
                            @if($order->payment_status === 'pending')
                            <div class="action-section" style="border: 2px solid #ffc107; background: #fffbf0;">
                                <div class="action-section-title"><i class="fas fa-hourglass-half"></i> Konfirmasi Pembayaran</div>
                                <p style="color: #666; font-size: 0.95rem; margin-bottom: 15px;">Pesanan ini masih menunggu konfirmasi pembayaran. Silakan lakukan aksi berikut:</p>

                                <div class="action-buttons">
                                    <form action="{{ route('dashboard.verify-payment', $order->id) }}" method="POST" onsubmit="return confirm('Konfirmasi bahwa pembayaran telah diterima?');">
                                        @csrf
                                        <input type="hidden" name="payment_status" value="completed">
                                        <button type="submit" class="btn-confirm">
                                            <i class="fas fa-check"></i> Konfirmasi Pembayaran
                                        </button>
                                    </form>
                                </div>

                                <div class="action-buttons">
                                    <form action="{{ route('dashboard.verify-payment', $order->id) }}" method="POST" onsubmit="return confirm('Tolak pembayaran ini?');">
                                        @csrf
                                        <input type="hidden" name="payment_status" value="failed">
                                        <button type="submit" class="btn-reject">
                                            <i class="fas fa-times"></i> Tolak Pembayaran
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @else
                            <div class="action-section" style="border: 2px solid {{ $order->payment_status === 'completed' ? '#28a745' : '#dc3545' }}; background: {{ $order->payment_status === 'completed' ? '#f0f9f6' : '#fef5f5' }};">
                                <div class="text-center py-4">
                                    <div style="font-size: 2.5rem; margin-bottom: 10px;">
                                        @if($order->payment_status === 'completed')
                                            <i class="fas fa-check-circle" style="color: #28a745;"></i>
                                        @else
                                            <i class="fas fa-times-circle" style="color: #dc3545;"></i>
                                        @endif
                                    </div>
                                    <h5>{{ $order->payment_status === 'completed' ? 'Pembayaran Lunas' : 'Pembayaran Ditolak' }}</h5>
                                    <p style="color: #666; margin: 0;">{{ $order->payment_status === 'completed' ? 'Pesanan siap diproses' : 'Hubungi pelanggan untuk informasi lebih lanjut' }}</p>
                                </div>
                            </div>
                            @endif

                            <!-- Aksi Status Pesanan -->
                            <div class="action-section">
                                <div class="action-section-title"><i class="fas fa-tasks"></i> Update Status Pesanan</div>
                                <form action="{{ route('dashboard.update-order-status', $order->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <select name="status" class="form-select" required>
                                            <option value="">-- Pilih Status --</option>
                                            <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                            <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                                            <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn-update" onclick="return confirm('Update status pesanan?');" style="width: 100%;">
                                        <i class="fas fa-save"></i> Update Status
                                    </button>
                                </form>

                                @if($order->status !== 'cancelled' && $order->status !== 'delivered')
                                <form action="{{ route('dashboard.update-order-status', $order->id) }}" method="POST" style="margin-top: 10px;">
                                    @csrf
                                    <input type="hidden" name="status" value="cancelled">
                                    <button type="submit" class="btn-reject" onclick="return confirm('Batalkan pesanan ini?');" style="width: 100%;">
                                        <i class="fas fa-ban"></i> Batalkan Pesanan
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link" href="http://www.themekita.com">ThemeKita</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Licenses</a></li>
                        </ul>
                    </nav>
                    <div class="copyright">
                        2024, made with <i class="fa fa-heart heart text-danger"></i> by <a href="http://www.themekita.com">ThemeKita</a>
                    </div>
                    <div>
                        Distributed by <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>
    <script src="{{ asset('assets/js/setting-demo2.js') }}"></script>
</body>
</html>
