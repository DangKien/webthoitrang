<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyModel;
class ProductDetailModel extends MyModel
{
    protected $table = "product_detail";

    public function sizes() {
    	return $this->belongsToMany('App\Models\SizeModel', 'product_size', 'product_detail_id', 'size_id' );
    }


    public function getDetail($id) {
    	return $this->where('product_id', $id)
    				->with('sizes')
    				->get();
    }
}
