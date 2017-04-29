<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Products;
use App\User;
use App\Categories;
use App\Subcategories;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        $subcat = Subcategories::all();

        if(Input::get('category')) {
            $products = Products::where('category_id',Input::get('category'))
                                ->paginate(20);
        }
        elseif(Input::get('subcategory')) {
            $products = Products::where('subcategory_id', Input::get('subcategory'))
                                ->paginate(20);
        } 
        else {
            $products = Products::paginate(20);
        }

        foreach ($products as $product) {
            $product->images = DB::table('images')->where('product_id',$product->id)->get();
        }

        return view('home.index',compact('products'));
    }

    public function show($name)
    {
        
    }
}
