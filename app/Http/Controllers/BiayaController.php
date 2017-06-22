<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biaya;

class BiayaController extends Controller
{
    public function create()
    {
    	$biaya = Biaya::latest()->first();
    	return view('admin.biaya', compact('biaya'));
    }

    public function store(Request $request)
    {
    	Biaya::create(request(['nominal']));
    	return redirect('/home')->with('status', 'Biaya berhasil diperbarui');
    }
}
