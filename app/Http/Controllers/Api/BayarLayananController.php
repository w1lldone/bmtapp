<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Nasabah;

class BayarLayananController extends Controller
{
    public function store(Nasabah $nasabah, Request $request){

    	/* Tambah Pembayaran Jasa Request
    	/ produk_id
    	/ password
    	/ nomer
    	*/

    	if (!Hash::check($request->password, $nasabah->password)) {
    		return ['error' => true, 'message' => 'password salah'];
    	}
        
    	$layanan = $nasabah->addLayanan();
        $layanan->addLayananDetail();

    	return [
    		'error' => false,
    		'message' => 'success',
    		'layanan' => $layanan,
    	];
    }
}
