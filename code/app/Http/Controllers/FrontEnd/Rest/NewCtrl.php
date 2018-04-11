<?php

namespace App\Http\Controllers\FrontEnd\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewCtrl extends Controller
{

    public function getList(News $new) {

        $result = $new->where('status', $new::STATUS_PUBLISH)
                        ->orderBy('id', 'desc')
                        ->with('user')
                        ->paginate(6);

    	return response()->json($result);
    }



}
