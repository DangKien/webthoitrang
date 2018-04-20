<?php

namespace App\Http\Controllers\FrontEnd\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommentModel;
use DB, Auth;

class CommentCtrl extends Controller
{
    public function postComment(CommentModel $commentModel, Request $request, $id) {
        DB::beginTransaction();
        try {
            if (!Auth::guard('customer')->check()) {
            $this->validateInsert($request);
            $commentModel->content   = $request->content;
            $commentModel->name      = $request->name;
            $commentModel->email     = $request->email;
            $commentModel->parent_id = $id;
            $commentModel->status    = "AVAILABLE";
            $commentModel->category  = "new";
            $commentModel->save();
        } else {
            $this->validateInsert2($request);
            $commentModel->content   = $request->content;
            $commentModel->name      = Auth::guard('customer')->user()->name;
            $commentModel->email     = Auth::guard('customer')->user()->email;
            $commentModel->parent_id = $id;
            $commentModel->status    = "AVAILABLE";
            $commentModel->category  = "new";
            $commentModel->save();
            }
            DB::commit();
            return redirect()->back();
        } catch (Exception $e) {

            DB::rollback();
            return redirect()->back();
        }
    }

    public function validateInsert($request){
        return $this->validate($request, [
            'name'    => 'required',
            'email'   => 'required|email',
            'content' => 'required',
            ], [
            'name.required'    => 'Tên của bạn không được để trống',
            'email.required'   => 'Email của bạn không được để trống',
            'email.required'   => 'Email của bạn không đúng định dạng',
            'content.required' => 'Nội dung không được để trống',
            ]
        );
    }

    public function validateInsert2($request){
        return $this->validate($request, [
            'content' => 'required',
            ], [    
            'content.required' => 'Nội dung không được để trống',
            ]
        );
    }

}
