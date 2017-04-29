<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products;
use App\Sizes;

class Cart extends Model
{
    public $items;
    public $totalQuantity;
    public $totalPrice;

    public function __construct($oldCart)
    {
    	if($oldCart) {
    		$this->items = $oldCart->items;
    		$this->totalPrice = $oldCart->totalPrice;
    		$this->totalQuantity = $oldCart->totalQuantity;
    	}
        else {
            $this->items = [];
            $this->totalPrice = 0.00;
        }
    }

    public function add($item, $productId, $size)
    {
    	$storedItem = [
                        'id' => $productId,
                        'name' => $item->name, 
                        'quantity' => 1, 
                        'price' => $item->price,
                        'totalPrice' => $item->price, 
                        'size' => $size,    
                    ];

        $index = $this->find($productId, $size);
        $sizeId = Sizes::where('name', $size)->select('id')->first()->id;
        $number = Products::find($productId)->sizes()->find($sizeId)->pivot->number;

        if( $storedItem['quantity'] <= $number ) {
            if( !is_null($index) ) {
                $storedItem = $this->items[$index];
                $storedItem['quantity']++;
                $storedItem['totalPrice'] = $storedItem['price'] * $storedItem['quantity'];
                $this->items[$index] = $storedItem;
            } 
            else {
                array_push($this->items,$storedItem);
            }

            $this->totalPrice += $storedItem['price'];

            return true;
        } 
        else {
            return false;
        }
        
        //print_r($this->items);
    }

    public function discard($id, $size)
    {
    	$index = $this->find($id, $size);

        if( !is_null($index) ) {
            $this->totalPrice -= $this->items[$index]['price'] * $this->items[$index]['quantity'];
            unset($this->items[$index]);
        }
    }

    public function setQuantity($newQuantity, $productId, $size)
    {
    	$index = $this->find($productId, $size);
        $sizeId = Sizes::where('name', $size)->select('id')->first()->id;
        $number = Products::find($productId)->sizes()->find($sizeId)->pivot->number;

        if($number >= $newQuantity && !is_null($index)) {
            $this->totalPrice -= $this->items[$index]['totalPrice'];
            $this->items[$index]['quantity'] = $newQuantity;
            $this->items[$index]['totalPrice'] = $this->items[$index]['price'] * $this->items[$index]['quantity'];
            $this->totalPrice += $this->items[$index]['totalPrice'];

            return true;
        }
        else {
            return false;
        }
    }

    private function find($id, $size) 
    {
        if($this->items) {
            foreach ($this->items as $key => $item) {
                if($item['id'] == $id && $item['size'] == $size) {
                    return $key;
                }
            }
        }

        return null;
    }
}
