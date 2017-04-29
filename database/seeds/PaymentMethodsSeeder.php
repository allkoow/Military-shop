<?php

use Illuminate\Database\Seeder;
use App\PaymentMethod;

class PaymentMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = new PaymentMethod();
        $object->name = 'Płatność gotówką przy odbiorze';
        $object->save();

        $object = new PaymentMethod();
        $object->name = 'PayU';
        $object->save();

        $object = new PaymentMethod();
        $object->name = 'Płatność przelewem';
        $object->save();
    }
}
