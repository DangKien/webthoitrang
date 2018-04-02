<?php

namespace App\Http\Controllers\BackEnd\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\ProductDetailModel;
use App\Models\ProductImageModel;
use App\Models\CategoryModel;
use App\Models\PromotionModel;
use App\Models\SizeModel;
use App\MyModel\ProductSizeModel;

use Storage, DB, Image;

class ProductCtrl extends Controller
{
    public function getList(ProductModel $product, ProductDetailModel $detail) {
    	$result = $product->with('cates')
                          ->orderBy('id', 'desc')
                          ->paginate(10);

        return response()->json($result);
    }	


    public function getPromotion(PromotionModel $promotion) {
        $result = $promotion->all();
        return response()->json($result);
    }

    public function getSize(SizeModel $size) {
        $result = $size->all();
        return response()->json($result);
    }

    public function getInsert(ProductModel $product, ProductDetailModel $detail
    						, Request $request) {
        $this->validateInsert($request);
        DB::beginTransaction();

    	try {
    		if ($request->hasFile('url_image')) {
                $url_image     = $request->url_image->hashName('');
                    $newImageSlide = Image::make($request->url_image)->resize(null, 520, function ($constraint) {
                            $constraint->aspectRatio();
                        })->encode('png')->save(public_path('/images/main_prodcut/'.$url_image));
    		}
    		$productId = $product->insertGetId([
                'name'             => $request->name,
                'url_image'        => $url_image,
                'description'      => $request->description,
                'slug'             => sanitizeTitle($request->name),
                'cate_id'          => $request->cate_id,
                'sale_description' => $request->sale_description,
                'cate_sale'        => $request->cate_sale,
                'price'            => $request->price,
                'code_product'     => $request->codeProduct,
                'material'         => $request->material,
                'made_in'          => $request->made_in,
                'trade'            => $request->trade,
                'status'           => $request->status,
                'tag'              => trim($request->tag, ','),
                'created_at'       => Date('Y-m-d H:i:s'),
                'updated_at'       => Date('Y-m-d H:i:s')
    		]);

            if (empty($request->imageDetail)) {
                return response()->json(['message'=>'Đã có lỗi trên hệ thống'], 422);
            } else {
                foreach ($request->imageDetail as $key => $value){
                    $url_image_detail     = $value->hashName('');
                    $newImageSlide = Image::make($value)->resize(null, 520, function ($constraint) {
                            $constraint->aspectRatio();
                        })->encode('png')->save(public_path('/images/product_detail/'.$url_image_detail));

                    $images             = new ProductImageModel();
                    $images->url_image  = $url_image_detail;
                    $images->product_id = $productId;
                    $images->save();
                }
            }
            
            
            DB::commit();
            return response()->json(['message'=>true], 200);

    	} catch (Exception $e) {
    		DB::rollback();
            return response()->json(['message'=>'Đã có lỗi trên hệ thống'], 422);
    	}

    }

    public function getEdit(ProductModel $product, ProductDetailModel $detail, $id) {
        if ($id) {
            $result = $product->where('id', $id)->with('cates')->first();
            if (empty($result)) {
                return response()->json(['message'=>'Không tìm thấy dữ liệu phù hợp'], 422);
            } else {
                return response()->json($result);
            }
        }
    }

    public function getUpdate(ProductModel $product, ProductDetailModel $detail, $id, 
                               Request $request ){
        $this->validateUpdate($request);
        if ($id) {
            DB::beginTransaction();
            try {
                $product_update = $product->find($id);
                if ($request->hasFile('url_image')) {
                    $url_image     = $request->url_image->hashName('');
                    $newImageSlide = Image::make($request->url_image)->resize(null, 520, function ($constraint) {
                            $constraint->aspectRatio();
                        })->encode('png')->save(public_path('/images/main_prodcut/'.$url_image));
                } else {
                    $url_image = $product_update->url_image;
                }
                $product_update->name             = $request->name;
                $product_update->url_image        = $url_image;
                $product_update->description      = $request->description;
                $product_update->slug             = sanitizeTitle($request->name);
                $product_update->cate_id          = $request->cate_id;
                $product_update->price            = $request->price;
                $product_update->sale_description = $request->sale_description;
                $product_update->cate_sale        = $request->cate_sale;
                $product_update->material         = $request->material;
                $product_update->made_in          = $request->made_in;
                $product_update->trade            = $request->trade;
                $product_update->status           = $request->status;
                $product_update->tag              = trim($request->tag, ',');
                $product_update->save();
                DB::commit();
                return response()->json(['status'=>true], 200);
            } catch (Exception $e) {
                DB::rollback();
                return response()->json(['message'=>'Lỗi hệ thống không thể thêm mới'], 422);
            }
        }
    }

