<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TabungBU;
use App\Cabang;

class TabungBUController extends Controller
{
    public function view(Request $request){

    	$this->validate($request, [
			'no_rekening' => 'unique:nasabahs',
		]);

		$cabang = Cabang::find($request->cabang);

		$tabungBU = new TabungBU($cabang->connection);
    	$tabung = $tabungBU->where('NO_REKENING', $request->no_rekening)->first();
    	$no_rekening = $request->no_rekening;
        return view('nasabah.cekid', compact(['tabung', 'no_rekening']));
    }
}
