<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class MyValidator extends Model
{
    protected $rules = array();
    protected $communicates = array();
    protected $errors;

    public function validate($data) {
    	$validator = Validator::make($data, $this->rules, $this->communicates);

    	if($validator->fails()) {
    		$this->errors = $validator->errors();
    		return false;
    	}

    	return true;
    }

    public function errors() {
    	return $this->errors;
    }
}
