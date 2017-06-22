<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produk;

class ReviewController extends Controller
{
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
