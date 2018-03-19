<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title', 200);
            $table->string('slug', 150)->unique();
            $table->text('image')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('content')->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('post_type', 100)->default('post');
            $table->boolean('status')->default(0)->comment('0: pending, 1: publish, 2: trash');
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
        Schema::dropIfExists('news');
    }
}
