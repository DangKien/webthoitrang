<?php

namespace App\Http\Controllers\FrontEnd\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth, Cart;


class CartCtrl extends Controller
{
    public function index() {
    	return view('FrontEnd.content.cart.cart');
    }

    public function checkout() {
    	if (Auth::guard('customer')->check()) {
    		if (Cart::count() != 0){

    		} else {
    			return redirect()->back();
    		}
    	} else {
    		return redirect()->route('login.frontend');
    	}
    }
}
