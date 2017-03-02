<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Categories;

class MenuComposer
{
    public $categories;
    public $categoriesData;

    public function __construct()
    {
        $this->categories = Categories::all();
        $this->categoriesData = array();

        // array with categories and bound subcategories
        foreach ($this->categories as $key => $category) {
            $this->categoriesData[$key] = new Categories();
            $this->categoriesData[$key]->id = $category->id;
            $this->categoriesData[$key]->name = $category->name;
            $this->categoriesData[$key]->subcategories = $category->subcategories;
        }
    }

    //Bind data to the view.
    public function compose(View $view)
    {
        $view->with(['categories' => $this->categoriesData]);
    }
}