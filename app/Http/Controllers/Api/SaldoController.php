<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TabungBU;

class SaldoController extends Controller
{
    public function view(TabungBU $tabung){

       	return response()->json([
    		'error' => false,
    		'status' => 'success',
    		'saldo' => $tabung->SALDO_AKHIR,
		]);
    }
}
