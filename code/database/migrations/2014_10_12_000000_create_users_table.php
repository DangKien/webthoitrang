<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('first_name', 150);
            $table->string('last_name', 150);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->text('avatar')->nullable();
            $table->text('phone')->nullable();
            $table->text('description')->nullable();
            $table->integer('age')->unsigned()->nullable();
            $table->text('address')->nullable();
            $table->boolean('status')->default(0)->comment('0: pending, 1: publish, 2: trash');
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
