<?php

namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Http\Request;
use Validator;

class AgendaController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function validation($request)
    {
        return Validator::make($request, [
            'name' => 'required|string',
            'tanggal' => 'required|string',
            'mulai_at' => 'required|string',
            'selesai_at' => 'string',
            'mku_id' => 'required',
            'lokasi' => 'required|string',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendas = Agenda::orderBy('tanggal', 'desc')->paginate(10);
        return view('agenda.index', compact('agendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request->all())->validate();
        $agenda = Agenda::create(request([
            'name', 'tanggal', 'mulai_at', 'selesai_at', 'lokasi', 'mku_id', 'deskripsi',
        ]));

        return redirect('/agenda')->with('status', 'Berhasil membuat agenda!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        return view('agenda.edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        $this->validation($request->all())->validate();

        $agenda->update(request([
            'name', 'tanggal', 'mulai_at', 'selesai_at', 'lokasi', 'mku_id', 'deskripsi',
        ]));

        return redirect('/agenda')->with('status', 'Berhasil mengubah agenda!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect('/agenda')->with('status', 'Berhasil menghapus agenda!');
    }
}
