<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreNasabah;
use App\Http\Requests\UpdateNasabah;
use App\Nasabah;
use App\NasabahBU;
use Illuminate\Support\Facades\Storage;

class NasabahController extends Controller
{
    public function create(Request $request){
        $no_rekening = request('no_rekening');
        $nasabah_id = request('nasabah_id');
        $cabang_id = request('cabang_id');

        return view('nasabah.create', compact(['no_rekening', 'nasabah_id', 'cabang_id']));
    }

    public function index(){
        $nasabahs = Nasabah::paginate(5);
    	return view('nasabah.index', compact('nasabahs'));
    }

    public function store(StoreNasabah $request){

    	$nasabah = Nasabah::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'no_rekening' =>$request->no_rekening,
                'nasabah_id' => $request->nasabah_id,
                'kontak' => $request->kontak,
                'alamat' => $request->alamat,
                'cabang_id' => $request->cabang_id,
            ]);

        Storage::disk('uploads')->copy('default.png', "/$nasabah->id/default.png");
        Storage::disk('uploads')->copy('tokoDefault.jpg', "/$nasabah->id/tokoDefault.jpg");

        $nasabah->update(['foto' => "/uploads/$nasabah->id/default.png"]);

        $nasabah->addLapak($nasabah->id);

        return redirect('/nasabah')->with('status', 'Nasabah berhasil didaftarkan!');

    }

    public function edit(Nasabah $nasabah){
        return view('nasabah.edit', compact('nasabah'));
    }

    public function update(Nasabah $nasabah, UpdateNasabah $request){
        $nasabah->update(request(['name', 'no_rekening', 'kontak', 'cabang', 'alamat']));
        return back()->with('status', 'Profil berhasil dirubah!');
    }

    public function destroy(Nasabah $nasabah){
        $nasabah->delete();
        return redirect('/nasabah')->with('status', 'Nasabah berhasil dihapus!');
    }

    public function upUsername(Nasabah $nasabah, Request $request){
        $this->validate($request,[
            'username' => 'required|unique:nasabahs',
        ]);
        $nasabah->update(request(['username']));
        return back()->with('status', 'Username berhasil dirubah!');
    }

    public function upPassword(Nasabah $nasabah, Request $request){
        $this->validate($request,[
            'password' => 'confirmed|required',
        ]);
        $nasabah->update(['password' => Hash::make($request->password)]);
        return back()->with('status', "Password berhasil dirubah, Harap hubungi $nasabah->kontak");
    }       

}
