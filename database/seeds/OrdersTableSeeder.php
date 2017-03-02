<?php

use Illuminate\Database\Seeder;
use App\Orders;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();


        for($i=0; $i<6; $i++) {
	        $object = new Orders();
	        $object->user_id = $faker->numberBetween($min = 2, $max = 4);
	        $object->date = $faker->date($format = 'Y-m-d', $max = 'now');
	        $object->status = $faker->numberBetween($min = 1, $max = 3);
	        $object->value = $faker->randomFloat($nbMaxDecimals = 2, $min = 25, $max = 520);
            $object->delivery_method_id = $faker->numberBetween($min = 1, $max = 2);
	        $object->save();
            $object->products()->attach($faker->numberBetween($min = 1, $max = 20));
            $object->products()->attach($faker->numberBetween($min = 1, $max = 20));
            $object->products()->attach($faker->numberBetween($min = 1, $max = 20));
        }
    }
}
