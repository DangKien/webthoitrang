<?php

namespace App\Http\Controllers\BackEnd\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCtrl extends Controller
{
    public function main() {
    	return view('BackEnd.content.product.main');
    }

    public function product() {
    	return view('BackEnd.content.product.product');
    }
    public function detailProduct() {
    	return view('BackEnd.content.product.detail');
    }
}
