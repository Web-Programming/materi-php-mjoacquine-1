<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">

        <!-- Logo / Brand -->
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            My App
        </a>

        <!-- Toggle mobile -->
        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Isi Navbar -->
        <div class="collapse navbar-collapse" id="mainNavbar">

            <!-- Menu kiri -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/barang') }}">Barang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/produk') }}">Produk</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/supplier') }}">Supplier</a>
                </li>

            </ul>

            <!-- Menu kanan (AUTH) -->
            <ul class="navbar-nav ms-auto align-items-center">

                {{-- Jika sudah login --}}
                @auth
                    <li class="nav-item">
                        <span class="navbar-text me-3 text-white">
                            Halo, <strong>{{ Auth::user()->name }}</strong>
                        </span>
                    </li>

                    <li class="nav-item">
                        <!-- Logout wajib POST -->
                        <form action="{{ url('/logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                Logout
                            </button>
                        </form>
                    </li>

                {{-- Jika belum login --}}
                @else
                    <li class="nav-item me-2">
                        <a href="{{ url('/login') }}" class="btn btn-outline-light btn-sm">
                            Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/register') }}" class="btn btn-primary btn-sm">
                            Daftar
                        </a>
                    </li>
                @endauth

            </ul>

        </div>
    </div>
</nav>