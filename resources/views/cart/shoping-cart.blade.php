<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shopping Cart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<script src="{{ asset('js/script.js') }}"></script>
	<style>
		.btn-num-product-up.disabled,
		.btn-num-product-down.disabled {
			pointer-events: none;
		}
	</style>
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Help & FAQs
						</a>

						<a href="{{ url('/account') }}" class="flex-c-m trans-04 p-lr-25">
							{{ Auth::user()->name }}
						</a>

						<a href="{{ route('logout') }}"
                        class="flex-c-m trans-04 p-lr-25"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
						<img src="images/icons/logo-01.png" alt="IMG-LOGO">

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="{{ url('/') }}">Home</a>
							</li>

							<li>
								<a href="{{ url('/product') }}">Shop</a>
							</li>

							<li>
								<a href="{{ url('/shoping-cart') }}">Features</a>
							</li>

							<li>
								<a href="{{ url('/blog') }}">Blog</a>
							</li>

							<li>
								<a href="{{ url('/about') }}">About</a>
							</li>

							<li>
								<a href="{{ url('/contact') }}">Contact</a>
							</li>
						</ul>
					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>

						<a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="index.html"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							EN
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							USD
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.html">Home</a>
					<ul class="sub-menu-m">
						<li><a href="index.html">Homepage 1</a></li>
						<li><a href="home-02.html">Homepage 2</a></li>
						<li><a href="home-03.html">Homepage 3</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="product.html">Shop</a>
				</li>

				<li>
					<a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
				</li>

				<li>
					<a href="blog.html">Blog</a>
				</li>

				<li>
					<a href="about.html">About</a>
				</li>

				<li>
					<a href="contact.html">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- Cart Sidebar (tetap di halaman shoping-cart) -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">Your Cart</span>
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full" id="cart-sidebar-items">
					{{-- Items akan diisi oleh JS --}}
				</ul>

				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: Rp <span id="cart-sidebar-total">0</span>
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="{{ route('cart.index') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>
						<a href="{{ route('cart.showCheckout') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="{{ url('/') }}" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shopping Cart
			</span>
		</div>
	</div>

	<!-- Shopping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			@if(session('success'))
				<div class="alert alert-success alert-dismissible fade show mb-3">
					{{ session('success') }}
					<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
				</div>
			@endif

			@if($cartItems->count() > 0)
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>

								@foreach($cartItems as $item)
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="{{ asset('storage/' . $item->product->foto_produk) }}" alt="{{ $item->product->nama_produk }}">
										</div>
									</td>
									<td class="column-2">{{ $item->product->nama_produk }}</td>
									<td class="column-3">Rp {{ number_format($item->product->harga_produk, 0, ',', '.') }}</td>
									<td class="column-4">
										<form action="{{ route('cart.update', $item->id) }}" method="POST" class="wrap-num-product flex-w m-l-auto m-r-0">
											@csrf
											@method('PUT')
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" onclick="decrementQty(this, event)">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product quantity-input" type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="{{ $item->product->stock_produk }}" data-price="{{ $item->product->harga_produk }}" onchange="updateButtonStates(this)">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m {{ $item->quantity >= $item->product->stock_produk ? 'disabled' : '' }}" onclick="incrementQty(this, event)" id="btn-up-{{ $item->id }}">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</form>
									</td>
									<td class="column-5">Rp {{ number_format($item->quantity * $item->product->harga_produk, 0, ',', '.') }}</td>
								</tr>
								@endforeach
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<a href="{{ url('/product') }}" class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Continue Shopping
								</a>
							</div>

							<form action="{{ route('cart.clear') }}" method="POST" style="display:inline;">
								@csrf
								@method('DELETE')
								<button type="submit" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" onclick="return confirm('Kosongkan keranjang?')">
									Clear Cart
								</button>
							</form>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									Rp {{ number_format($subtotal, 0, ',', '.') }}
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209">
								<span class="stext-110 cl2">
									Calculated at checkout
								</span>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									Rp {{ number_format($subtotal, 0, ',', '.') }}
								</span>
							</div>
						</div>

						<a href="{{ route('cart.showCheckout') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</a>
					</div>
				</div>
			</div>
			@else
			<div class="text-center p-t-50 p-b-50">
				<h4 class="mtext-107 cl2 p-b-20">Keranjang Anda Kosong</h4>
				<p class="stext-102 cl6 p-b-30">Belum ada produk di keranjang belanja Anda</p>
				<a href="{{ url('/product') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" style="width: fit-content; margin: 0 auto;">
					Mulai Belanja
				</a>
			</div>
			@endif
		</div>
	</div>

	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categories
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="{{ url('/product') }}" class="stext-107 cl7 hov-cl1 trans-04">
								Wanita
							</a>
						</li>

						<li class="p-b-10">
							<a href="{{ url('/product') }}" class="stext-107 cl7 hov-cl1 trans-04">
								Pria
							</a>
						</li>

						<li class="p-b-10">
							<a href="{{ url('/product') }}" class="stext-107 cl7 hov-cl1 trans-04">
								Anak Anak
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="{{ url('/help') }}" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Hidden Checkout Form -->
	<form id="checkout-form" method="POST" action="{{ route('cart.checkout') }}" style="display: none;">
		@csrf
		<input type="hidden" id="checkout-country" name="country">
		<input type="hidden" id="checkout-state" name="state">
		<input type="hidden" id="checkout-city" name="city">
		<input type="hidden" id="checkout-postcode" name="postcode">
		<input type="hidden" id="checkout-shipping-cost" name="shipping_cost">
	</form>

	<!-- Success Modal -->
	<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header border-0">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body text-center">
					<div class="mb-3">
						<i class="zmdi zmdi-check-circle" style="font-size: 60px; color: #28a745;"></i>
					</div>
					<h5 class="modal-title mb-3" id="successModalLabel">Checkout Berhasil!</h5>
					<p class="stext-111 cl8 mb-3">Pesanan Anda telah diproses dengan sukses.</p>
					<div class="alert alert-light text-start">
						<p class="mb-2"><strong>Alamat Pengiriman:</strong></p>
						<p id="success-address" class="mb-2 stext-110"></p>
						<p class="mb-0"><strong>Biaya Pengiriman: Rp <span id="success-shipping"></span></strong></p>
					</div>
				</div>
				<div class="modal-footer border-0">
					<a href="{{ url('/product') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" style="text-decoration: none;">
						Lanjut Belanja
					</a>
					<a href="{{ url('/') }}" class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer" style="text-decoration: none;">
						Ke Dashboard
					</a>
				</div>
			</div>
		</div>
	</div>

	<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
	<script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>

	<script>
		let submitting = false;

		function updateButtonStates(input) {
			const form = input.closest('form');
			const currentValue = parseInt(input.value);
			const maxValue = parseInt(input.max);
			const btnUp = form.querySelector('.btn-num-product-up');
			const btnDown = form.querySelector('.btn-num-product-down');

			if (currentValue >= maxValue) {
				btnUp.classList.add('disabled');
				btnUp.style.opacity = '0.5';
				btnUp.style.cursor = 'not-allowed';
			} else {
				btnUp.classList.remove('disabled');
				btnUp.style.opacity = '1';
				btnUp.style.cursor = 'pointer';
			}

			if (currentValue <= 1) {
				btnDown.classList.add('disabled');
				btnDown.style.opacity = '0.5';
				btnDown.style.cursor = 'not-allowed';
			} else {
				btnDown.classList.remove('disabled');
				btnDown.style.opacity = '1';
				btnDown.style.cursor = 'pointer';
			}
		}

		function decrementQty(btn, event) {
			event.preventDefault();
			if (btn.classList.contains('disabled')) return;

			const form = btn.closest('form');
			const input = form.querySelector('input[name="quantity"]');
			const currentValue = parseInt(input.value);

			if (currentValue > 1) {
				input.value = currentValue - 1;
				updateButtonStates(input);
				submitForm(form);
			} else if (currentValue === 1) {
				input.value = 0;
				submitForm(form);
			}
		}

		function incrementQty(btn, event) {
			event.preventDefault();
			if (btn.classList.contains('disabled')) return;

			const form = btn.closest('form');
			const input = form.querySelector('input[name="quantity"]');
			const currentValue = parseInt(input.value);
			const maxValue = parseInt(input.max);

			if (currentValue < maxValue) {
				input.value = currentValue + 1;
				updateButtonStates(input);
				submitForm(form);
			}
		}

		function updateCartCount() {
			fetch('{{ route("cart.count") }}')
				.then(res => res.json())
				.then(data => {
					const count = data.count || 0;
					document.querySelectorAll('.js-show-cart').forEach(el => {
						el.setAttribute('data-notify', count);
					});
				})
				.catch(err => console.error('Error updating cart count:', err));
		}

		function updateCartSidebar() {

			const items = document.querySelectorAll('.table_row');
			const sidebarItems = document.getElementById('cart-sidebar-items');
			sidebarItems.innerHTML = '';

			let total = 0;
			items.forEach(row => {
				const prodName = row.querySelector('.column-2').textContent;
				const qty = row.querySelector('input[name="quantity"]').value;
				const price = parseInt(row.querySelector('input[name="quantity"]').dataset.price);
				const subtotal = qty * price;

				const imgElement = row.querySelector('.column-1 img');
				const imgSrc = imgElement?.src || '';

				const html = `
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img m-r-15">
							<img src="${imgSrc}" alt="${prodName}" style="width: 80px; height: auto; object-fit: cover; border-radius: 4px;">
						</div>
						<div class="header-cart-item-txt p-t-8 flex-grow-1">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">${prodName}</a>
							<span class="header-cart-item-info">${qty} x Rp ${price.toLocaleString('id-ID')}</span>
						</div>
					</li>
				`;
				sidebarItems.innerHTML += html;
				total += subtotal;
			});

			document.getElementById('cart-sidebar-total').textContent = total.toLocaleString('id-ID');
		}

		function submitForm(form) {
			if (submitting) return;
			submitting = true;
			form.addEventListener('submit', function() {
				setTimeout(() => {
					updateCartCount();
					updateCartSidebar();
					submitting = false;
				}, 300);
			}, { once: true });
			form.submit();
		}

		document.addEventListener('DOMContentLoaded', function() {
			updateCartCount();
			updateCartSidebar();

			document.querySelectorAll('form').forEach(form => {
				form.addEventListener('submit', () => {
					setTimeout(() => {
						updateCartCount();
						updateCartSidebar();
					}, 500);
				});
			});

			document.querySelectorAll('.quantity-input').forEach(input => {
				updateButtonStates(input);
			});
		});
	</script>
</body>
</html>
