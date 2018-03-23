<?php

namespace App\Http\Controllers\FrontEnd\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\SliderModel;

class HomeCtrl extends Controller
{
    public function index(CategoryModel $category, ProductModel $product, SliderModel $slideModel) {
    	$title = "Trang chủ";
    	
    	$categories = $category ->select('name','slug', 'id', 'url_link', 'parent_id')
    						   	->get()
                                ->toArray();

        $slides = $slideModel->select("name", "url_image")
                            ->orderBy("location", "asc")
                            ->limit(3)
                            ->get();

    	return view('FrontEnd.content.index',
    	[
            'title'      => $title,
            'categories' => $categories,
            'slides'     => $slides,
    	]);
    }

}
