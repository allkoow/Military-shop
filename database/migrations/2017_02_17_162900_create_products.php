<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration
{
    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('category_id')->unsigned();
            $table->integer('subcategory_id')->unsigned();
            $table->float('price');
            $table->text('description');
            $table->integer('brand_id')->unsigned();
            $table->enum('sex',['male','female','unisex']);
            $table->integer('number')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('products', function(Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
            $table->foreign('brand_id')->references('id')->on('brands');
        });

        Schema::table('products', function ($table) {
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
        Schema::drop('products');
    }
}
