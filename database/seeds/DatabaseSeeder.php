<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AddressTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SizesTableSeeder::class);
        $this->call(SubcategoriesTableSeeder::class);
        //$this->call(ProductsTableSeeder::class);
        $this->call(DeliveryMethodsTableSeeder::class);
       // $this->call(OrdersTableSeeder::class);
        $this->call(PaymentMethodsSeeder::class);
    }
}
