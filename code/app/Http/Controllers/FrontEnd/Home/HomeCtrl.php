<?php

namespace App\Http\Controllers\FrontEnd\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeCtrl extends Controller
{
    public function index() {
    	return view('FrontEnd.content.index');
    }

}
