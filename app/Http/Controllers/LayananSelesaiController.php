<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Layanan;

class LayananSelesaiController extends Controller
{
    public function index(Request $request)
    {
    	$layanans = Layanan::finished()->paginate(5);

    	if ($request->has('urutkan')) {
            
            // show collapse
            $request->collapse = 'in';

            $layanans = Layanan::filter($request)->with('nasabah')->paginate(5)->withPath($request->fullUrl());

            if ($request->filter == 'semua-f') {
                $request->kategori = 'semua';
            }else{
                $request->kategori = $request->filter;
            }
        }else{
            $request->urutkan = 'terbaru';
            $request->filter = 'semua-f';
            $request->kategori = 'semua';
            $request->keyword = '';
        }
    	return view('layanan.selesai', compact(['layanans', 'request']));
    }
}
