<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id')->unsigned();
            $table->string('city');
            $table->string('street');
            $table->integer('house_number');
            $table->integer('apartment_number')->nullable();
            $table->string('postcode');
            $table->timestamps();
        });

        Schema::table('addresses', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('addresses', function ($table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('addresses');
    }
}
