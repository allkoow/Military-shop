<?php

use Illuminate\Database\Seeder;
use App\Sizes;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = new Sizes();
        $object->name = 'XS';
        $object->save();

        $object = new Sizes();
        $object->name = 'S';
        $object->save();

        $object = new Sizes();
        $object->name = 'M';
        $object->save();

        $object = new Sizes();
        $object->name = 'L';
        $object->save();

        $object = new Sizes();
        $object->name = 'XL';
        $object->save();

        $object = new Sizes();
        $object->name = 'XXL';
        $object->save();

        for($i=37; $i<47; $i++) {
	        $object = new Sizes();
	        $object->name = $i;
	        $object->save();
        }

        $object = new Sizes();
        $object->name = 'nie dotyczy';
        $object->save();
    }
}
