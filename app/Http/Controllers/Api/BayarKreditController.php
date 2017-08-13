<?php

namespace App\Http\Controllers\Api;

use App\Nasabah;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BayarKreditController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request->password, $request->produk_id, $nasabah->id
     * @return \Illuminate\Http\Response
     */
    public function store(Nasabah $nasabah, Request $request)
    {

        if (!Hash::check($request->password, $nasabah->password)) {
            return ['error' => true, 'message' => 'password salah'];
        }

        $layanan = $nasabah->addLayanan();
        $layanan->addKreditLayananDetail($nasabah->no_rekening_kredit);

        return [
            'error' => false,
            'message' => 'success',
            'layanan' => $layanan,
        ];
    }

}
