<?php

namespace App\Http\Controllers;

use App\Mku;
use Illuminate\Http\Request;

class MkuController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mkus = Mku::all();
        return view('mku.index', compact('mkus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'mku_id' => 'required',
        ]);

        $mku = Mku::create(request(['name', 'cabang_id', 'alamat']));

        return redirect('/mku')->with('status', 'Berhasil membuat MKU!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mku  $mku
     * @return \Illuminate\Http\Response
     */
    public function show(Mku $mku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mku  $mku
     * @return \Illuminate\Http\Response
     */
    public function edit(Mku $mku)
    {
        return view('mku.edit', compact('mku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mku  $mku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mku $mku)
    {
        $this->validate($request, [
            'name' => 'required',
            'cabang_id' => 'required',
        ]);

        $mku->update(request(['name', 'cabang_id', 'alamat']));

        return redirect('/mku')->with('status', 'Berhasil mengubah MKU!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mku  $mku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mku $mku)
    {
        $mku->delete();
        return redirect('/mku')->with('status', 'Berhasil menghapus MKU!');
    }
}
