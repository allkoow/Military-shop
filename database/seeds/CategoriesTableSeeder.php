<?php

use Illuminate\Database\Seeder;
use App\Categories;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Categories();
        $category->name = 'Outdoor';
        $category->save();

        $category = new Categories();
        $category->name = 'Samoobrona';
        $category->save();

        $category = new Categories();
        $category->name = 'Strzelectwo';
        $category->save();

        $category = new Categories();
        $category->name = 'Inne';
        $category->save();
    }
}
