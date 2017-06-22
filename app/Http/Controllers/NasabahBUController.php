<?php

namespace App\Http\Controllers;

use App\NasabahBU;
use App\TabungBU;
use Illuminate\Http\Request;

class NasabahBUController extends Controller
{

    public function view(){
    	$tabung = TabungBU::where('NO_REKENING', request('no_rekening'))->first();

        return view('nasabah.cekid', compact(['tabung']));
    }
}
