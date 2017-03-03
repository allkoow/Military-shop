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
        $item = Products::find($id);
        $sizeId = $request->input('size');
        
        if(!$sizeId && !$item->hasNoSize()) {
            return redirect()->route('products.show',['product' => $item->name])->with('message','Proszę wybrać rozmiar.');
        } else {
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            
            if(!$sizeId)
                $sizeId = 17;

            $size = Sizes::find($sizeId);
            $cart = new Cart($oldCart);
            $cart->add($item,$id,$size->name);

            Session::put('cart',$cart);
        }

        return redirect()->action('HomeController@index');
    }

    public function discard(Request $request, $id)
    {
    	$cart = Session::get('cart');
    	$cart->discard($id);
    	Session::put('cart',$cart);

    	return redirect()->action('HomeController@index');
    }

    public function setQuantity(Request $request, $id)
    {
    	$quantity = $request->input('quantity');

    	$cart = Session::get('cart');
    	$cart->setQuantity($quantity, $id);

    	return redirect()->route('cart');
    }

    private function pull()
    {
        Session::pull('cart');
    }
}
