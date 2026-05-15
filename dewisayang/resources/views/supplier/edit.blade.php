@extends('app.master')

@section('title', $title)

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ $title }}</h1>
        <a href="{{ route('supplier.index') }}" class="btn btn-secondary">
            ← Kembali
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- ================= NAMA SUPPLIER ================= --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Supplier</label>
                    <input type="text" name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $supplier->name ?? '') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">

                    {{-- ================= NOMOR TELEPON ================= --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Nomor Telepon</label>
                        <input type="text" name="phone"
                            class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone', $supplier->phone ?? '') }}">
                        @error('phone')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- ================= ALAMAT ================= --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Alamat</label>
                        <input type="text" name="address"
                            class="form-control @error('address') is-invalid @enderror"
                            value="{{ old('address', $supplier->address ?? '') }}">
                        @error('address')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <hr>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        💾 Simpan Perubahan
                    </button>
                    <a href="{{ route('supplier.index') }}" class="btn btn-light px-4">
                        Batal
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection