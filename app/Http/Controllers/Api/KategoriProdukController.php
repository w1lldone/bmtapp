<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\KategoriProduk;

class KategoriProdukController extends Controller
{
    public function index(){
    	return response()->json([
    		'error' => false,
    		'status' => 'success',
    		'kategori' => KategoriProduk::all(),
		]);
    }
}
