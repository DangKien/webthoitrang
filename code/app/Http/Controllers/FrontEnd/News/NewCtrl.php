<?php

namespace App\Http\Controllers\FrontEnd\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\News;

class NewCtrl extends Controller
{
    public function index(ProductModel $product) {
    	$title = "Tin tức thời trang";
    	return view('FrontEnd.content.new.new',
    	[
    		'title' => $title,
    	]);
    }


    public function getDetail(News $news, $slug) {
    	$new = $news::where("slug", $slug)->with('user')->first();
    	$new_three = $news->inRandomOrder()->limit(3)->get();
    	$title = "Tin tức thời trang";
    	return view('FrontEnd.content.new.newDetail',
    	[	'new'=> $new,
    		'title' => $title,
    		'news'=>$new_three,
    	]);
    }


}
