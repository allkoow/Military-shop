<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];

	public function subcategories() {
		return $this->hasMany(Subcategories::class,'category_id');
	}
}
