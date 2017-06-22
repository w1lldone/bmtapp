<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index(){
    	$user = Auth::user();
    	return view('admin.setting', compact('user'));
    }

    public function update(Request $request){
    	$user = User::find(Auth::id());

    	$user->update(request(['name', 'username']));

    	return redirect()->route('setting')->with('status', 'Update Info berhasil');
    }

    public function password(Request $request){
    	$user = User::find(Auth::id());

    	$this->validate($request, [
    		'old_password' => 'required',
    		'new_password' => 'required|confirmed',
		]);

    	if (!Hash::check($request->old_password, $user->password)) {
    		return back()->with('warning', 'Password lama salah');
    	}

    	$user->update([
    		'password' => Hash::make($request->new_password),
		]);

    	return redirect()->route('setting')->with('status', 'Update password berhasil');
    }
}
