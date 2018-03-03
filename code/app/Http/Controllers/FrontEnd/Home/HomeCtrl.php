<?php

namespace App\Http\Controllers\FrontEnd\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class HomeCtrl extends Controller
{
    public function index(CategoryModel $category, ProductModel $product) {
    	$title = "Trang chủ";
    	
    	$categories = $category ->select('name','slug', 'id', 'url_link', 'parent_id')
    						   	->get()->toArray();
    	return view('FrontEnd.content.index',
    	[
    		'title' => $title,
    		'categories'=> $categories,
    	]);
    }

}
