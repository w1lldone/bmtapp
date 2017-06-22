<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KatLayanan;

class ProdukLayananController extends Controller
{
    public function index(KatLayanan $katLayanan)
    {
    	return $katLayanan->produkLayanan;
    }
}
