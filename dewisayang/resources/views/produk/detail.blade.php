@extends ('template')

@section('title', 'Ini Halaman Detaila')

@section('navbar')
    @parent
    <b> ini Bisa diisi Navbar Tambahan<b>
        @endsection

        @section('content')

                
            <h2>Ini Halaman Detail Produk</h2> <p>Nama Produk : <b>{{ $produk_name }}</b></p>
            <p>Id: <b>{{ $id }}</b></p>
            <p>Color: <b>{{ $color }}</b></p>
            <p>Stock: <b>{{ $stock }}</b></p>
</hr>

 @for ($i = 0; $i < 5; $i++)
                    Data {{ $i }} <br />
                @endfor
            @endsection
 
