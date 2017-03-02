<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersHasProducts extends Migration
{
    public function up()
    {
        Schema::create('orders_has_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('orders_has_products', function(Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::table('orders_has_products', function(Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders_has_products');
    }
}
