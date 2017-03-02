<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
	public function subcategories() {
		return $this->hasMany(Subcategories::class,'category_id');
	}
}
