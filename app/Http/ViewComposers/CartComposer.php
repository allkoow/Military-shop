<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Products;
use Illuminate\Support\Facades\Session;

class CartComposer
{
    public $cart;

    public function __construct()
    {
        // cart data
        $productsId = Session::has('cart') ? Session::get('cart.products') : null;
        $this->cart = array();
        
        foreach($productsId as $key => $p) {
            $this->cart[$key] = Products::where('id',$productsId[$key])->select('id', 'name', 'price')->first();
        }
    }

    //Bind data to the view.
    public function compose(View $view)
    {
        $view->with(['cart' => $this->cart]);
    }
}