<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use App\MyValidator;

class Addresses extends MyValidator
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $rules = [
        'name' => 'required',
        'city' => 'required',
        'street' => 'required',
        'house_number' => 'required|numeric',
        'apartment_number' => 'numeric',
        'postcode' => 'required'
    ];

    protected $communicates = [
    	'name.required' => 'Nie podano nazwy',
        'city.required' => 'Nie podano nazwy miasta',
        'street.required' => 'Nie podano ulicy',
        'house_number.required' => 'Nie podano numeru domu',
        'house_number.numeric' => 'Podany numer domu nie jest liczbą',
        'apartment_number.numeric' => 'Podany numer lokalu nie jest liczbą',
        'postcode.required' => 'Nie podano kodu pocztowego'
    ];

	public function user() {
		return $this->belongsTo(User::class);
	}
}
