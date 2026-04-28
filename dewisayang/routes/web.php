<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "Halo, Nama Saya Joacquine";
    //return view('welcome');
});

Route::get('/alamat', function () {
    echo "Jalan Sako no 15 palembang";
    //return view('welcome');
});

Route::get('/path 1/ path 2/detail', function () {
    echo "Jalan Sako no 15 palembang";
    echo "<br>";
    echo "RT.01 RW.02";
    echo "<br>";
    echo "Kecamatan sako";
    echo "<br>";
    echo "Kota Palembang";
    echo "<br>";
    echo "Provunsi Sumatera selatan";
    //return view('welcome');
});

Route::get('/user/{id}', function ($id) {
    echo "User ID : " .$id;
    
});

Route::get('/user2/{name}', function ($name) {
    echo "User Name : ".$name;
});

Route::get('/user3/{name ?}', function ($name = 'Tamu') {
    echo "User Name : " .$name; 
});

Route::get('/user4/{id}/{name}', function ($id, $name) {
    echo "User ID : " .$id;
    echo "<br>";
    echo "User Name :" .$name;
});

Route::get('/simpan', function ($id) {
    echo "Data berhasil di simpan";


});

Route::get('/update/{id}', function ($id) {
    echo "Data Berhasil diperbarui ID:". $id;

    
});

Route::get('/hapus/{id}', function ($id) {
    echo "Data Berhasil dihapus dengan ID:". $id;

    
});

Route::get('/test-method', function () {
    return view('welcome');
});

//menampilkan alamat profil
Route::get('/profil', function () {
    return view("profil");
});

// Gunakan kurung kurawal { } dan masukkan $name ke dalam function
Route::get('/detailproduk/{name}', function ($name) { 
    return view("produk.detail", [
        'produk_name' => $name,
        'id' => 101,
        'color' => 'Silver',
        'stock' => 12
    ]);
});

route::get('/produk', function(){
    return view("produk.index");

});

route::get('/produk/create', function(){
    return view("produk.create");

});

route::get('/produk/search', function(){
    return view("produk.search");

});

route::get('/produk/detail', function(){
    return view("produk.detail");

});