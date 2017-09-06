<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produk;
use App\KategoriProduk;
use App\Versi;

class KategoriController extends Controller
{

    public function index(){
        $kategori = KategoriProduk::all();
        $versi = Versi::latest()->first();
        return [
            'kategori' => $kategori,
            'versi' => $versi,
        ];
    }

    public function view(Request $request){

        if (request()->has('kategori_id')) {
            $produks = Produk::where('kategori_produk_id', request('kategori_id'));
        } else {
            $produks = new Produk;
        }

        if (request()->has('keyword')) {
            $produks = $produks->whereRaw($this->keyword('name', request('keyword')))
            ->orWhereRaw($this->keyword('deskripsi', request('keyword')));
        }

        if (request()->has('harga2')) {
            $produks = $produks->whereBetween('harga', [request('harga1'), request('harga2')]);
        }

        switch (request('sort')) {
            case 'terbaru':
                $produks = $produks->latest();
                break;

            case 'terlama':
                $produks = $produks->oldest();
                break;

            case 'nama-desc':
                $produks = $produks->orderBy('name', 'desc');
                break;

            case 'termurah':
                $produks = $produks->orderBy('harga', 'asc');
                break;

            case 'termahal':
                $produks = $produks->orderBy('harga', 'desc');
                break;
            
            default:
               $produks = $produks->orderBy('name', 'asc');
                break;
        }

        $produks =  $produks->with(['kategori_produk', 'lapak','review' => function($query){
                        $query->take(5)->with('nasabah');
                    }])->simplePaginate(10);

    	return $produks->withPath($request->fullUrl());

    }

    public function keyword($coloumn, $sentence)
    {
        $query = '';
        $i = 0;
        $keywords = explode(' ', $sentence);
        foreach ($keywords as $keyword) {
            $query .= "$coloumn LIKE '%$keyword%'";

            $i++;

            if ($i != count($keywords)) {
                $query .= " OR ";
            }
        }

        return $query;
    }
}
