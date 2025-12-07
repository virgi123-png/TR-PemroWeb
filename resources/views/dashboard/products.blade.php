<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Products - Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="../assets/img/kaiadmin/favicon.ico" type="image/x-icon" />
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: ["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
          urls: ["../assets/css/fonts.min.css"],
        },
        active: function () { sessionStorage.fonts = true; },
      });
    </script>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/plugins.min.css" />
    <link rel="stylesheet" href="../assets/css/kaiadmin.min.css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <div class="logo-header" data-background-color="dark">
            <a class="logo">
              <img src="{{ asset('images/icons/logo-02.png') }}" alt="navbar brand" class="navbar-brand" height="20" />
            </a>
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

              <li class="nav-item active submenu">
                <a data-bs-toggle="collapse" href="#forms">
                  <i class="fas fa-pen-square"></i>
                  <p>Produk</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse show" id="forms">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{ route('dashboard.forms') }}">
                        <span class="sub-item">Tipe Jam</span>
                      </a>
                    </li>
                    <li class="active">
                      <a href="{{ route('dashboard.products') }}">
                        <span class="sub-item">Jam</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#orders">
                  <i class="fas fa-shopping-cart"></i>
                  <p>Pesanan</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="orders">
                  <ul class="nav nav-collapse">
                    <li>
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
                    <li>
                      <a href="{{ route('dashboard.datatables') }}">
                        <span class="sub-item">Data Pengguna</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <div class="logo-header" data-background-color="dark">
              <a href="../index.html" class="logo">
                <img src="../assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar"><i class="gg-menu-right"></i></button>
                <button class="btn btn-toggle sidenav-toggler"><i class="gg-menu-left"></i></button>
              </div>
              <button class="topbar-toggler more"><i class="gg-more-vertical-alt"></i></button>
            </div>
          </div>
          <!-- Navbar Header -->
          <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
            <div class="container-fluid">
              <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1"><i class="fa fa-search search-icon"></i></button>
                  </div>
                  <input type="text" placeholder="Search ..." class="form-control" />
                </div>
              </nav>

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
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
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-account').submit();">Logout</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>
        <form id="logout-form-account" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
        <div class="container">
        <div class="page-inner">
            <div class="page-header">
            <h3 class="fw-bold mb-3">Jam</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home"><a href="#"><i class="icon-home"></i></a></li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">Produk</a></li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">Jam</a></li>
            </ul>
            </div>

            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Form Tambah/Edit Product --}}
            <div class="card mb-4">
            <div class="card-header">{{ isset($product) ? 'Edit Product' : 'Tambah Product' }}</div>
            <div class="card-body">
                <form method="POST" action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($product)) @method('PUT') @endif

                <div class="mb-3">
                    <label for="foto_produk" class="form-label">Foto Product</label>
                    @if(isset($product) && $product->foto_produk)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $product->foto_produk) }}" alt="Foto Product" style="max-width: 200px; max-height: 200px;">
                        </div>
                    @endif
                    <input type="file" name="foto_produk" id="foto_produk" class="form-control @error('foto_produk') is-invalid @enderror" accept="image/*">
                    <small class="text-muted">Max ukuran: 2MB. Format: JPEG, PNG, JPG, GIF</small>
                    @error('foto_produk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Product</label>
                    <input type="text" name="nama_produk" id="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror"
                        value="{{ old('nama_produk', $product->nama_produk ?? '') }}" required>
                    @error('nama_produk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="harga_produk" class="form-label">Harga</label>
                    <input type="number" step="0.01" name="harga_produk" id="harga_produk" class="form-control @error('harga_produk') is-invalid @enderror"
                        value="{{ old('harga_produk', $product->harga_produk ?? '') }}" required>
                    @error('harga_produk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="stock_produk" class="form-label">Stock</label>
                    <input type="number" name="stock_produk" id="stock_produk" class="form-control @error('stock_produk') is-invalid @enderror"
                        value="{{ old('stock_produk', $product->stock_produk ?? '') }}" required>
                    @error('stock_produk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi_singkat_produk" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi_singkat_produk" id="deskripsi_singkat_produk" class="form-control @error('deskripsi_singkat_produk') is-invalid @enderror" rows="3">{{ old('deskripsi_singkat_produk', $product->deskripsi_singkat_produk ?? '') }}</textarea>
                    @error('deskripsi_singkat_produk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="tipe_jam_id" class="form-label">Kategori Tipe Jam <span class="text-danger">*</span></label>
                    <select name="tipe_jam_id" id="tipe_jam_id" class="form-control @error('tipe_jam_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Tipe Jam (Wajib) --</option>
                        @if(isset($tipeJams) && $tipeJams->count())
                            @foreach($tipeJams as $jam)
                            <option value="{{ $jam->id }}" {{ old('tipe_jam_id', $product->tipe_jam_id ?? '') == $jam->id ? 'selected' : '' }}>
                                {{ $jam->nama }}
                            </option>
                            @endforeach
                        @else
                            <option value="" disabled>Belum ada tipe jam. Buat di Forms terlebih dahulu.</option>
                        @endif
                    </select>
                    @error('tipe_jam_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                @if(isset($product))
                    <a href="{{ route('dashboard.products') }}" class="btn btn-secondary">Batal</a>
                @endif
                </form>
            </div>
            </div>

            {{-- Tabel List Product --}}
            <div class="card">
            <div class="card-header">Daftar Product</div>
            <div class="card-body">
                <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stock</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $prod)
                    <tr>
                    <td>
                        @if($prod->foto_produk)
                            <img src="{{ asset('storage/' . $prod->foto_produk) }}" alt="Foto" style="max-width: 50px; max-height: 50px;" onerror="this.src='{{ asset('images/no-image.png') }}'">
                        @else
                            <span class="text-muted">Tidak ada foto</span>
                        @endif
                    </td>
                    <td>{{ $prod->nama_produk }}</td>
                    <td>Rp {{ number_format($prod->harga_produk, 0, ',', '.') }}</td>
                    <td>{{ $prod->stock_produk }}</td>
                    <td>{{ Str::limit($prod->deskripsi_singkat_produk, 50, '...') }}</td>
                    <td>{{ $prod->tipeJam->nama ?? '-' }}</td>
                    <td>
                        <a href="{{ route('dashboard.products', ['edit_product' => $prod->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $prod) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center">Belum ada product.</td></tr>
                    @endforelse
                </tbody>
                </table>
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
            <div class="copyright">2024, made with <i class="fa fa-heart heart text-danger"></i> by <a href="http://www.themekita.com">ThemeKita</a></div>
            <div>Distributed by <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.</div>
          </div>
        </footer>
      </div>
    </div>
    <script src="../assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../assets/js/kaiadmin.min.js"></script>
    <script src="../assets/js/setting-demo2.js"></script>
  </body>
</html>
