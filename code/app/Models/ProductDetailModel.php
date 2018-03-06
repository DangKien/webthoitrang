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
}
