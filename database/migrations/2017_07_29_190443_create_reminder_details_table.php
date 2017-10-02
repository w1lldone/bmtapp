<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReminderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminder_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reminder_id')->unsigned();
            $table->integer('nasabah_id')->unsigned();
            $table->integer('cicilan_ke')->nullable();
            $table->integer('nominal')->nullable();
            $table->timestamp('read_at')->nullable();
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
        Schema::dropIfExists('reminder_details');
    }
}
