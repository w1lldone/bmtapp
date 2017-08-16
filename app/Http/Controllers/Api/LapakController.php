<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Lapak;
use App\Nasabah;

class LapakController extends Controller
{
    public function view(Nasabah $nasabah){
    	$lapak = $nasabah->lapak;
        $lapak->terjual = $lapak->orderDetail()->count();
        $lapak->rating = $lapak->produk()->avg('rating');
        $lapak->review = $lapak->review()->count();
        $lapak->last_update = $lapak->produk()->latest()->first()->updated_at->toDateString();

        return $lapak->load('nasabah');
    }

    public function update(Request $request, Nasabah $nasabah){
    	
    	$lapak = $nasabah->lapak;

    	$lapak->update(request(['name', 'alamat']));

    	return response()->json([
    		'error' => false,
    		'status' => 'success',
		]);
    }

    public function updatefoto(Nasabah $nasabah){

    	$lapak = $nasabah->lapak;
    	$old = substr($lapak->foto, 9);

    	$path = request()->file('image')->store($nasabah->id, 'uploads');
    	$foto = "/uploads/$nasabah->id/".request()->file('image')->hashName();

    	$lapak->update([
			'foto' => $foto,
		]);

        Storage::disk('uploads')->delete($old);

		return response()->json([
			'error' => false,
			'status' => 'success',
			'image' => $foto
		]);
    }
}