    public function getDelete(ProductModel $product, ProductDetailModel $detail, ProductImageModel $images, $id){
        DB::beginTransaction();
        try {
            if ($id) {
                $result = $detail::where('product_id', $id)->delete();
                $product->find($id)->delete();
                $images->where('product_id', $id)->delete();
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    public function detailProduct(ProductModel $product, ProductDetailModel $detail, $id) {
        $result = $detail->where('product_id', $id)
                         ->orderBy('id', 'desc')
                         ->with('sizes')
                         ->paginate(10);

        return response()->json($result);
    }

    public function insertDetailProduct(ProductModel $product, SizeModel $sizeModel, ProductDetailModel $detail, $id,
                                Request $request) {
        $this->validateDetailInsert($request);
        DB::beginTransaction();
        try {
            $product_detail_id = $detail->insertGetId([
                'color'      => $request->color,
                'product_id' => $id,
            ]);

            if (isset($request->size)) {
                foreach ($request->size as $key => $value) {
                    $insert[] = ['product_detail_id' => $product_detail_id, 'size_id' => $value];
                }
            }
            DB::table('product_size')->insert($insert);
            DB::commit();
            return response()->json(['message'=>true], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['message'=>'Lỗi hệ thống không thể thêm mới'], 422);
        }
    }

    public function editDetailProduct(ProductModel $product, ProductDetailModel $detail, $id, 
                                Request $request) {
        if ($id) {
            try {
                $result = $detail->where('id', $id)->with('sizes')->first();
                return response()->json($result);
            } catch (Exception $e) {
                return response()->json(['message'=>'Lỗi hệ thống không thể thêm mới'], 422);
            }
        }
    }

    public function updateDetailProduct(ProductModel $product, ProductDetailModel $detail, $id, 
                                Request $request) {
        $this->validateDetailUpdate($request);
        if ($id) {
            DB::beginTransaction();
            try {
                $detailProduct = $detail->find($id);
                if (empty($detailProduct)) {
                    return response()->json(['message'=>'Lỗi hệ thống không thể sửa chữa'], 422);
                }
                $detailProduct->sizes()->detach();

                $detailProduct->color    = $request->color;

                $detailProduct->sizes()->sync($request->size);

                $detailProduct->save();

                DB::commit();
                return response()->json(['message'=>true], 200);
                
            } catch (Exception $e) {
                DB::rollback();
                return response()->json(['message'=>'Lỗi hệ thống không thể thêm mới'], 422);
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
                    return response()->json(['message'=>'Lỗi hệ thống không thể xóa'], 422);
                } else {
                    $result->delete();
                }
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
    }


    public function validateInsert($request){
        return $this->validate($request, [
            'name'      => 'required| unique:products,name| max:250',
            'url_image' => 'required',
            'cate_id'   => 'required',
            'cate_sale' => 'required',
            'price'     => 'required| max:250',
            'material'  => 'required',
            'made_in'   => 'required',
            'status'    => 'required',
            ], [
            'name.required'      => 'Tên sản phẩm không được để trống',
            'name.required'      => 'Tên sản phẩm dài khoảng 250 kí tự',
            'name.unique'        => 'Đã có tên tiêu đề này',
            'url_image.required' => 'Ảnh chính không được để trống',
            'cate_id.required'   => 'Loại sản phẩm không được để trống',
            'cate_sale.required' => 'Loại khuyến mãi không được để trống',
            'price.required'     => 'Giá sản phẩm không được để trống',
            'url_image.required' => 'Ảnh chính không được để trống',
            'material.required'  => 'Chất liệu không được để trống',
            'made_in.required'   => 'Nơi sản xuất không được để trống',
            'status.required'    => 'Trạng thái hàng không được để trống',
            ]
        );
    }

    public function validateUpdate($request){
        return $this->validate($request, [
            'name'      => 'required| max:250',
            'cate_id'   => 'required',
            'cate_sale' => 'required',
            'price'     => 'required| max:250',
            'material'  => 'required',
            'made_in'   => 'required',
            'status'    => 'required',
            ], [
            'name.required'      => 'Tên sản phẩm không được để trống',
            'name.required'      => 'Tên sản phẩm dài khoảng 250 kí tự',
            'name.unique'        => 'Đã có tên tiêu đề này',
            'url_image.required' => 'Ảnh chính không được để trống',
            'cate_id.required'   => 'Loại sản phẩm không được để trống',
            'cate_sale.required' => 'Loại khuyến mãi không được để trống',
            'price.required'     => 'Giá sản phẩm không được để trống',
            'url_image.required' => 'Ảnh chính không được để trống',
            'material.required'  => 'Chất liệu không được để trống',
            'made_in.required'   => 'Nơi sản xuất không được để trống',
            'status.required'    => 'Trạng thái hàng không được để trống',
            ]
        );
    }

    public function validateDetailInsert($request){
        return $this->validate($request, [
            'color'      => 'required',
            'size'       => 'required',
            ], [
            'color.required'      => 'Màu sắc không được để trống',
            'size.required'       => 'Kích thước không được để trống',
            ]
        );
    }

    public function validateDetailUpdate($request){
        return $this->validate($request, [
            'color'      => 'required',
            'size'       => 'required',
            ], [
            'color.required'    => 'Màu sắc không được để trống',
            'size.required'     => 'Kích thước không được để trống',
            ]
        );
    }

}
