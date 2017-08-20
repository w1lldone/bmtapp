<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLayananDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanan_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('layanan_id')->unsigned();
            $table->integer('produk_layanan_id')->unsigned();
            $table->integer('total')->nullable();
            $table->string('nomer', 30)->nullable();
            $table->string('recoipt', 250)->nullable();
            $table->string('catatan', 200)->nullable();
            $table->integer('nominal')->nullable();
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
        Schema::dropIfExists('layanan_details');
    }
}
