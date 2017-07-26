<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Nasabah;
use App\Layanan;

class LayananController extends Controller
{
    public function index(Nasabah $nasabah){
    	return $nasabah->layananList(request('keyword'));
    }

    public function view(Layanan $layanan){
    	return $layanan->load('layananDetail.produkLayanan.katLayanan');
    }
}
