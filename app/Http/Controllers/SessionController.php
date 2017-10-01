<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    
    public function store(){
    	// attempt to login
    	if(! auth()->attempt(request(['username', 'password']))){
    		$errors = [request('username') => 'Username/Password tidak cocok'];
    		return redirect()->back()
            ->withInput(request()->only(request('username'), 'remember'))
            ->withErrors($errors);
    	}

    	return redirect('/home');
    }
}
