<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNasabahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nasabahs', function (Blueprint $table) {
            $table->increments('id', 6);
            $table->string('name', 20);
            $table->string('username', 20)->unique();
            $table->string('password', 250);
            $table->string('no_rekening', 12)->nullable();
            $table->string('nasabah_id', 12)->nullable();
            $table->string('kontak', 100)->nullable();
            $table->string('alamat', 150)->nullable();
            $table->integer('cabang_id')->unsigned();
            $table->string('foto', 200)->nullable();
            $table->string('device_token', 200)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('nasabahs');
    }
}
