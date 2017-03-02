<?php

use Illuminate\Database\Seeder;
use App\Brands;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($j=0; $j<5; $j++) {
        	$brand = new Brands();
        	$brand->name = $faker->word;
	        $brand->save();
        }
    }
}
