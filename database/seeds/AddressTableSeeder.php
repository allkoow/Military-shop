<?php

use Illuminate\Database\Seeder;
use App\Addresses;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($j=0; $j<4; $j++) {
        	$address = new Addresses();
        	$address->name = $faker->word;
        	$address->user_id = $faker->numberBetween($min=2,$max=4);
        	$address->city = $faker->city;
        	$address->street = $faker->streetName;
        	$address->house_number = $faker->buildingNumber;
        	$address->apartment_number = $faker->buildingNumber;
        	$address->postcode = $faker->postcode;
	        $address->save();
        }
    }
}
