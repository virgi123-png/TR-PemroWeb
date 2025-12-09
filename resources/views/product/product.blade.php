<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}"></script>
<!--===============================================================================================-->

<style>
		/* Konsistensi ukuran gambar produk */
		.block2-pic {
			width: 100%;
			height: 300px;
			overflow: hidden;
			display: flex;
			align-items: center;
			justify-content: center;
			background-color: #f9f9f9;
		}

		.block2-pic img {
			width: 100%;
			height: 100%;
			object-fit: cover;
			object-position: center;
		}

		.hov-img0:hover img {
			transform: scale(1.05);
			transition: transform 0.3s ease;
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

							<li class="active-menu">
								<a href="{{ url('/product') }}">Shop</a>
							</li>

							<li>
								<a href="{{ url('/shoping-cart') }}">Cart</a>
							</li>

							<li>
								<a href="{{ url('/blog') }}">Blog</a>
							</li>

							<li>
								<a href="{{ url('/about') }}">About</a>
							</li>

							<li>
								<li><a href="{{ url('/contact') }}">Contact</a>
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

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full" id="cart-sidebar-items">
					{{-- Items akan dimuat dari AJAX --}}
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


	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div id="search-count" class="search-count p-b-20"></div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>

					@foreach($tipeJams as $tipeJam)
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".tipe-{{ $tipeJam->id }}">
						{{ $tipeJam->nama }}
					</button>
					@endforeach
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
			</div>

			<!-- Search product -->
			<div class="dis-none panel-search w-full p-t-10 p-b-15">
				<div class="bor8 dis-flex p-l-15">
					<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04" id="search-btn">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input id="search-product" class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Cari nama atau harga (cth: Jam Tangan, 150000)">
				</div>
			</div>

			<!-- Filter -->
			<div class="dis-none panel-filter w-full p-t-10">
				<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
					<div class="filter-col1 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Sort By
						</div>

						<ul>
							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04" data-sort="default">
									Default
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04" data-sort="price-asc">
									Price: Low to High
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04" data-sort="price-desc">
									Price: High to Low
								</a>
							</li>
						</ul>
					</div>

					<div class="filter-col2 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Price (Rp)
						</div>

						<ul>
							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04 filter-price" data-price-range="all">
									All
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04 filter-price" data-price-range="0-100000">
									Rp 0 - Rp 100.000
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04 filter-price" data-price-range="100000-300000">
									Rp 100.000 - Rp 300.000
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04 filter-price" data-price-range="300000-600000">
									Rp 300.000 - Rp 600.000
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04 filter-price" data-price-range="600000-1000000">
									Rp 600.000 - Rp 1.000.000
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04 filter-price" data-price-range="1000000-">
									Rp 1.000.000+
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="row isotope-grid">
				@forelse($products as $product)
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item tipe-{{ $product->tipe_jam_id }}"
					 data-price="{{ (float) $product->harga_produk }}"
					 data-name="{{ strtolower($product->nama_produk) }}">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{ asset('storage/' . $product->foto_produk) }}" alt="IMG-PRODUCT">
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="{{ route('product.detail', $product->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{ $product->nama_produk }}
								</a>

								<span class="stext-105 cl3">
									Rp{{ number_format($product->harga_produk, 0, ',', '.') }}
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
				@empty
				<div class="col-12 text-center p-t-45 p-b-45">
					<p class="stext-105 cl3">Tidak ada produk yang tersedia.</p>
				</div>
				@endforelse
			</div>
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

	<!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="images/icons/icon-close.png" alt="CLOSE">
				</button>

				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="images/product-detail-01.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-01.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-02.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-03.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								Lightweight Jacket
							</h4>

							<span class="mtext-106 cl2">
								$58.79
							</span>

							<p class="stext-102 cl3 p-t-23">
								Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
							</p>

							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Size
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Size S</option>
												<option>Size M</option>
												<option>Size L</option>
												<option>Size XL</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Color
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Red</option>
												<option>Blue</option>
												<option>White</option>
												<option>Grey</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button>
									</div>
								</div>
							</div>

							<!--  -->
							<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<div class="flex-m bor9 p-r-10 m-r-11">
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
										<i class="zmdi zmdi-favorite"></i>
									</a>
								</div>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
									<i class="fa fa-facebook"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
									<i class="fa fa-twitter"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

	</script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<script>
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

		function loadCartSidebar() {
			fetch('{{ route("cart.index") }}')
				.then(res => res.text())
				.then(html => {
					// Parse untuk ekstrak cart items dari view
					const parser = new DOMParser();
					const doc = parser.parseFromString(html, 'text/html');
					const rows = doc.querySelectorAll('.table_row');
					const sidebarItems = document.getElementById('cart-sidebar-items');
					sidebarItems.innerHTML = '';

					let total = 0;
					rows.forEach(row => {
						const prodName = row.querySelector('.column-2')?.textContent || '';
						const qtyInput = row.querySelector('input[name="quantity"]');
						const qty = qtyInput?.value || 0;
						const price = parseInt(qtyInput?.dataset.price || 0);
						const subtotal = qty * price;

						// Ambil gambar produk dari column-1
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
				})
				.catch(err => console.error('Error loading cart sidebar:', err));
		}

		document.addEventListener('DOMContentLoaded', function() {
			updateCartCount();
			loadCartSidebar();
		});

		document.addEventListener('submit', function(e) {
			if (e.target.method === 'POST' && e.target.action.includes('/cart/add')) {
				setTimeout(() => {
					updateCartCount();
					loadCartSidebar();
				}, 300);
			}
		});

		document.addEventListener('click', function(e) {
			if (e.target.closest('.js-hide-cart')) {
				setTimeout(loadCartSidebar, 300);
			}
		});
	</script>

	<script>
(function(){
  const grid = document.querySelector('.isotope-grid');
  if (!grid) return;

  const items = Array.from(grid.querySelectorAll('.isotope-item'));
  const originalOrder = items.slice();

  let selectedCategory = '*';
  let selectedPriceRange = 'all';
  let selectedSort = 'default';
  let searchTerm = '';

  function parseRange(range) {
    if (!range || range === 'all') return [ -Infinity, Infinity ];
    const parts = range.split('-');
    const min = parts[0] === '' ? -Infinity : parseFloat(parts[0]);
    const max = parts[1] === '' ? Infinity : parseFloat(parts[1]);
    return [min, max];
  }

  function applyFilters() {
    const [min, max] = parseRange(selectedPriceRange);
    const catName = (selectedCategory && selectedCategory !== '*') ? selectedCategory.replace(/^\./, '') : null;
    let visibleCount = 0;

    items.forEach(el => {
      const price = parseFloat(el.dataset.price) || 0;
      const name = (el.dataset.name || '').toLowerCase();
      const digits = (searchTerm.match(/\d/g) || []).join('');
      const priceDigits = String(Math.round(price)).replace(/\D/g,'');
      const matchesPriceSearch = digits ? priceDigits.includes(digits) : false;
      const matchesNameSearch = !searchTerm || name.includes(searchTerm.toLowerCase());
      const matchesCategory = !catName || el.classList.contains(catName);
      const matchesPriceRange = price >= min && price <= max;

      const show = matchesCategory && matchesPriceRange && (matchesNameSearch || matchesPriceSearch);
      el.style.display = show ? '' : 'none';
      if (show) visibleCount++;
    });

    const counter = document.getElementById('search-count');
    if (counter) {
      counter.textContent = visibleCount + ' result' + (visibleCount !== 1 ? 's' : '');
    }

    if (selectedSort && selectedSort !== 'default') {
      const visible = items.filter(i => i.style.display !== 'none');
      visible.sort((a,b) => {
        if (selectedSort === 'price-asc' || selectedSort === 'price-desc') {
          const pa = parseFloat(a.dataset.price) || 0;
          const pb = parseFloat(b.dataset.price) || 0;
          return selectedSort === 'price-asc' ? pa - pb : pb - pa;
        }
        return 0;
      });
      visible.forEach(v => grid.appendChild(v));
    } else {
      originalOrder.forEach(orig => { if (orig.parentElement) grid.appendChild(orig); });
    }
  }

  function normalizeForMatch(s) {
    return String(s || '')
      .toLowerCase()
      .trim()
      .replace(/\s+/g, '-')
      .replace(/[^a-z0-9\-]/g, '');
  }

  function applyInitialFiltersFromQuery() {
    try {
      const params = new URLSearchParams(window.location.search);
      const cat = params.get('category');
      const price = params.get('price');
      const q = params.get('q') || params.get('search') || params.get('query');
      const sort = params.get('sort');

      if (cat) {
        const target = normalizeForMatch(cat);
        const btns = Array.from(document.querySelectorAll('.filter-tope-group button'));
        const match = btns.find(b => normalizeForMatch(b.textContent) === target);
        if (match) match.click();
      }

      if (price) {
        const priceEl = document.querySelector('.filter-price[data-price-range="' + price + '"]');
        if (priceEl) priceEl.click();
      }

      if (sort) {
        const sortEl = document.querySelector('[data-sort="' + sort + '"]');
        if (sortEl) sortEl.click();
      }

      if (q) {
        const sInput = document.getElementById('search-product');
        searchTerm = String(q).trim();
        if (sInput) sInput.value = searchTerm;
      }
    } catch (e) {
      console.error('Error applying initial filters:', e);
    }
  }

  // Category filter
  document.querySelectorAll('.filter-tope-group button[data-filter]').forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      selectedCategory = btn.getAttribute('data-filter') || '*';
      document.querySelectorAll('.filter-tope-group button').forEach(b => b.classList.remove('how-active1'));
      btn.classList.add('how-active1');
      applyFilters();
    });
  });

  // Price filter
  document.querySelectorAll('.filter-price').forEach(a => {
    a.addEventListener('click', function(e) {
      e.preventDefault();
      selectedPriceRange = a.dataset.priceRange || 'all';
      document.querySelectorAll('.filter-price').forEach(x => x.classList.remove('filter-link-active'));
      a.classList.add('filter-link-active');
      applyFilters();
    });
  });

  // Sort
  document.querySelectorAll('[data-sort]').forEach(a => {
    a.addEventListener('click', function(e) {
      e.preventDefault();
      selectedSort = a.dataset.sort || 'default';
      document.querySelectorAll('[data-sort]').forEach(x => x.classList.remove('filter-link-active'));
      a.classList.add('filter-link-active');
      applyFilters();
    });
  });

  // Search
  const searchInput = document.getElementById('search-product');
  if (searchInput) {
    let timeout = null;
    searchInput.addEventListener('input', function() {
      clearTimeout(timeout);
      timeout = setTimeout(() => {
        searchTerm = searchInput.value.trim();
        applyFilters();
      }, 300);
    });
    const searchBtn = document.getElementById('search-btn');
    if (searchBtn) {
      searchBtn.addEventListener('click', function(e) {
        e.preventDefault();
        searchTerm = searchInput.value.trim();
        applyFilters();
      });
    }
  }

  applyInitialFiltersFromQuery();
  applyFilters();
})();
	</script>
</body>
</html>
