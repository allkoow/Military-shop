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
        $this->cart = Session::has('cart') ? Session::get('cart') : null;
    }

    //Bind data to the view.
    public function compose(View $view)
    {
       $view->with(['cart' => $this->cart]);
    }
}