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
        return view('nasabah.create');
    }

    public function index(){
        if (request()->has('keyword')) {
            $keyword = request('keyword');
            $nasabahs = Nasabah::where('name', 'like', "%$keyword%")->orWhere('no_rekening', $keyword)->paginate(10);
        } else {
            $nasabahs = Nasabah::paginate(10);
        }
    	return view('nasabah.index', compact('nasabahs'));
    }

    public function store(StoreNasabah $request){

    	$nasabah = Nasabah::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'no_rekening' =>$request->no_rekening,
                'no_rekening_kredit' =>$request->no_rekening_kredit,
                'nasabah_id' => $request->nasabah_id,
                'kontak' => $request->kontak,
                'alamat' => $request->alamat,
                'cabang_id' => $request->cabang_id,
                'mku_id' => $request->mku_id,
            ]);

        $nasabah->addLapak($nasabah->id);
        \App\AdminRoom::firstOrCreate(['nasabah_id' => $nasabah->id]);
        
        Storage::disk('uploads')->copy('default.png', "/$nasabah->id/default.png");
        Storage::disk('uploads')->copy('tokoDefault.jpg', "/$nasabah->id/tokoDefault.jpg");

        $nasabah->update(['foto' => "/uploads/$nasabah->id/default.png"]);

        return redirect('/nasabah')->with('status', 'Nasabah berhasil didaftarkan!');

    }

    public function edit(Nasabah $nasabah){
        return view('nasabah.edit', compact('nasabah'));
    }

    public function update(Nasabah $nasabah, UpdateNasabah $request){
        $nasabah->update(request(['name', 'no_rekening', 'no_rekening_kredit', 'kontak', 'cabang_id', 'mku_id', 'alamat']));
        return back()->with('status', 'Profil berhasil dirubah!');
    }

    public function destroy(Nasabah $nasabah){
        $nasabah->admin_room()->delete();
        $nasabah->admin_chat()->delete();
        $nasabah->device()->delete();
        
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
        if (!Hash::check($request->password_admin, auth()->user()->password)) {
            return back()->with('warning', 'Password admin salah');
        }
        $nasabah->update(['password' => Hash::make($request->password)]);
        return back()->with('status', "Password berhasil dirubah, Harap hubungi $nasabah->kontak");
    }       

}
