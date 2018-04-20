<?php

namespace App\Http\Controllers\FrontEnd\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\ProductDetailModel;
use App\Models\CategoryModel;

class SearchCtrl extends Controller
{
    public function getList(ProductModel $product, Request $request, ProductDetailModel $detail,
                            CategoryModel $categoryModel) {
    	$result =   $product->filterName($request->freeText)
                            ->buildCond()
                            ->orderBy('id', 'desc')
                            ->with('cates')
                            ->with('details')
                            ->with('images')
                            ->with('cate_sales')
                            ->paginate(6);

    	return response()->json($result);
    }

}
