<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Products;
use App\User;
use App\Categories;
use App\Subcategories;
use App\Sizes;
use App\Brands;
use Image;

class AdminProductsController extends Controller
{
    public function index()
    {
        $products = Products::paginate(10);

        return view('adminpanel/products/index',compact('products'));
    }

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

    public function store(Request $request)
    {
        $data = $request->all();
        
        $product = new Products();
        $product->name = $data['name'];
        $product->category_id = $data['category'];
        $product->subcategory_id = $data['subcategory'];
        $product->brand_id = $data['brand'];
        $product->price = $data['price'];
        $product->description = $data['description'];
        $product->sex = $data['sex'];

        $product->save();

        // Attach sizes to product
        $sizes = Subcategories::find($data['subcategory'])->sizes;
        
        foreach($sizes as $size) {
            $number = $data[$size->name];
            $product->sizes()->attach($size->id, ['number' => $number]);
            $product->number += $number;
        }

        $product->save();

        // Add image
        $images = $request->hasFile('images') ? $data['images'] : null;
        $this->addImages($images, $product->id);

        return redirect()->action('Admin\AdminProductsController@index');
    }

    public function show($id)
    {
        //
    }

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

        //$product->images = DB::table('images')->where('product_id',$product->id)->get();

        return view('adminpanel.products.edit',compact(['product','selectedSub','selectedCat','selectedBrands']));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $product = Products::find($id);

        // Update 
        $product->name = $data['name'];
        $product->category_id = $data['category'];
        $product->subcategory_id = $data['subcategory'];
        $product->brand_id = $data['brand'];
        $product->price = $data['price'];
        $product->description = $data['description'];

        // Get sizes binding with category
        $sizes = $product->sizes;

        $product->number = 0;
  
        foreach ($sizes as $size) {
            $number = $data[$size->name];
            $product->sizes()->updateExistingPivot($size->id, ['number' => $number]);
            $product->number += $number;
        }

        $product->save();

        // Add image
        $images = $request->hasFile('images') ? $data['images'] : null;
        if($images) {
            $this->addImages($images, $product->id);
            $product->save();

            DB::table('images')->where('product_id', $product->id)->delete();
        }
        
        return redirect()->action('Admin\AdminProductsController@index');
    }

    public function destroy($id)
    {
        Products::where('id',$id)->delete();
        return redirect()->action('Admin\AdminProductsController@index');
    }

    public function getSizesList($id) {
        $subcategory = Subcategories::find($id);
        $sizes = $subcategory->sizes()->select('name')->get();
        
        $sizesArray = array();
        
        foreach ($sizes as $key => $size) {
            $sizesArray[$key] = $size['name'];
        }

        echo json_encode($sizesArray);
    }

    private function addImages($images, $productId) {
        if($images) {
            foreach ($images as $image) {
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/' . $filename);
                
                Image::make($image)->save($location);
                
                DB::table('images')->insert(['path' => $filename, 
                                             'product_id' => $productId ]);
            }
        }
    }
}


