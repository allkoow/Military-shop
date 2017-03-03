<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    }

    public function add($item, $id, $size)
    {
    	$storedItem = ['quantity' => 0, 'price' => $item->price, 'size' => 'nie dotyczy', 'item' => $item];

    	$storedItem['size'] = $size;

        if($this->items) {
    		if(array_key_exists($id, $this->items)) {
                if($this->items[$id]['size'] == $size) {
    			    $storedItem = $this->items[$id];
                }
    		}
    	}

    	$storedItem['quantity']++;
        $storedItem['price'] = $item->price * $storedItem['quantity'];
        $this->items[$id] = $storedItem;
    }

    public function discard($id)
    {
    	unset($this->items[$id]);
    }

    public function setQuantity($newQuantity, $id)
    {
    	$this->items[$id]['quantity'] = $newQuantity;
    }
}
