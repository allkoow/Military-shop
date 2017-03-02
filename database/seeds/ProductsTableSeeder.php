<?php

use Illuminate\Database\Seeder;
use App\Products;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();


        for($i=0; $i<20; $i++) {
	        $product = new Products();
	        $product->name = $faker->word;
            $product->price = $faker->randomFloat($nbMaxDecimals = 2, $min = 25, $max = 120);
	        $product->category_id = $faker->numberBetween($min = 1, $max = 4);
            $product->subcategory_id = $faker->numberBetween($min = 1, $max = 6);
            $product->description = $faker->text($maxNbChars = 400);   
            $product->brand = $faker->numberBetween($min=1,$max=5);
	        $product->save();
        }
    }
}
