<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_chats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_room_id')->unsigned();
            $table->integer('nasabah_id')->unsigned();
            $table->boolean('admin_id')->nullable();
            $table->string('message', 250)->nullable();
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
        Schema::dropIfExists('admin_chats');
    }
}
