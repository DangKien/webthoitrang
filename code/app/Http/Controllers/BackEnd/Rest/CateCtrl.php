<?php

namespace App\Http\Controllers\BackEnd\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use DB;

class CateCtrl extends Controller
{
	public function getList(CategoryModel $cate, Request $request) {
		$current_page = $request->per_page;
		if ($current_page != 0) {
			$data = $cate->filterName($request->name)
					 ->buildCond()
					 ->with('users')
					 ->orderBy('id', 'desc')
					 ->paginate($current_page);
		} else if ($current_page == 0) {
			$data = $cate->select("name", "id", 'parent_id', 'url_link', 'slug')
						 ->get();
		}
		
		return $data;
	}

	public function getInsert(Request $request, CategoryModel $cate) { 
		$this->validateInsert($request);
		DB::beginTransaction();
		if ($request->cate_id == 0) {
			return response()->json(['message' => 'Không thể thêm loại sản phẩm cha'], 422);
		}

		try {
			if (empty($request->url_link)) {
				$url_link = url('')."/category/".sanitizeTitle($request->name);
			}
			$cate->name        = $request->name;
			$cate->slug        = sanitizeTitle($request->name);
			$cate->tag         = $request->tag;
			$cate->url_link    = $url_link;
			$cate->parent_id   = $request->cate_id;
			$cate->user_create = 1;
			$cate->save();

			DB::commit();

			return response()->json(['status' => true], 200);

		} catch (Exception $e) {
			DB::rollback();
			return response()->json(['message' => 'Lỗi từ hệ thống'], 422);
		}
	}

	public function getEdit($id, Request $request, CategoryModel $cate) {

		if (isset($id) && !empty($id)) {
			$category = $cate::find($id);
			return response()->json($category);
		} else {
			return response()->json(['message' => 'Id không tồn tại'], 422); 
		}
	}

	public function getUpdate($id, Request $request, CategoryModel $category) {
		if (isset($id) && !empty($id)) {
			$this->validateUpdate($request);
			DB::beginTransaction();
			$url_link = url('')."/category/".sanitizeTitle($request->name);
			try {
				$cate = $category::find($id);
				if ($cate->parent_id == 0) {
					$cate->name        = $request->name;
					$cate->tag         = $request->tag;
					$cate->slug        = sanitizeTitle($request->name);
					$cate->url_link    = $url_link;
				} else {	
					$cate->name        = $request->name;
					$cate->slug        = sanitizeTitle($request->name);
					$cate->tag         = $request->tag;
					$cate->url_link    = $url_link;
					$cate->parent_id   = $request->cate_id;
					$cate->user_create = 1;
				}
				$cate->save();

				DB::commit();

				return response()->json(['status' => true], 200);
			} catch (Exception $e) {
				DB::rollback();
				return response()->json(['message' => 'Lỗi từ hệ thống'], 422);
			}
		}else {
			return response()->json(['message' => 'Id không tồn tại'], 422); 
		}
	}
	
	public function getDelete($id) {

		if (isset($id) && !empty($id)) {
			DB::beginTransaction();
			try {
				$cate = CategoryModel::find($id)->delete();
				DB::commit();
				return response()->json(['status' => true], 200); 
				

			} catch (Exception $e) {
				DB::rollback();
				return response()->json(['message' => 'Lỗi từ hệ thống'], 422);
			}
			

		} else {
			return response()->json(['message' => 'Id không tồn tại'], 422); 
		}
	}


	public function validateInsert($request){
	    return $this->validate($request, [
			'name'               => 'required|unique:category,name',
			'cate_id'          => 'required',
			], [
			'name.required'      => 'Tên tiêu đề không được để trống',
			'name.unique'        => 'Đã có tên tiêu đề này',
			'cate_id.required' => 'Loại sản phẩm cha không được để trống',
	    	]
		);
	}
	public function validateUpdate($request){
	    return $this->validate($request, [
			'name'          => 'required',
			'cate_id'          => 'required',
			], [
			'name.required' => 'Tên tiêu đề không được để trống',
			'cate_id.required' => 'Loại sản phẩm cha không được để trống',
	    	]
		);
	}
}