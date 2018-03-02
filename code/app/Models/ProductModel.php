<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyModel;

class ProductModel extends MyModel
{
    protected $table = "products";

    public function cates() {
    	return $this->hasOne('App\Models\CategoryModel', 'id', 'cate_id');
    }


    public function images() {
    	return $this->hasMany('App\Models\ProductImageModel', 'product_id', 'id');
    }

    public function details() {
        return $this->hasMany('App\Models\ProductDetailModel', 'product_id', 'id');
    }

    public function getProductCategory($idCategory, $limit) {
    	$product = $this->where('cate_id', $idCategory)
    					->limit($limit)
    					->orderBy('id', 'desc')
    					->with('cates')
                        ->with('details')
    					->with('images')
    					->get();
    	return $product;
    }
}
