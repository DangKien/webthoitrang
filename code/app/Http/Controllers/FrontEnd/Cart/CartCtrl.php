<?php

namespace App\Http\Controllers\FrontEnd\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CartCtrl extends Controller
{
    public function index() {
    	return view('FrontEnd.content.cart.cart');
    }

}
