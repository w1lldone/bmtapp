<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('produk_id')->unsigned();
            $table->integer('quantity');
            $table->integer('total');
            $table->boolean('antar');
            $table->string('catatan', 250)->nullable();
            $table->boolean('sedia')->nullable();
            $table->timestamp('kadaluarsa_at')->nullable();
            $table->timestamp('dikirim_at')->nullable();
            $table->timestamp('diterima_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
