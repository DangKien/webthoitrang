<?php

namespace App\Http\Controllers\FrontEnd\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ContactModel;
use DB;

class ContactCtrl extends Controller
{
    public function index(CategoryModel $category, ProductModel $product) {
    	return view('frontend.content.contact.contact');
    }

    public function message(ContactModel $contacModel, Request $request) {
        $this->validateInsert($request);
        DB::beginTransaction();
        try {
            $contacModel->name    = $request->name;
            $contacModel->email   = $request->email;
            $contacModel->phone   = $request->phone;
            $contacModel->message = $request->message;

            $contacModel->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        return view('frontend.content.contact.contact')->with("message", "Bạn đã gửi tin nhắn thành công. Xin chân thành cảm ơn!");
    }

    public function validateInsert($request){
        return $this->validate($request, [
            'name'    => 'required',
            'email'   => 'required|email',
            'phone'   => 'required',
            'message' => 'required',
            ], [
            'name.required'    => 'Tên của bạn không được để trống',
            'email.required'   => 'Email của bạn không được để trống',
            'email.required'   => 'Email của bạn không đúng định dạng',
            'phone.required'   => 'Số điện thoại của bạn không được để trống',
            'message.required' => 'Tin nhắn của bạn không được để trống',
            ]
        );
    }

}
