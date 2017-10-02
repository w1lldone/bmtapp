<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TabungBU;
use App\Nasabah;

class SaldoController extends Controller
{
    public function show(Nasabah $nasabah){
    	$tabung = new TabungBU($nasabah->cabang->connection);
    	$saldo = $tabung->where('NO_REKENING', $nasabah->no_rekening)->first()->SALDO_AKHIR;

       	return [
    		'error' => false,
    		'status' => 'success',
    		'saldo' => $saldo,
		];
    }
}
