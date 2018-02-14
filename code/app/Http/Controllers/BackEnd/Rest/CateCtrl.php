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
		}
	}

	public function getEdit($id, Request $request, CategoryModel $cate) {

		if (isset($id) && !empty($id)) {
			$category = $cate::find($id);
			return response()->json($category);
		} else {
			return response()->json(['messages' => 'Id không tồn tại'], 422); 
		}
	}

	public function getUpdate($id, Request $request, CategoryModel $category) {
		if (isset($id) && !empty($id)) {
			$this->validateUpdate($request);
			DB::beginTransaction();
			try {
				$cate = $category::find($id);

				$url_link = url('')."/category/".sanitizeTitle($request->name);
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
			}
		}else {
			return response()->json(['messages' => 'Id không tồn tại'], 422); 
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
			}
			

		} else {
			return response()->json(['messages' => 'Id không tồn tại'], 422); 
		}
	}


	public function validateInsert($request){
	    return $this->validate($request, [
			'name'          => 'required|unique:category,name',
			], [
			'name.required' => 'Tên tiêu đề không được để trống',
			'name.unique'   => 'Đã có tên tiêu đề này',
	    	]
		);
	}
	public function validateUpdate($request){
	    return $this->validate($request, [
			'name'          => 'required',
			], [
			'name.required' => 'Tên tiêu đề không được để trống',
	    	]
		);
	}
}