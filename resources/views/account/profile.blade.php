<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Account</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
</head>
<body class="animsition">

    <!-- Header (reuse small topbar) -->
    <header>
        <div class="container-menu-desktop">
            <div class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">Free shipping for standard order over $100</div>
                    <div class="right-top-bar flex-w h-full">
                        <a href="{{ url('/help') }}" class="flex-c-m trans-04 p-lr-25">Help & FAQs</a>
                        <a href="{{ url('/') }}" class="flex-c-m trans-04 p-lr-25">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="account-area p-t-50 p-b-50">
            <div class="container">

          <nav class="limiter-menu-desktop container">
                        <img src="{{ asset('images/icons/logo-01.png') }}" alt="IMG-LOGO">
            </nav>       <br>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="bor10 p-lr-30 p-t-30 p-b-30 m-b-30">
                            <div class="text-center m-b-20">
                                <img src="{{ asset('images/avatar.JPG') }}" alt="Avatar" class="img-fluid rounded-circle" style="width:110px;height:110px;object-fit:cover">
                                <h4 class="mtext-107 cl2 p-t-10">{{ Auth::user()->name }}</h4>
                                <span class="stext-102 cl6">{{ Auth::user()->email }}</span>
                            </div>

                            <ul class="list-unstyled account-menu-list p-t-10">
                                <li class="p-tb-8"><a href="{{ url('/account') }}" class="stext-106 cl2 hov-cl1"> <i class="fa fa-tachometer m-r-8"></i> Dashboard</a></li>
                                <li class="p-tb-8"><a href="{{ url('/account') }}" class="stext-106 cl2 hov-cl1" style="font-weight: bold; color: #d4af7a;"> <i class="fa fa-user m-r-8"></i> Profile</a></li>
                                <li class="p-tb-8">
                                    <a href="{{ route('logout') }}" class="stext-106 cl2 hov-cl1" onclick="event.preventDefault(); document.getElementById('logout-form-account').submit();">
                                        <i class="fa fa-sign-out m-r-8"></i> Logout
                                    </a>
                                    <form id="logout-form-account" action="{{ route('logout') }}" method="POST" style="display:none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="bor10 p-lr-30 p-t-30 p-b-30 m-b-30 bg0">
                            <h4 class="mtext-113 cl2 p-b-20">My Profile</h4>

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="stext-102 cl2">Full Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', Auth::user()->name) }}" required>
                                    @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <div class="form-group">
                                    <label class="stext-102 cl2">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', Auth::user()->email) }}" required>
                                    @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <button type="submit" class="btn" style="background-color: #d4af7a; color: white; border: none; padding: 8px 15px; border-radius: 5px;">Save Changes</button>
                            </form>

                            <hr style="margin:30px 0;">

                            <h5 class="stext-106 cl2 m-b-15">Change Password</h5>
                            <form action="{{ route('profile.changePassword') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="stext-102 cl2">Current Password</label>
                                    <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required>
                                    @error('current_password')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label class="stext-102 cl2">New Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                    @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label class="stext-102 cl2">Confirm New Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" required>
                                </div>
                                <button type="submit" class="btn" style="background-color: #d4af7a; color: white; border: none; padding: 8px 15px; border-radius: 5px;">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
