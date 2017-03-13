<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Products;
use App\Cart;
use App\Sizes;

class CartController extends Controller
{
    public function index()
    {
    	return view('cart.index');
    }

    public function add(Request $request, $id)
    {
        $item = Products::where('id',$id)->select('name','price')->first();
        $sizeId = $request->input('size');
        
        $isNoSize = Products::find($id)->sizes()->first()->name;

        if( is_null($sizeId) && $isNoSize != $item->noSize ) {
            return redirect()->route('products.show',['product' => $item->name])->with('message','Proszę wybrać rozmiar.');
        } 
        else {
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            
            if(!$sizeId)
                $size = $item->noSize;
            else
                $size = Sizes::find($sizeId)->name;

            $cart = new Cart($oldCart);
            $cart->add($item,$id,$size);

            Session::put('cart',$cart);
        }

        return redirect()->action('HomeController@index');
    }

    public function discard(Request $request, $id)
    {
    	$size = $request->input('size');

        $cart = Session::get('cart');
    	$cart->discard($id, $size);
    	
        if(empty($cart->items)) {
            Session::pull('cart');
        }
        else {
            Session::put('cart',$cart);
        }

    	return redirect()->action('HomeController@index');
    }

    public function setQuantity(Request $request, $id)
    {
    	$size = $request->input('size');
        $quantity = $request->input('quantity');

    	$cart = Session::get('cart');
    	$cart->setQuantity($quantity, $id, $size);

    	return redirect()->route('cart');
    }

    public function pull()
    {
        Session::pull('cart');
        return redirect()->route('cart');
    }
}
