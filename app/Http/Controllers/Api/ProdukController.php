<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produk;
use App\Nasabah;
use App\Lapak;
use App\Helper\Uploader;

class ProdukController extends Controller
{
    public function upload_file($file, $id){
    	$file->store("$id/produk", 'uploads');

    	$path = "/uploads/$id/produk/";

    	return $path;

    }

    public function index(Lapak $lapak){
        $produk = Produk::where('lapak_id', $lapak->id)->with(['kategori_produk', 'review' => function ($query)
        {
            $query->take(5)->with('nasabah');
        }])->simplePaginate(12);
        // foreach ($produk as $data) {
        //     $data->terjual();
        // }
        return $produk;
    }

    public function view(Produk $produk){
        // $produk->lapak;
        // $produk->kategori_produk;
        return response()->json([
            $produk->load(['lapak', 'kategori_produk', 'review.nasabah']), 
        ]);
    }

    public function edit(Produk $produk){
    	$kategori = \App\KategoriProduk::all();
        $produk->kategori_produk;
    	return response()->json([
    		'kategori' => $kategori,
    		'produk' => $produk,
		]);
    }

    public function store(Request $request, Lapak $lapak){

        $lapak->addProduk();
		
		return response()->json([
			'error' => false,
			'status' => 'success',
		]);
    }

    public function update(Produk $produk, Request $request){
    	$produk->update([
    		'name' => $request->name, 
    		'kategori_produk_id' => $request->kategori_produk_id, 
    		'satuan_id' => $request->satuan_id, 
    		'harga' => $request->harga,
    		'deskripsi' => $request->deskripsi,
    		'stok' => $request->stok,
            'antar' => $request->antar,
		]);

        if (!empty($request->file('foto1'))){
            $foto = Uploader::replace('foto1', "$produk->nasabah_id/produk", $produk->foto1);
            $produk->update(['foto1' => $foto]);
        }

        if (!empty($request->file('foto2'))){
            $foto = Uploader::replace('foto2', "$produk->nasabah_id/produk", $produk->foto2);
            $produk->update(['foto2' => $foto]);
        }

        if (!empty($request->file('foto3'))){
            $foto = Uploader::replace('foto3', "$produk->nasabah_id/produk", $produk->foto3);
            $produk->update(['foto3' => $foto]);
        }
        return response()->json([
            'error' => false,
            'status' => 'success',
        ]);
    }

}
