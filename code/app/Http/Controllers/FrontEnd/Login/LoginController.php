<?php

namespace App\Http\Controllers\FrontEnd\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomerModel;
use Illuminate\Validation\ValidationException;
use DB, Hash, Auth;

class LoginController extends Controller
{
    public function showLoginForm() {
    	return view("FrontEnd.content.login.login");
    }

    public function showRegisterForm() {
    	return view("FrontEnd.content.login.register");
    }

    public function todoLogin(Request $request) {
        $this->validateLogin($request);
        if(Auth::guard('customer')
                    ->attempt(['account' => $request->account, 'password' => $request->password])) {
            return redirect()->route('home');
        } 
        else {
            throw ValidationException::withMessages([
                'account'  => 'Tài khoản không không hợp lệ',
                'password' =>'Mật khẩu không hợp lệ'
            ]);
        }
    }

    public function logout(Request $request){
        Auth::guard('customer')->logout();

        $request->session()->invalidate();

        return redirect()->route('home');
    }
    public function postRegister(Request $request, CustomerModel $customer) {
        $this->validateInsert($request);
        DB::beginTransaction();
        try {
            $customer->first_name     = $request->first_name;
            $customer->last_name      = $request->last_name;
            $customer->account        = $request->account;
            $customer->email          = $request->email;
            $customer->phone          = $request->phone;
            $customer->password       = Hash::make($request->password);
            $customer->provider       = 'users';
            $customer->provider_id    = 0;
            $customer->remember_token = $request->_token;
            $customer->save();
            DB::commit();
            return redirect()->route('login.frontend');
        } catch (Exception $e) {
            DB::rollback();
        }
    
       //     // $mail = array('name'=>$request->yourname,
       //     //                  'email'=>$request->email,
       //     //                  'password'=>$request->password,
       //     //               );
       //     // $this->email = $request->email;

       //     // Mail::send('fontend.mail.mail', $mail, function ($message) {
       //     //     $message->from('dangtrungkien21121996@gmail.com','Admin Flower Beautiful');
               
       //     //     $message->to($this->email);
               
       //     //     $message->subject('Register sucssec!!!');
       //     // });

    }

    public function validateLogin($request) {
        $this->validate($request, [
            'account'  => 'required|string',
            'password' => 'required|string',
        ], [
            'account.required'  => 'Tài khoản không được bỏ trống',
            'password.required' => 'Mật khẩu không được bỏ trống'
        ]);
    }

    public function validateInsert($request) {
        return $this->validate($request, [
			'first_name'       => 'required| max: 250',
			'last_name'        => 'required| max: 250',
			'account'          => 'required| max: 250',
			'email'            => 'required| max: 250|unique:customer,email|email',
			'phone'            => 'required| max: 15',
			'confirm_password' => 'required',
			'password'         => 'required| min:8| max: 30|same:confirm_password',
			
            ], [
			'first_name.required'       => 'Họ tên không được để trống',
			'first_name.max'            => 'Họ tên dưới 250 kí tự',
			'last_name.required'        => 'Tên không được để trống',
			'last_name.max'             => 'Tên dài dưới 250 kí tự',
			'account.required'          => 'Tài khoản không được để trống',
			'account.max'               => 'Tài khỏan dài dưới 250 kí tự',
			'phone.required'            => 'Số điện thoại không được để trống',
			'phone.max'                 => 'Số điện thoại dài dưới 15 kí tự',
			'password.required'         => 'Mật khẩu không được để trống',
			'password.max'              => 'Mật khẩu dài từ 8 đến 30 kí tự',
			'password.min'              => 'Mật khẩu dài từ 8 đến 30 kí tự',
			'confirm_password.required' => 'Nhập lại mật khẩu không được để trống',
			'password.same'             => 'Mật khẩu nhật lại không chính xác',
			'email.required'            => 'Email không được để trống',
			'email.unique'              => 'Email đã tồn tại',
			'email.max'                 => 'Email dưới 250 kí tự',
			'email.email'               => 'Email không đúng định dạng'
            ]
        );
    }
}
