<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Products;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function store(Request $request)
    {
        Cart::add(['id' => $request->productId,
                   'name' => $request->productName,
                   'price' => $request->productPrice,
                   'qty' => 1,
                   'options' => ['size' => $request->sizeId]])->associate('App\Products');

        return redirect()->route('cart.index');
    }

    public function update(Request $request, $rowId)
    {
        $newQuantity = $request->quantity;
        $item = Cart::get($rowId);
        $numberOfProduct = $item->model->sizes->find($item->options->size)->pivot->number;

        if($newQuantity <= $numberOfProduct) {
            Cart::update($rowId, ['qty' => $newQuantity]);
            return redirect()->route('cart.index');
        }
        else {
            return redirect()->route('cart.index')->withError('Za mała liczba produktu w magazynie.');
        }
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart.index');
    }
}
