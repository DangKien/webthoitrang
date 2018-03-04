<?php

namespace App\Http\Controllers\FrontEnd\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class ProductCtrl extends Controller
{
    public function index(ProductModel $product, $slug, $id) {
    	$title = "Sản phẩm";
    	return view('FrontEnd.content.product.product',
    	[
    		'title' => $title,
    	]);
    }

}
