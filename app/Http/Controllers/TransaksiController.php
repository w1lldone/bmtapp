<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class TransaksiController extends Controller
{
    public function index(Request $request){

        $transaksis = Order::unpaid()->latest()->paginate(5); 

        if ($request->has('urutkan')) {

            // Show collapse
            $request->collapse = 'in';

            $request->show = 'semua';
            if ($request->filter != 'semua-s') {
                $request->show = $request->filter;
            }
            
            $transaksis = Order::filter($request)->with('nasabah')->paginate(5)->withPath($request->fullUrl());
        } else{
            $request->urutkan = 'butuh tindakan';
            $request->filter = 'semua-s';
            $request->keyword = '';
            $request->show = 'semua';
        }

        return view('transaksi.index', compact(['transaksis', 'request']));
    }

    public function view(Order $transaksi){
    	$transaksi->load(['nasabah', 'orderDetail.produk.lapak.nasabah']);
    	return view('transaksi.view', compact('transaksi'));
    }

    public function bayar(Order $transaksi){

        if ($transaksi->status == 'paid') return redirect()->route('transaksi')->with('warning', 'Transaksi Sudah dibayar!');

    	$transaksi->statusPaid();
        
    	return redirect()->route('transaksi')->with('status', 'Transaksi berhasil dibayar');
    }

    public function batal(Order $transaksi){

        $transaksi->statusCanceled(request('pesan'));

        return redirect()->route('transaksi')->with('status', 'Transaksi berhasil dibatalkan');

    }

    public function selesai(Order $transaksi){

        if ($transaksi->status == 'finished') return redirect()->route('transaksi')->with('warning', 'Transaksi Sudah Selesai!');

        $transaksi->statusFinished();
        
        return redirect()->route('transaksi')->with('status', 'Transaksi berhasil');
    }
}
