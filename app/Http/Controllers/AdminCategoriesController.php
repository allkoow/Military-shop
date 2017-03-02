<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Subcategories;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminpanel.categories.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCategory(Request $request)
    {
        $category = new Categories();
        $category->name = $request->input('newCategory');
        $category->save();

        return redirect()->route('categories.index')->with('storeInfo','Dodano nową kategorię');
    }

    public function checkAction(Request $request, $category_id) {
        $action = $request->input('action');

        if($action == 'Usuń') {
            return $this->destroy($request, $category_id);
        } else {
            return $this->update($request, $category_id);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
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

        return redirect()->route('categories.index')->with('storeInfo','Kategorie zostały zaktualizowane.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $category_id)
    {
        echo 'destroy';

    }
}
