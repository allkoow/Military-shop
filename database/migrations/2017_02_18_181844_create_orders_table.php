<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->date('date');
            $table->enum('status',['oczekiwanie na płatność','oczekiwanie na wysyłkę','wysłano']);
            $table->integer('delivery_method_id')->unsigned();
            $table->float('value',8,2);
            $table->timestamps();
        });

        Schema::table('orders', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('delivery_method_id')->references('id')->on('delivery_methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
