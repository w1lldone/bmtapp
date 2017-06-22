<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Layanan;
use App\KatLayanan;

class LayananController extends Controller
{
    public function index(Request $request){

        $layanans = Layanan::pending()->paginate(5);
        $katLayanans = KatLayanan::all();

        if ($request->has('urutkan')) {
            
            // show collapse
            $request->collapse = 'in';

            $layanans = Layanan::filter($request)->with('nasabah')->paginate(5)->withPath($request->fullUrl());

            if ($request->filter == 'semua') {
                $request->kategori = 'semua';
            }else{
                $request->kategori = KatLayanan::find($request->filter)->name;
            }


        }else{
            $request->urutkan = 'terbaru';
            $request->filter = 'semua';
            $request->kategori = 'semua';
            $request->keyword = '';
        }

    	return view('layanan.index', compact(['layanans', 'request', 'katLayanans']));
    }

    public function view(Layanan $layanan, Request $request){
    	return view('layanan.view', compact('layanan'));
    }

    public function bayar(Layanan $layanan, Request $request){
        $layanan->layananDetail->update(request(['total']));
        return redirect("/layanan/$layanan->kode")->with('status', 'Layanan berhasil dibayar');
    }

    public function selesai(Layanan $layanan, Request $request){
        if ($layanan->status != 'pending') return redirect()->route('layanan')->with('warning', 'Layanan Sudah diselesaikan!');

        if ($request->has('catatan')) {
            $layanan->layananDetail->update([
                'catatan' => implode("-", $request->catatan),
            ]);
        }

        if ($request->has('total')) {
            $layanan->layananDetail->update(request(['total']));
        }

        $layanan->statusFinished();
        
        return redirect()->route('layanan')->with('status', 'Layanan berhasil diselesaikan');
    }

    public function batal(Layanan $layanan){
        if ($layanan->status == 'canceled') return redirect()->route('layanan')->with('warning', 'Layanan Sudah dibatalkan!');

        $layanan->statusCanceled(request('pesan'));

        return redirect()->route('layanan')->with('status', 'Layanan berhasil dibatalkan');
    }
}
