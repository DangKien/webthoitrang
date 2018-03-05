<?php

namespace App\Http\Controllers\FrontEnd\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class ProductCtrl extends Controller
{
    public function getRecord(ProductModel $product, Request $request) {
    	$result =   $product->where([ ['slug', $request->slug],
    							    ['id', $request->productId], ])
    						->with('cates')
    						->with('images')
    						->with('details')
    						->with('cate_sales')
    						->first();
    	return response()->json($result);
    }

}
