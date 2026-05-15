<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    /* =========================
        INDEX
    ==========================*/
    public function index()
    {
        $title = 'Daftar Supplier';

        $suppliers = DB::table('suppliers')
            ->orderBy('id','desc')
            ->paginate(10);

        return view('supplier.index', compact('title','suppliers'));
    }

    /* =========================
        CREATE
    ==========================*/
    public function create()
    {
        $title = 'Tambah Supplier';
        return view('supplier.create', compact('title'));
    }

    /* =========================
        STORE
    ==========================*/
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|min:3',
            'phone'   => 'required',
            'address' => 'required'
        ]);

        DB::table('suppliers')->insert([
            'name'       => $request->name,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('supplier.index')
            ->with('success','Supplier berhasil ditambahkan');
    }

    /* =========================
        DETAIL (SHOW)
    ==========================*/
    public function show($id)
    {
        $title = 'Detail Supplier';

        $supplier = DB::table('suppliers')->where('id',$id)->first();
        if(!$supplier) abort(404);

        // 🔥 INI YANG DIPERBAIKI
        return view('supplier.detail', compact('title','supplier'));
    }

    /* =========================
        EDIT
    ==========================*/
    public function edit($id)
    {
        $title = 'Edit Supplier';

        $supplier = DB::table('suppliers')->where('id',$id)->first();
        if(!$supplier) abort(404);

        return view('supplier.edit', compact('title','supplier'));
    }

    /* =========================
        UPDATE
    ==========================*/
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required|min:3',
            'phone'   => 'required',
            'address' => 'required'
        ]);

        DB::table('suppliers')->where('id',$id)->update([
            'name'       => $request->name,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'updated_at' => now(),
        ]);

        return redirect()->route('supplier.index')
            ->with('success','Supplier berhasil diperbarui');
    }

    /* =========================
        DELETE
    ==========================*/
    public function destroy($id)
    {
        DB::table('suppliers')->where('id',$id)->delete();

        return redirect()->route('supplier.index')
            ->with('success','Supplier berhasil dihapus');
    }

    /* =========================
        SEARCH
    ==========================*/
    public function search(Request $request)
    {
        $title = 'Pencarian Supplier';
        $keyword = $request->keyword;

        if(!$keyword){
            return redirect()->route('supplier.index');
        }

        $suppliers = DB::table('suppliers')
            ->where('name','like',"%$keyword%")
            ->orWhere('phone','like',"%$keyword%")
            ->paginate(10)
            ->withQueryString();

        return view('supplier.search', compact('title','suppliers'));
    }
}