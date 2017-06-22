<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    
    public function store(){
    	// attempt to login
    	if(! auth()->attempt(request(['username', 'password']))){
    		return view('admin.login');
    	}

    	return redirect('/home');
    }
}
