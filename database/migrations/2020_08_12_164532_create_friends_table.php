<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_solicitante')->unsigned()->unique();
            $table->bigInteger('id_solicitado')->unsigned()->unique();
            $table->boolean('status')->nullable();
            $table->timestamps();
            $table->foreign('id_solicitante')->references('id')->on('users');
            $table->foreign('id_solicitado')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends');
    }
}
