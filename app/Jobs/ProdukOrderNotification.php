<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Firebase\Notification;

class ProdukOrderNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;



    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $notification = Notification::send('Produk Anda Dipesan', 'Klik untuk konfirmasi ketersediaan');
    }
}
