<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KatLayanan;
use App\ProdukLayanan;

class KategoriLayananController extends Controller
{
    public function index()
    {
    	$katLayanans = KatLayanan::all();
    	$prodLayanans = ProdukLayanan::orderBy('kat_layanan_id')->orderBy('harga')->get();

    	return view('kategori.katlayanan', compact(['katLayanans', 'prodLayanans']));
    }

    public function create()
    {
    	$katLayanans = KatLayanan::where('id', 1)->orWhere('id', 2)->get();

    	return view('kategori.layan-create', compact('katLayanans'));
    }

    public function edit(ProdukLayanan $produk)
    {
       $katLayanans = KatLayanan::where('id', '<>', $produk->katLayanan->id)
                        ->Where('id', '<>', 3)
                        ->Where('id', '<>', 4)
                        ->get();
       return view('kategori.layan-edit', compact(['produk', 'katLayanans']));
    }

    public function store(Request $request)
    {
    	ProdukLayanan::create(request(['kat_layanan_id', 'name', 'harga']));
    	return redirect('/kategori?tab=layanan')->with('status', 'Produk layanan berhasil dibuat');
    }

    public function update(ProdukLayanan $produk)
    {
        $produk->update(request(['kat_layanan_id', 'name', 'harga']));
        return redirect('/kategori?tab=layanan')->with('status', 'Produk layanan berhasil diubah');
    }

    public function destroy(ProdukLayanan $produk)
    {
    	$produk->delete();

    	return redirect('/kategori?tab=layanan')->with('status', 'Produk layanan berhasil dihapus');
    }
}
