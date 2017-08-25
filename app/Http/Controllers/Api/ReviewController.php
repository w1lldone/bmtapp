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
        $produks = Produk::where('lapak_id', $lapak)->has('review')->get();

        return $produks->load(['review' => function($query)
        {
            $query->latest()->with('nasabah');
        }]);
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
