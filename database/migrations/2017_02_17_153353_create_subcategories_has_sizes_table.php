<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoriesHasSizesTable extends Migration
{
    public function up()
    {
        Schema::create('subcategories_has_sizes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subcategory_id')->unsigned();
            $table->integer('size_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('subcategories_has_sizes', function(Blueprint $table) {
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
            $table->foreign('size_id')->references('id')->on('sizes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('subcategories_has_sizes');
    }
}
