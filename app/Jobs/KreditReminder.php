<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\KretransBU;
use App\Reminder;
use App\Nasabah;

class KreditReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;
    public $rem;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($rem)
    {
        $this->rem = $rem;
        // $this->tanggal = $rem->tanggal;
        // $this->id = $rem->id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // get all nasabah from kretrans
        $kredits = KretransBU::where('TGL_TRANS', $this->rem->tanggal)->get();
        $reminder = Reminder::find($this->rem->id);

        foreach ($kredits as $kredit) {
            // check registered nasabah
            $nasabah = Nasabah::where('no_rekening', $kredit->NO_REKENING)->first();
            if (!empty($nasabah)) {
                // add reminder detail
                $reminder->addDetail($nasabah->id);

                // send notification

            }
        }
    }
}
