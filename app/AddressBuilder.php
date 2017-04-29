<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Addresses;

class AddressBuilder extends Model
{
    public static function build($data) {
    	$address = new Addresses();

    	$address->name = $data['name'];
        $address->city = $data['city'];
        $address->street = $data['street'];
        $address->house_number = (int)$data['house_number'];
        
        if( !empty($data['apartment_number']) )
            $address->apartment_number = (int)$data['apartment_number'];
        
        $address->postcode = $data['postcode'];
        $address->user_id = Auth::user()->id;
        $address->save();

        return $address;
    }
}
