<?php

namespace App\Http\Controllers\BackEnd\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\ProductDetailModel;
use App\Models\ProductImageModel;
use App\Models\CategoryModel;
use Storage, DB;

class ProductCtrl extends Controller
{
    public function getList(ProductModel $product, ProductDetailModel $detail) {
    	$result = $product->with('cates')
                          ->orderBy('id', 'desc')
                          ->paginate(10);

        return response()->json($result);
    }	

    public function getInsert(ProductModel $product, ProductDetailModel $detail
    						, Request $request) {
        DB::beginTransaction();

    	try {
    		if ($request->hasFile('url_image')) {
    			$url_image     = Storage::putFile('images/main_prodcut', $request->url_image);
    		}
    		$productId = $product->insertGetId([
				'name'             => $request->name,
				'url_image'        => $url_image,
				'description'      => $request->description,
				'slug'             => $request->name,
				'cate_id'          => $request->cate_id,
				'sale_description' => $request->sale_description,
				'cate_sale'        => $request->cate_sale,
				'tag'              => $request->tag,
				'created_at'       => Date('Y-m-d H:i:s'),
				'updated_at'       => Date('Y-m-d H:i:s')
    		]);

            foreach ($request->imageDetail as $key => $value){
                $url_image_detail   = Storage::putFile('images/product_detail', $value);
                $images             = new ProductImageModel();
                $images->url_image  = $url_image_detail;
                $images->product_id = $productId;
                $images->save();
            }
            DB::commit();
            return response()->json(['message'=>true], 200);

    	} catch (Exception $e) {
    		DB::rollback();
    	}

    }

    public function getEdit(){

    }

    public function getUpdate(){

    }

    public function getDelete(){

    }

    public function detailProduct(ProductModel $product, ProductDetailModel $detail, $id) {
        $result = $detail->where('product_id', $id)
                         ->orderBy('id', 'desc')
                         ->paginate(10);

        return response()->json($result);
    }

    public function insertDetailProduct(ProductModel $product, ProductDetailModel $detail, $id, 
                                Request $request) {
        DB::beginTransaction();
        try {

            $detail->color = $request->color;
            $detail->size = $request->size;
            $detail->quantily = $request->quantily;
            $detail->price = $request->price;
            $detail->product_id = $id;
            $detail->save();
            DB::commit();
            return response()->json(['message'=>true], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['message'=>'Lỗi hệ thống không thể thêm mới'], 200);
        }
    }

    public function editDetailProduct(ProductModel $product, ProductDetailModel $detail, $id, 
                                Request $request) {
        if ($id) {
            try {
                $result = $detail->find($id);
                return response()->json($result);
            } catch (Exception $e) {
                return response()->json(['message'=>'Lỗi hệ thống không thể thêm mới'], 200);
            }
        }
    }

    public function updateDetailProduct(ProductModel $product, ProductDetailModel $detail, $id, 
                                Request $request) {
        if ($id) {
            DB::beginTransaction();
            try {
                $detailProduct = $detail->find($id);
                if (empty($detailProduct)) {
                    return response()->json(['message'=>'Lỗi hệ thống không thể sửa chữa'], 200);
                }
                $detailProduct->color = $request->color;
                $detailProduct->price = $request->price;
                $detailProduct->size = $request->size;
                $detailProduct->quantily = $request->quantily;
                $detailProduct->save();

                DB::commit();
                return response()->json(['message'=>true], 200);
                
            } catch (Exception $e) {
                DB::rollback();
                return response()->json(['message'=>'Lỗi hệ thống không thể thêm mới'], 200);
            }
        }
    }

    public function deleteDetailProduct(ProductModel $product, ProductDetailModel $detail, $id, 
                                Request $request) {
        DB::beginTransaction();
        try {
            if ($id) {
                $result = $detail::find($id);
                if (empty($result))  {
                    return response()->json(['message'=>'Lỗi hệ thống không thể xóa'], 200);
                } else {
                    $result->delete();
                }
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
    }
}
