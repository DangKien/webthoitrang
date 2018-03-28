<?php

namespace App\Http\Controllers\FrontEnd\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class SearchCtrl extends Controller
{
    public function index(Request $request, CategoryModel $category, ProductModel $product) {
    	$title = "Tìm kiếm sản phẩm";
    	$freeText = $request->freeText;
    	return view('FrontEnd.content.search.search',
    	[
			'title'    => $title,
			'freeText' => $freeText,
    	]);
    }

}
