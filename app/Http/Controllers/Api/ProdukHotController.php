<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produk;

class ProdukHotController extends Controller
{
    public function index()
    {
    	return Produk::hotItems();
    }
}
