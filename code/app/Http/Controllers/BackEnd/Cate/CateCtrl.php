<?php

namespace App\Http\Controllers\BackEnd\Cate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CateCtrl extends Controller
{
	// return View
    public function category() {
    	return view('BackEnd.content.category.category');
    }
}
