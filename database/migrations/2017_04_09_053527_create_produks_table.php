<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lapak_id')->unsigned();
            $table->string('name', 50);
            $table->integer('kategori_produk_id')->unsigned();
            $table->string('unit', 10);
            $table->integer('harga');
            $table->string('deskripsi', 200)->nullable();
            $table->string('foto1', 150)->nullable();
            $table->string('foto2', 150)->nullable();
            $table->string('foto3', 150)->nullable();
            $table->integer('view')->nullable();
            $table->integer('stok');
            $table->boolean('antar')->nullable();
            $table->integer('rating')->nullable();
            $table->integer('aktif');
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
        Schema::dropIfExists('produks');
    }
}
