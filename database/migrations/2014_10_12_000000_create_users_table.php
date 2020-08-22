<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unsigned();
            $table->string('last_name')->unsigned();
            $table->string('email')->unique();
            $table->boolean('admin')->default('false');
            $table->Integer('years')->unsigned();
            $table->string('gender')->default('other');
            $table->Integer('telephone')->unsigned();
            $table->boolean('status')->default('true');
            $table->string('style')->default('blue');
            $table->Integer('font')->default(15);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
