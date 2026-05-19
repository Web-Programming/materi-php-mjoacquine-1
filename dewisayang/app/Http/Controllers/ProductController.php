<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'Daftar Produk';
        $products = DB::table('products')->paginate(10);

        return view('produk.index', compact('title', 'products'));
    }

    public function create()
    {
        $title = 'Tambah Produk';
        return view('produk.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'price' => 'required|numeric',
            'description' => 'required',
            'status' => 'required|in:new,used',
            'release_date' => 'nullable|date',
        ]);

        DB::table('products')->insert([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status,
            'is active' => $request->has('is_active') ? 1 : 0,
            'release_date' => $request->release_date,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function show($id)
    {
        $title = 'Detail Produk';
        $product = DB::table('products')->where('id', $id)->first();

        abort_if(!$product, 404);

        return view('produk.show', compact('title', 'product'));
    }

    public function edit($id)
    {
        $title = 'Edit Produk';
        $product = DB::table('products')->where('id', $id)->first();

        abort_if(!$product, 404);

        return view('produk.edit', compact('title', 'product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'price' => 'required|numeric',
            'description' => 'required',
            'status' => 'required|in:new,used',
            'release_date' => 'nullable|date',
        ]);

        DB::table('products')->where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status,
            'is active' => $request->has('is_active') ? 1 : 0,
            'release_date' => $request->release_date,
            'updated_at' => now(),
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }

    public function search(Request $request)
    {
        $title = 'Pencarian Produk';
        $keyword = $request->keyword;

        $products = DB::table('products')
            ->where('name', 'like', "%$keyword%")
            ->paginate(10)
            ->withQueryString();

        return view('produk.index', compact('title', 'products'));
    }
}