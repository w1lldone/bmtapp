<?php

namespace App\Http\Controllers\Api;

use App\ReminderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KreditReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return $this->tempIndex();
        $reminders = ReminderDetail::where('nasabah_id', $id)->latest()->get();

        $val = [
            'reminder_detail' => $reminders->load('reminder'),
        ];
        return $val;
    }

    public function tempIndex()
    {
        $res = [
            'reminder_detail' => [
                [
                    'id' => 1,
                    'reminder_id' => 22,
                    'nasabah_id' => 11,
                    'angsuran_ke' => 32,
                    'nominal' => 330000,
                    'read_at' => null,
                    'created_at' => "2017-07-30 09:36:23",
                    'updated_at' => "2017-07-30 09:36:23",
                    'reminder' => [
                        'id' => 1,
                        'tanggal' => "2017-07-31",
                        'created_at' => "2017-07-30 09:36:23",
                        'updated_at' => "2017-07-30 09:36:23",
                    ],
                ],[
                    'id' => 2,
                    'reminder_id' => 22,
                    'nasabah_id' => 11,
                    'angsuran_ke' => 32,
                    'nominal' => 330000,
                    'read_at' => null,
                    'created_at' => "2017-07-30 09:36:23",
                    'updated_at' => "2017-07-30 09:36:23",
                    'reminder' => [
                        'id' => 2,
                        'tanggal' => "2017-07-31",
                        'created_at' => "2017-07-30 09:36:23",
                        'updated_at' => "2017-07-30 09:36:23",
                    ],
                ],
            ]
        ];

        return $res;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReminderDetail  $reminderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ReminderDetail $reminderDetail)
    {
        return $this->tempShow();
        $reminderDetail->read();
        $val = [
            'reminder_detail' => $reminderDetail->load('reminder')
        ];
        return $val;
    }

    public function tempShow()
    {
        $val = [
            'reminder_detail' => [
                'id' => 1,
                'reminder_id' => 22,
                'nasabah_id' => 11,
                'angsuran_ke' => 32,
                'nominal' => 330000,
                'read_at' => "2017-07-30 09:36:23",
                'created_at' => "2017-07-30 09:36:23",
                'updated_at' => "2017-07-30 09:36:23",
                'reminder' => [
                    'id' => 1,
                    'tanggal' => "2017-07-31",
                    'created_at' => "2017-07-30 09:36:23",
                    'updated_at' => "2017-07-30 09:36:23",
                ],
            ],
        ];

        return $val;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReminderDetail  $reminderDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ReminderDetail $reminderDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReminderDetail  $reminderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReminderDetail $reminderDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReminderDetail  $reminderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReminderDetail $reminderDetail)
    {
        //
    }
}
