<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{
    //protected $hidden = ['pivot'];

    public function sizes() {
    	return $this->belongsToMany(Sizes::class,'subcategories_has_sizes','subcategory_id','size_id')->withTimestamps();
    }

    public function categories() {
    	return $this->belongsTo(Categories::class,'category_id','id');
    }
}
