<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // user login
        $user = Auth::user();

        // statistik produk
        $totalBarang     = Product::count();
        $barangTersedia  = Product::where('is active', 1)->count();//akitf
        $barangHabis     = Product::where('is active', 1)->count();//non aktif
        $nilaiStok       = 'Rp ' . number_format(Product::sum('price'), 0, ',', '.');

        // produk terbaru
        $barangTerbaru = Product::latest()->take(5)->get();

        return view('dashboard', compact(
            'user',
            'totalBarang',
            'barangTersedia',
            'barangHabis',
            'nilaiStok',
            'barangTerbaru'
        ));
    }
}