<?php

namespace App\Http\Controllers\FrontEnd\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class CategoryCtrl extends Controller
{
    public function index(CategoryModel $category, ProductModel $product) {
    	$title = "Trang chủ";
    	return view('FrontEnd.content.category.category',
    	[
    		'title' => $title,
    	]);
    }

}
