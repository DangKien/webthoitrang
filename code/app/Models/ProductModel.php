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

    public function cate_sales() {
        return $this->hasOne('App\Models\PromotionModel', 'id', 'cate_sale');
    }

    public static function getProductCategory($idCategory, $limit) {
    	$product =  self::where('cate_id', $idCategory)
    					->limit($limit)
    					->orderBy('id', 'desc')
    					->with('cates')
                        ->with('details')
    					->with('images')
                        ->with('cate_sales')
    					->get();
    	return $product;
    }

    public static function getProductSale($idSale, $limit) {
        $product =  self::where('cate_sale', $idSale)
                        ->limit($limit)
                        ->orderBy('id', 'desc')
                        ->with('cates')
                        ->with('details')
                        ->with('images')
                        ->with('cate_sales')
                        ->get();
        return $product;
    }

    public static function getProductNew($limit) {
        $product =  self::limit($limit)
                        ->orderBy('updated_at', 'desc')
                        ->with('cates')
                        ->with('details')
                        ->with('images')
                        ->with('cate_sales')
                        ->get();
        return $product;
    }

    public static function getProductHightlight($limit) {
        $product =  self::limit($limit)
                        ->orderBy('order', 'desc')
                        ->with('cates')
                        ->with('details')
                        ->with('images')
                        ->with('cate_sales')
                        ->get();
        return $product;
    }

}
