@extends('app.master')

@section('title', 'produk Index')

@section("sidebar")
     @parent
     @section('submenu.produk')
        <a href="/produk/create" class="list-group-item list-group-item-action ps-4">Tambah Produk</a>
        <a href="/produk/search" class="list-group-item list-group-item-action ps-4">Cari</a>
        
@endsection

@section('content')
    <h1 class = "h3 mb-3">Produk Index</h1>
    <p class="text-muted">Halaman Daftar Produk menggunakan layout master</P>

    <div class="card">
        <div class="card-body">
            Konten Produk Bisa ditampilkan disini
</div>
</div>
@endsection