<?php

use Illuminate\Database\Seeder;
use App\Subcategories;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcat = new Subcategories();
        $subcat->name = 'Odzież';
        $subcat->category_id = 1;
        $subcat->save();
        for($i=1; $i<7; $i++) {
            $subcat->sizes()->attach($i);
        }

        $subcat = new Subcategories();
        $subcat->name = 'Buty';
        $subcat->category_id = 1;
        $subcat->save();
        for($i=7; $i<17; $i++) {
            $subcat->sizes()->attach($i);
        }

        $subcat = new Subcategories();
        $subcat->name = 'Plecaki';
        $subcat->category_id = 1;
        $subcat->save();
        $subcat->sizes()->attach(17);

        $subcat = new Subcategories();
        $subcat->name = 'Gazy pieprzowe';
        $subcat->category_id = 2;
        $subcat->save();
        $subcat->sizes()->attach(17);

        $subcat = new Subcategories();
        $subcat->name = 'Pałki teleskopowe';
        $subcat->category_id = 2;
        $subcat->save();
        $subcat->sizes()->attach(17);

        $subcat = new Subcategories();
        $subcat->name = 'Wiatrówki';
        $subcat->category_id = 3;
        $subcat->save();
        $subcat->sizes()->attach(17);

        $subcat = new Subcategories();
        $subcat->name = 'Paintball';
        $subcat->category_id = 3;
        $subcat->save();
        $subcat->sizes()->attach(17);
    }
}
