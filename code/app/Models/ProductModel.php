<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyModel;

class ProductModel extends MyModel
{
    protected $table = "products";

    public function cates() {
    	return $this->hasOne('App\Models\CategoryModel', 'id', 'cate_id');
    }
}
