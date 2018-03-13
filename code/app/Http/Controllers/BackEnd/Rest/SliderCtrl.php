<?php

namespace App\Http\Controllers\BackEnd\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SliderModel;
use DB, Storage;

class SliderCtrl extends Controller
{
    public function getList(SliderModel $sliderModel, Request $request) {
        $perPage = $request->input('perPage', 10);
        $slide    = $sliderModel
                           ->orderBy('id','desc')
                           ->paginate($perPage);

        return response()->json($slide);
    }


    public function getInsert(SliderModel $sliderModel, Request $request) {
        DB::beginTransaction();
        try {
            $location_max = DB::table('slides')
                                ->max('location');
                                
            if (!$request->hasFile('url_image')) {
                return response()->json(['message'=>'Đã có lỗi trên hệ thống 1'], 422);
            }

            $url_image              = Storage::putFile('images/slides', $request->url_image);
            $sliderModel->name      = $request->name;
            $sliderModel->url_image = $url_image;
            $sliderModel->location  = $location_max + 1;

            $sliderModel->save();

            DB::commit();
            return response()->json(['message'=>true], 200);

        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['message'=>'Đã có lỗi trên hệ thống'], 422);
        }
    }


    public function getEdit($id, Request $request, SliderModel $sliderModel) {

        if (isset($id) && !empty($id)) {
            $slides = $sliderModel::find($id);
            return response()->json($slides);
        } else {
            return response()->json(['message' => 'Id không tồn tại'], 422); 
        }
    }

    public function getUpdate($id, Request $request, SliderModel $sliderModel) {
        if (isset($id)){

            DB::beginTransaction();
            try {
                $slide = $sliderModel::find($id);

                if (!$request->hasFile('url_image')) {
                    $url_image = $slide->url_image;
                }
                else {
                    $url_image        = Storage::putFile('images/slides', $request->url_image);
                }
                $slide->name      = $request->name;
                $slide->url_image = $url_image;

                if ($request->location !=  $slide->location) {
                    $this->_locationSlide($request->location, $slide->location);
                } else {
                    $slide->location = $request->location;
                }
                $slide->save();
                DB::commit();
                return response()->json(['status' => true], 200);
            } catch (Exception $e) {
                DB::rollback();
            }
        }else {
            return response()->json(['message' => 'Id không tồn tại'], 422); 
        }
    }

    public function _locationSlide($locationNew, $locationOld) {
        if ($locationNew > $locationOld) {
            $slide_updated = SliderModel::where('location', '=', $locationOld)->first();

            $slide_locations = SliderModel::whereBetween('location',[$locationOld + 1, $locationNew])
                                         ->get();

            SliderModel::where('id', '=', $slide_updated->id)->update(['location' => $locationNew]);

            foreach($slide_locations as $key => $slide_update ) {
                SliderModel::where('id', '=', $slide_update->id)->update(['location' => $slide_update->location - 1]);
            }
        } else if ($locationNew < $locationOld) {
            $slide_updated = SliderModel::where('location', '=', $locationOld)->first();

            $slide_locations = SliderModel::whereBetween('location', [$locationNew, $locationOld - 1])
                                         ->get();

            SliderModel::where('id', '=', $slide_updated->id)->update(['location' => $locationNew]);

            foreach($slide_locations as $key => $slide_update ) {
                SliderModel::where('id', '=', $slide_update->id)->update(['location' => $slide_update->location + 1]);
            }
        }
    }
    
    public function getDelete($id,  SliderModel $sliderModel) {

        if (isset($id) && !empty($id)) {
            DB::beginTransaction();
            try {
                $cate = $sliderModel::find($id)->delete();
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
            'name'             => 'required|unique:category,name',
            'cate_id'          => 'required',
            ], [
            'name.required'    => 'Tên tiêu đề không được để trống',
            'name.unique'      => 'Đã có tên tiêu đề này',
            'cate_id.required' => 'Loại sản phẩm cha không được để trống',
            ]
        );
    }
    public function validateUpdate($request){
        return $this->validate($request, [
            'name'    => 'required',
            'cate_id' => 'required',
            ], [
            'name.required'    => 'Tên tiêu đề không được để trống',
            'cate_id.required' => 'Loại sản phẩm cha không được để trống',
            ]
        );
    }
}

