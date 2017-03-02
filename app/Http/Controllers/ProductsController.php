<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Products;
use App\Brands;
use App\Categories;
use App\Subcategories;

class ProductsController extends Controller
{
    public function index()
    {
        // Get brands
        $brands = Brands::all();
        
        $category = Input::get('category') ? array(Input::get('category')) : Categories::select('id')->get();
        $subcategory = Input::get('subcategory') ? array(Input::get('subcategory')) : Subcategories::select('id')->get();

        $priceMin = Input::has('priceMin') ? Input::get('priceMin') : 0;
        $priceMax = Input::has('priceMax') ? Input::get('priceMax') : 10000;

        $brandsChecked = Input::has('brandsChecked') ? Input::get('brandsChecked') : Brands::select('id')->get()->toArray();

        $products = Products::whereIn('subcategory_id',$subcategory)
        					->whereIn('category_id',$category)
        				    ->where('price','>=',$priceMin)
        				    ->where('price','<=',$priceMax)
        					->whereIn('brand_id',$brandsChecked)
        					->get();

        $data = array();
        $data['priceMin'] = $priceMin;
        $data['priceMax'] = $priceMax;

    	return view('products.index',compact(['products','data','brands','brandsChecked']));
    }

    public function show($name)
    {
		$product = Products::where('name',$name)->first();
		$product->brand = $product->brand()->first();

        return view('products.show', compact('product'));
    }

    public function search(Request $request)
    {
        $data = array();
        $data['priceMin'] = 0;
        $data['priceMax'] = 10000;

        $brands = Brands::all();
        $brandsChecked = Brands::select('id')->get()->toArray();

        $searchKey = $request->input('searchKey');

        $products = Products::where('name','like', $searchKey . '%')
                            ->orWhere('name','like','%' . $searchKey)
                            ->orWhere('name', 'like','%' . $searchKey . '%')->get();

        return view('products.index',compact(['products','data','brands','brandsChecked']));
    }

    public function addToCart(Request $request, $id)
    {
        //$request->session()->pull('cart');
        $request->session()->push('cart.products', $id);

        return redirect()->route('cart');
    }
}
