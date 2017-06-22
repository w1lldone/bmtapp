<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode', 20)->nullable();
            $table->integer('nasabah_id')->unsigned();
            $table->string('status', 15)->nullable();
            $table->integer('status_kode')->nullable();
            $table->integer('biaya')->nullable();
            $table->dateTime('tgl_bayar')->nullable();
            $table->string('pesan', 250)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
