<?php

namespace App\Http\Controllers\FrontEnd\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\ProductDetailModel;
use App\Models\CategoryModel;

class ProductCtrl extends Controller
{
    public function getRecord(ProductModel $product, Request $request, ProductDetailModel $detail,
                            CategoryModel $categoryModel) {
    	$result =   $product->where('slug', $request->slug)
    						->with('cates')
    						->with('images')
    						->with('details')
    						->with('cate_sales')
    						->first();
        $categories = $categoryModel::select('name', 'id', 'parent_id', 'slug')->get();
        $parent_id  = $result->cate_id;
        $result_breadcrumd = $this->_arrayCategory($categories, $parent_id);

    	$result_detail = $detail->getDetail($result->id);

    	return response()->json([ 
                                    'detail'     =>$result_detail, 
                                    'product'    =>$result,
                                    'categories' =>$result_breadcrumd
                                ]);
    }

    public function getDetailrecord(ProductDetailModel $detail) {

    }

    public function _arrayCategory ($data, $parent_id) {
        $cate = array();
        foreach ($data as $key => $category) {
            if ($category->parent_id == $parent_id || $category->id == $parent_id) {
                $cate[] = ['id'=>$category->id, 'name'=>$category->name, 'slug'=>$category->slug];
            }
        }
        return $cate;
    }

}
