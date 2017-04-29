<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Categories;
use App\Subcategories;

class AdminCategoriesController extends Controller
{
    public function index() {
        return view('adminpanel.categories.index');
    }

    public function create() {
        return view('adminpanel.categories.create');
    }

    public function store(Request $request) {
        $category = new Categories();
        $category->name = $request->input('newCategory');
        $category->save();

        return redirect()->route('categories.index')->with('information','Dodano nową kategorię');
    }

   public function edit($id) {
        $category = Categories::find($id);
        return view('adminpanel.categories.edit',compact($category));
   }
    
    public function update(Request $request, $category_id) {
        $subcategoriesUpdate = $request->input('subcategories');
        $newSubcategory = $request->input('newSubcategory');
   
        // Update category
        $category = Categories::find($category_id);
        $category->name = $request->input('categoryName');
        $category->save();
        
        // Update subcategories
        $subcategories = $category->subcategories;

        foreach($subcategories as $key => $subcategory) {
            $subcategory->name = $subcategoriesUpdate[$key]['name'];
            $subcategory->save();
        }

        // Add new subcategory
        if($newSubcategory) {
            $subcategory = new Subcategories();
            $subcategory->name = $newSubcategory;
            $subcategory->category_id = $category_id;
            $subcategory->save();
        }

        return redirect()->route('categories.index')->with('information','Kategorie zostały zaktualizowane.'); 
    }

    public function destroy($id) {
        echo 'destroy category';
    }
}
