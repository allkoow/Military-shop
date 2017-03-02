<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsHasSizes extends Migration
{
    public function up()
    {
        Schema::create('products_has_sizes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('size_id')->unsigned();
            $table->integer('number');
            $table->timestamps();
        });

        Schema::table('products_has_sizes', function(Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::table('products_has_sizes', function(Blueprint $table) {
            $table->foreign('size_id')->references('id')->on('sizes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_has_sizes');
    }
}
