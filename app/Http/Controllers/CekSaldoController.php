<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TabungBU;
use App\Nasabah;

class CekSaldoController extends Controller
{
    public function view(Nasabah $nasabah)
    {
    	$saldo = new TabungBU($nasabah->cabang->connection);
    	$saldo = $saldo->where('NO_REKENING', $nasabah->no_rekening)->first();
    	return [
    		'no_rekening' => $saldo->NO_REKENING,
    		'saldo_akhir' => number_format($saldo->SALDO_AKHIR, 2, ',', '.'),
    	];
    }
}
