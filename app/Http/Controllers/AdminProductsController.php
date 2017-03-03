<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Products;
use App\User;
use App\Categories;
use App\Subcategories;
use App\Sizes;
use App\Brands;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::paginate(10);

        foreach($products as $product) {
            $sizes =  $product->sizes;
            $product->number = 0;
            foreach($sizes as $size) {
                $product->number += $size->pivot->number;
            }
        }

        return view('adminpanel/products/index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        $subcat = Subcategories::all();
        $brands = Brands::all();

        $selectedCat = array();
        $selectedSub = array();
        $selectedBrands = array();

        foreach($categories as $cat) {
            $selectedCat[$cat->id] = $cat->name;
        }

        foreach($subcat as $cat) {
            $selectedSub[$cat->id] = $cat->name;
        }

        foreach($brands as $brands) {
            $selectedBrands[$brands->id] = $brands->name;
        }

        //echo $selectedBrands;
        return view('adminpanel.products.create',compact(['selectedCat', 'selectedSub', 'selectedBrands']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array('name' => $request->input('name'),
                      'category' => $request->input('category'),
                      'subcategory' => $request->input('subcategory'),
                      'brand' => $request->input('brand'),
                      'price' => $request->input('price'),
                      'description' => $request->input('description'),
                      'sex' => $request->input('sex')  );

        $productId = Products::insertGetId(['name'=>$data['name'],
                                           'category_id'=>$data['category'],
                                           'subcategory_id'=>$data['subcategory'],
                                           'brand_id'=>$data['brand'],
                                           'price'=>$data['price'],
                                           'description'=>$data['description'],
                                           'sex'=>$data['sex']]);

        $sizes = Subcategories::find($data['subcategory'])->sizes;
        
        foreach($sizes as $size) {
            Products::find($productId)->sizes()->attach($size->id, ['number' => 0]);
        }

        return redirect()->action('AdminProductsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get product from database
        $product = Products::find($id);
        
        // Prepeare data for select in form
        $categories = Categories::all();
        $subcategories = Subcategories::all();
        $brands = Brands::all();

        // Arrays for select list
        $selectedSub = array();
        $selectedCat = array();
        $selectedBrands = array();

        foreach($subcategories as $subcategory) {
             $selectedSub[$subcategory->id] = $subcategory->name;
        }

        foreach($categories as $category) {
             $selectedCat[$category->id] = $category->name;
        }
        
        foreach ($brands as $brand) {
            $selectedBrands[$brand->id] = $brand->name;
        }

        return view('adminpanel.products.edit',compact(['product','selectedSub','selectedCat','selectedBrands']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array('name' => $request->input('name'),
                      'category' => $request->input('category'),
                      'subcategory' => $request->input('subcategory'),
                      'brand' => $request->input('brand'),
                      'price' => $request->input('price'),
                      'description' => $request->input('description')  );

        // Get sizes binding with category
        $sizes = Subcategories::find($data['category'])->sizes;

        // Update associative sizes
        foreach ($sizes as $size) {
            Products::find($id)->sizes()->updateExistingPivot($size->id, ['number' => $request->input($size->name)]);
        }

        // Update 
        $product = Products::find($id);
        $product->name = $data['name'];
        $product->category_id = $data['category'];
        $product->subcategory_id = $data['subcategory'];
        $product->brand_id = $data['brand'];
        $product->price = $data['price'];
        $product->description = $data['description'];

        $product->save();

        return redirect()->action('AdminProductsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Products::where('id',$id)->delete();
        return redirect()->action('AdminProductsController@index');
    }
}
