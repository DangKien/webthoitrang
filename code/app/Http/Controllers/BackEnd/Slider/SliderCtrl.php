<?php

namespace App\Http\Controllers\BackEnd\Slider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderCtrl extends Controller
{
    public function slider() {
    	return view('BackEnd.content.slider.slider');
    }


}
