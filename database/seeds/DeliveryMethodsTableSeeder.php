<?php

use Illuminate\Database\Seeder;
use App\DeliveryMethods;

class DeliveryMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $methods = new DeliveryMethods();
        $methods->name = "Kurier DHL";
        $methods->cost = 15.00;
        $methods->save();

        $methods = new DeliveryMethods();
        $methods->name = "Przesyłka pocztowa";
        $methods->cost = 10.00;
        $methods->save();
    }
}
