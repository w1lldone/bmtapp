<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Nasabah;
use Illuminate\Support\Facades\Storage;

class NasabahFotoController extends Controller
{

    // api nasabah upload foto
    public function update(Nasabah $nasabah){

        $old = substr($nasabah->foto, 9);

        Storage::disk('uploads')->put($nasabah->id, request()->file('image'));

    	$foto = "/uploads/$nasabah->id/".request()->file('image')->hashName();

    	$nasabah->update([
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
