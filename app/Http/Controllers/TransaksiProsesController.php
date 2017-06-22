<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class TransaksiProsesController extends Controller
{
    public function index(Request $request)
    {
    	$transaksis = Order::paid()->orderBy('status_kode','desc')->latest()->paginate(5);

    	if ($request->has('urutkan')) {

            // Show collapse
            $request->collapse = 'in';

            $request->show = 'semua';
            
            $transaksis = Order::filter($request)->with('nasabah')->paginate(5)->withPath($request->fullUrl());

            if ($request->filter != 'semua-p') {
               $request->show = $request->filter;
            }
        } else{
            $request->urutkan = 'butuh tindakan';
            $request->filter = 'semua-p';
            $request->show = 'semua';
            $request->keyword = '';
        }

    	return view('transaksi.diproses', compact(['transaksis', 'request']));
    }
}
