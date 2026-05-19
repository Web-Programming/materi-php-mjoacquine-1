@extends('app.master')
@section('title','Dashboard')

@section('content')

<div class="mt-4 mb-3">
    <h1>Dashboard</h1>

    {{-- INFO USER LOGIN --}}
    @auth
        <p class="text-muted">
            Selamat datang, <strong>{{ Auth::user()->name }}</strong><br>
            Email: {{ Auth::user()->email }}
        </p>
    @endauth
</div>

{{-- ================= KARTU STATISTIK ================= --}}
<div class="row g-3 mb-4">

    <div class="col-md-3">
        <div class="card text-white bg-primary shadow">
            <div class="card-body">
                <h2>{{ $totalBarang }}</h2>
                <p>Total Produk</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-success shadow">
            <div class="card-body">
                <h2>{{ $barangTersedia }}</h2>
                <p>Produk Aktif</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-danger shadow">
            <div class="card-body">
                <h2>{{ $barangHabis }}</h2>
                <p>Produk Non Aktif</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-warning shadow">
            <div class="card-body">
                <h2>{{ $nilaiStok }}</h2>
                <p>Total Nilai Produk</p>
            </div>
        </div>
    </div>

</div>

{{-- ================= TABEL PRODUK TERBARU ================= --}}
<div class="card shadow">
    <div class="card-header">
        <h5>5 Produk Terbaru</h5>
    </div>

    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($barangTerbaru as $barang)
                <tr>
                    <td>{{ $barang->name }}</td>
                    <td>Rp {{ number_format($barang->price,0,',','.') }}</td>
                    <td>
                        @if($barang->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Non Aktif</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada data produk</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection