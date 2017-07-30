<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\KretransBU;
use App\Nasabah;

class KreditReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;
    public $reminder;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($reminder)
    {
        $this->reminder = $reminder;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // get all nasabah from kretrans
        $kredits = KretransBU::where('TGL_TRANS', $this->reminder->tanggal)->get();

        foreach ($kredits as $kredit) {
            // check registered nasabah
            $nasabah = Nasabah::where('no_rekening', $kredit->NO_REKENING)->first();
            if (!empty($nasabah)) {
                // add reminder detail
                $this->reminder->addDetail($nasabah->id);
                // send notification


            }
        }
    }
}
