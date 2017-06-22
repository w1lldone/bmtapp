<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriProduk;
use App\Helper\Uploader;
use Illuminate\Support\Facades\Storage;
use App\Versi;
use App\KatLayanan;
use App\ProdukLayanan;

class KategoriProdukController extends Controller
{
    public function index(){
        if (request('tab')=='layanan') {
            $katLayanans = KatLayanan::all();
            $prodLayanans = ProdukLayanan::orderBy('kat_layanan_id')->orderBy('harga')->get();

            return view('kategori.katlayanan', compact(['katLayanans', 'prodLayanans']));
        }

    	$kategoris = KategoriProduk::all();
    	return view('kategori.index', compact('kategoris'));
    }

    public function store(Request $request){
        $foto=Uploader::upload('foto','kategori');
        
    	KategoriProduk::create([
            'name' => $request->name,
            'foto' => $foto,
        ]);

        Versi::create();

    	return redirect()->route('kategori')->with('status', 'Kategori berhasil ditambahkan');
    }

    public function edit(KategoriProduk $kategori){
    	return view('kategori.edit', compact('kategori'));
    }

    public function update(KategoriProduk $kategori){
        if (!empty(request()->file('foto'))) {
            $foto=Uploader::replace('foto','kategori', $kategori->foto);
            $kategori->update(['foto' => $foto]);
        }
        
    	$kategori->update(['name' => request('name')]);

        Versi::create();

    	return redirect()->route('kategori')->with('status', 'Kategori Berhasil diubah');
    }

    public function destroy(KategoriProduk $kategori){

        $oldpath = substr($kategori->foto, 9);

        if ($kategori->foto != null) Storage::delete("/public/$oldpath");

        $kategori->delete();

        Versi::create();
        
        return redirect()->route('kategori')->with('status', 'Kategori Berhasil dihapus');
    }
}
