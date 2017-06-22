<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produk;
use App\KategoriProduk;
use App\Versi;

class KategoriController extends Controller
{

    public function index(){
        $kategori = KategoriProduk::all();
        $versi = Versi::latest()->first();
        return [
            'kategori' => $kategori,
            'versi' => $versi,
        ];
    }

    public function view(Request $request){

    	$produk = new Produk;
    	$paginate = 10;
    	$query = array();
        $order = 'name';
        $keyword = '';
        $by = 'asc';

    	if ($request->has('kategori_id')){
    		$query['kategori_produk_id'] = $request->kategori_id;
    	}

        if ($request->has('keyword')) {
            $keyword=$request->keyword;
        }

    	if ($request->has('harga')) {
    		$query['harga'] = $request->harga;
    	}

    	if ($request->has('paginate')) {
    		$paginate = $request->paginate;
    	}

    	if ($request->has('urutkan')) {
    		$order = $request->urutkan;
    		$by = $request->order;
    	}

    	$produks = $produk->whereRaw("name LIKE '%$keyword%' or deskripsi LIKE '%$keyword%'")->where($query)->orderBy($order, $by)->with(['kategori_produk', 'lapak','review' => function($query){
            $query->take(5)->with('nasabah');
        }])->simplePaginate($paginate);

    	return $produks->withPath($request->fullUrl());

    }
}
