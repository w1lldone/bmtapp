<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TabungBU;
use App\Nasabah;

class SaldoController extends Controller
{
    public function show(Nasabah $nasabah){


       	return [
    		'error' => false,
    		'status' => 'success',
    		'saldo' => 14000,
		];
    }
}
