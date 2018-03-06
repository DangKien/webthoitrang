<?php

namespace App\Http\Controllers\FrontEnd\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\ProductDetailModel;
use App\Models\CategoryModel;

class ProductCtrl extends Controller
{
    public function getRecord(ProductModel $product, Request $request, ProductDetailModel $detail) {
    	$result =   $product->where('slug', $request->slug)
    						->with('cates')
    						->with('images')
    						->with('details')
    						->with('cate_sales')
    						->first();
    	$result_detail = $detail->getDetail($result->id);

    	return response()->json(['detail'=>$result_detail, 'product'=>$result]);
    }

    public function getDetailrecord(ProductDetailModel $detail) {

    }

}
