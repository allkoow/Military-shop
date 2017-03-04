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
        else {
            $this->items = [];
        }
    }

    public function add($item, $id, $size)
    {
    	$storedItem = [
                        'id' => $id,
                        'name' => $item->name, 
                        'quantity' => 1, 
                        'price' => $item->price,
                        'totalPrice' => $item->price, 
                        'size' => $size,    
                    ];

        $index = $this->find($id, $size);

        if( !is_null($index) ) {
            $storedItem = $this->items[$index];
            $storedItem['quantity']++;
            $storedItem['totalPrice'] = $storedItem['price'] * $storedItem['quantity'];
            $this->items[$index] = $storedItem;
        } 
        else {
            array_push($this->items,$storedItem);
        }

        print_r($this->items);
    }

    public function discard($id, $size)
    {
    	$index = $this->find($id, $size);

        if( !is_null($index) ) {
            unset($this->items[$index]);
        }
    }

    public function setQuantity($newQuantity, $id, $size)
    {
    	$index = $this->find($id, $size);

        if( !is_null($index) ) {
            $this->items[$index]['quantity'] = $newQuantity;
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
