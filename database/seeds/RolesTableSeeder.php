<?php

use Illuminate\Database\Seeder;
use App\Roles;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = new Roles();
        $object->name = 'administrator';
        $object->save();

        $object = new Roles();
        $object->name = 'moderator';
        $object->save();

        $object = new Roles();
        $object->name = 'użytkownik';
        $object->save();
    }
}
