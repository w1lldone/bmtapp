<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\KretransBU;
use App\Nasabah;
use App\Cabang;
use App\Jobs\SendFirebaseNotification;

class KreditReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;
    public $reminder;
    public $con;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($reminder)
    {
        $this->reminder = $reminder;
        $this->con = $reminder->con;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $kretrans = new KretransBU($this->con);
        $kredits = $kretrans->where('TGL_TRANS', $this->reminder->tanggal->toDateString())->where('MY_KODE_TRANS', 200)->get();
        $tanggal = Carbon::createFromFormat('Y-m-d', $this->reminder->tanggal->toDateString())->formatLocalized('%d %B %Y');
        $template = \App\Template::find(1)->replaceDate($tanggal);

        foreach ($kredits as $kredit) {

            // check registered nasabah
            $nasabah = Nasabah::where('no_rekening_kredit', $kredit->NO_REKENING)->first();

            // GENERATE DATA
            if (!empty($nasabah)) {
                $kredit->NASABAH = $nasabah->name;
            }
            $data = [
                'kode' => 8,
                'data' => [
                    'pesan' => $template,
                    'kredit' => $kredit,
                ],
            ];
            
            if (!empty($nasabah)) {

                // send notification
                foreach ($nasabah->device as $device) {
                    dispatch(new SendFirebaseNotification('BMT Mobile App', 'Pengingat cicilan kredit', $data, $device->device_id));
                }

                // add reminder detail
                $this->reminder->addDetail($nasabah->id);

            }
        }        
    }
}
