<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produk;

class ProdukViewController extends Controller
{
    public function show(Produk $produk)
    {
    	$produk->view += 1;
    	$produk->save();
    	return $produk;
    }
}
