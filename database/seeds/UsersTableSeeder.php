<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $user = new User();
        $user->name = 'Jan';
        $user->surname = 'Kowalski';
        $user->email = 'john.kowalski@gmail.com';
        $user->password = bcrypt('pass');
        $user->phone_number = 237237236;
        $user->discount = 100;
        $user->default_address = $faker->numberBetween($min = 1, $max = 4);
        $user->total = 0;
        $user->save();
        $user->roles()->attach(1);

        $user = new User();
        $user->name = 'Ewa';
        $user->surname = 'Kowalska';
        $user->email = 'ewa.kowalski@gmail.com';
        $user->password = bcrypt('pass');
        $user->phone_number = 237237236;
        $user->discount = 0;
        $user->default_address = $faker->numberBetween($min = 1, $max = 4);
        $user->total = 150;
        $user->save();
        $user->roles()->attach(2);

        $user = new User();
        $user->name = 'Marian';
        $user->surname = 'Kowalski';
        $user->email = 'marian.kowalski@gmail.com';
        $user->password = bcrypt('pass');
        $user->phone_number = 237237236;
        $user->discount = 10;
        $user->default_address = $faker->numberBetween($min = 1, $max = 4);
        $user->total = 1500;
        $user->save();
        $user->roles()->attach(3);

        $user = new User();
        $user->name = 'Teofil';
        $user->surname = 'Kowalski';
        $user->email = 'teofil.kowalski@gmail.com';
        $user->password = bcrypt('pass');
        $user->phone_number = 237237236;
        $user->discount = 5;
        $user->default_address = $faker->numberBetween($min = 1, $max = 4);
        $user->total = 270;
        $user->save();
        $user->roles()->attach(3);
    }
}
