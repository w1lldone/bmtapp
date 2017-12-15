<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
	public function index()
	{
		return view('site.index');
	}

    public function pembelian()
    {
    	return view('site.tutorials.pembelian');
    }

    public function layanan()
    {
    	return view('site.tutorials.layanan');
    }
}
