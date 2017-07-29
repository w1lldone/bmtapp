<?php

namespace App\Http\Controllers;

use App\Reminder;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;

class ReminderController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function validator($request)
    {
        return Validator::make($request, [
            'tanggal' => 'required|date',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reminder = Reminder::where('tanggal', request('tanggal'))->get();
        $tanggal = Carbon::createFromFormat('Y-m-d', request('tanggal'))->formatLocalized('%d %B %Y');
        return view('reminder.cek', compact(['reminder', 'tanggal']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $reminder = Reminder::create(request(['tanggal']));

        return redirect('/home')->with('success', 'Reminder kredit berhasi diproses!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function show(Reminder $reminder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function edit(Reminder $reminder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reminder $reminder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reminder $reminder)
    {
        //
    }
}
