<?php

namespace App\Http\Controllers;

use App\Reminder;
use App\Nasabah;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Jobs\KreditReminder;
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
        if (request()->has('view')) {
            $nasabahs = Nasabah::whereHas('reminder_detail')->with('reminder_detail')->paginate(10)->withPath(request()->fullUrl());;
            // return $nasabahs;
            return view('reminder.index-nasabah', compact('nasabahs'));
        }
        $reminders = Reminder::latest()->paginate(10);
        return view('reminder.index', compact('reminders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->validator(request()->all())->validate();
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

        // check dates on BMT database and send notification to registered nasabah
        foreach (\App\Cabang::all() as $cabang) {
            $reminder->connection = $cabang->connection;
            dispatch(new KreditReminder($reminder));
        }

        return redirect('/reminder')->with('status', 'Reminder kredit berhasi diproses!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function show(Reminder $reminder)
    {
        return view('reminder.view', compact('reminder'));
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
