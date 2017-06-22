<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class TransaksiSelesaiController extends Controller
{
    public function index(Request $request)
    {
    	$transaksis = Order::finished()->orWhere('status', 'canceled')->latest()->paginate(5);

    	if ($request->has('urutkan')) {

            // Show collapse
            $request->collapse = 'in';

            $request->show = 'semua';

            if ($request->filter != 'semua-f') {
                $request->show = $request->filter;
            }
            
            $transaksis = Order::filter($request)->with('nasabah')->paginate(5)->withPath($request->fullUrl());
        } else{
            $request->urutkan = 'terbaru';
            $request->filter = 'semua-f';
            $request->show = 'semua';
            $request->keyword = '';
        }

    	return view('transaksi.selesai', compact(['transaksis', 'request']));
    }
}
