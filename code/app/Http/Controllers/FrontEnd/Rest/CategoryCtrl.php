<?php

namespace App\Http\Controllers\FrontEnd\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\ProductDetailModel;
use App\Models\CategoryModel;

class CategoryCtrl extends Controller
{
    public $idCate = array();

    public function getList(ProductModel $product, Request $request, ProductDetailModel $detail,
                            CategoryModel $categoryModel, $slug) {
        $idCate = array();
        $cateModel = CategoryModel::select("id", "parent_id")
                                    ->get();
        $categories =  $categoryModel::where('slug', $slug)->first();
        $categoryId  = $categories->id;

        $this->_sreachCate($cateModel, $categoryId);

    	$result =  $product::whereIn('cate_id', $this->idCate)
                            ->orWhere('cate_id', $categoryId)
                            ->orderBy('id', 'desc')
                            ->with('cates')
                            ->with('details')
                            ->with('images')
                            ->with('cate_sales')
                            ->paginate(12);

    	return response()->json($result);
    }


    public function _sreachCate($data, $idParent) {
        foreach ($data as $key => $value) {
            if ($value->parent_id == $idParent) {
                $this->idCate[] = $value->id;
                $this->_sreachCate($data, $value->id);
            }
        }
    }

}
