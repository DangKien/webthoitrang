<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('code_product')->nullable();
            $table->string('url_image')->nullable();
            $table->text('description')->nullable();
            $table->integer('start')->default(3);
            $table->string('slug')->nullable();
            $table->integer('cate_id')->nullable();
            $table->string('sale_description')->nullable();
            $table->integer('cate_sale')->nullable();
            $table->double('order')->default(0);
            $table->string('price')->nullable();
            $table->string('tag')->nullable();
            
            $table->string('material')->nullable();
            $table->string('made_in')->nullable();
            $table->string('trade')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('products');
    }
}
