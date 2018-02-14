<?php

namespace App\Http\Controllers\BackEnd\Modal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModalCtrl extends Controller
{
    public function modal($view) {
		return view('BackEnd.modal.'.$view);
	}
}
