<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

//////////////////////////////////////////////////////
// ==================== LANDING PAGE =================
//////////////////////////////////////////////////////
Route::get('/', function () {
    return view('home');
})->name('home');

//////////////////////////////////////////////////////
// ==================== ROUTE DASAR LATIHAN =========
//////////////////////////////////////////////////////

Route::get('/alamat', function(){
    echo "Jalan Kolonel Atmo 12. Palembang";
});

Route::get('/path1/path2/detail', function(){
    echo "Jalan Kolonel Atmo 12. Palembang <br>
          Rt. 01 Rw. 02 <br>
          Kecamatan Ilir Timur 1 <br>
          Kota Palembang <br>
          Provinsi Sumatera Selatan";
});

// Route dinamis
Route::get('/user/{id}', fn($id) => "User ID: $id");
Route::get('/user2/{name}', fn($name) => "User Name: $name");
Route::get('/user3/{name?}', fn($name = 'Tamu') => "User Name: $name");

Route::get('/user4/{id}/{name}', function($id, $name){
    echo "User ID: $id <br> User Name: $name";
});

//////////////////////////////////////////////////////
// ============ CONTOH HTTP METHOD ==================
//////////////////////////////////////////////////////

Route::post('/simpan', fn() => "Data berhasil disimpan");
Route::put('/update/{id}', fn($id) => "Data berhasil diperbaharui ID: $id");
Route::patch('/update2/{id}', fn($id) => "Data berhasil diperbaharui ID: $id");
Route::delete('/hapus/{id}', fn($id) => "Data berhasil dihapus dengan ID: $id");

Route::get('/profil', fn() => view("myprofile"));

//////////////////////////////////////////////////////
// ================= ROUTE AUTH =====================
//////////////////////////////////////////////////////

// Register
Route::get('/register', [AuthController::class, 'registerForm'])
    ->name('register')->middleware('guest');

Route::post('/register', [AuthController::class, 'register'])
    ->middleware('guest');

// Login
Route::get('/login', [AuthController::class, 'loginForm'])
    ->name('login')->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')->middleware('auth');

//////////////////////////////////////////////////////
// ======== ROUTE YANG WAJIB LOGIN ==================
//////////////////////////////////////////////////////

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    //////////////////////////////////////////////////
    // 🔥 CRUD BARANG (pakai ProductController)
    //////////////////////////////////////////////////
    Route::get('/barang', [ProductController::class, 'index']);
    Route::get('/barang/create', [ProductController::class, 'create']);
    Route::get('/barang/{id}', [ProductController::class, 'show']);
    Route::get('/barang/edit/{id}', [ProductController::class, 'edit']);
    Route::post('/barang', [ProductController::class, 'store']);
    Route::put('/barang/update/{id}', [ProductController::class, 'update']);
    Route::delete('/barang/{id}', [ProductController::class, 'destroy']);

    //////////////////////////////////////////////////
    // PRODUK (resource)
    //////////////////////////////////////////////////
    Route::get('/produk/search', [ProductController::class, 'search'])
        ->name('produk.search');
    Route::resource('produk', ProductController::class);

    //////////////////////////////////////////////////
    // SUPPLIER
    //////////////////////////////////////////////////
    Route::get('/supplier/search', [SupplierController::class, 'search'])
        ->name('supplier.search');
    Route::resource('supplier', SupplierController::class);
});