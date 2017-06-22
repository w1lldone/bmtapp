<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Nasabah;
use App\Keranjang;

class KeranjangController extends Controller
{
    public function store(Nasabah $nasabah){
    	$nasabah->addKeranjang();
    	return response()->json([
    		'error' => false,
    		'status' => 'success',
            'jumlah' => $nasabah->keranjang->count(),
		]);
    }

    public function update(Keranjang $keranjang){

        $keranjang->update(request(['quantity', 'antar']));
        $produk = $keranjang->produk;
        $keranjang->update(['total' => request('quantity')*$produk->harga]);

        return ['error' => false, 'status' => 'success'];
    }

    public function view(Nasabah $nasabah){
    	$keranjang = $nasabah->keranjang->load('produk.lapak');
    	return $keranjang;
    }

    public function destroy(Keranjang $keranjang){
        $nasabah = $keranjang->nasabah;
        $keranjang->delete();
        return [
            'error' => false, 
            'status' => 'success',
            'jumlah' => $nasabah->keranjang()->count(),
        ];
    }
}
