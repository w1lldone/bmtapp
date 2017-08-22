<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produk;
use App\Lapak;

class ReviewController extends Controller
{

    public function index($lapak)
    {
        $produks = Produk::where('lapak_id', $lapak)->has('review')->with(['review' => function($query)
        {
            $query->latest()->take(5)->with('nasabah');
        }])->get();

        return $produks;
    }

    public function view(Produk $produk){
    	return $produk->review->load('nasabah');
    }

    public function store(Produk $produk){
    	$produk->addReview();

    	return [
    		'error' => false,
    		'status' => 'success',
    	];
    }
}
