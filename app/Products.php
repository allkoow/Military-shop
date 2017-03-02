<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //protected $hidden = ['pivot'];

    public function sizes() {
    	return $this->belongsToMany(Sizes::class,'products_has_sizes','product_id','size_id')->withPivot('number');
    }

    public function category() {
    	return $this->belongsTo(Categories::class,'category_id');
    }

    public function subcategory() {
    	return $this->belongsTo(Subcategories::class,'subcategory_id');
    }

    public function brand() {
    	return $this->belongsTo(Brands::class,'brand_id');
    }
}
