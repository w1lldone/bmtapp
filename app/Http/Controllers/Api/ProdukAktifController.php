<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produk;

class ProdukAktifController extends Controller
{
    public function update(Produk $produk){
    	$produk->update(request(['aktif']));

    	return response()->json([
    		'error' => false,
    		'status' => 'success',
		]);
    }
}
