<?php

namespace App\Http\Controllers\BackEnd\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCtrl extends Controller
{
    public function product() {
    	return view('BackEnd.content.product.product');
    }
}
