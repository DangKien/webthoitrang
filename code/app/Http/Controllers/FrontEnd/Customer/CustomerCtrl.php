<?php

namespace App\Http\Controllers\FrontEnd\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomerModel;
use Auth, DB, Hash;

class CustomerCtrl extends Controller
{
    public function index(CustomerModel $customerModel) {
        if (Auth::guard('customer')->check()) {
            $customer = $customerModel::select('first_name', 'last_name', 'email', 'phone', 'node', 'address')->find(Auth::guard('customer')->user()->id);

            return view('FrontEnd.content.customer.customer', ['customer'=>$customer]);
        } else {
            return redirect()->route('home');
        }
    }

    public function updateAccount(Request $request, CustomerModel $customerModel) {
        $this->validateUpdate($request);
        $userId = Auth::guard('customer')->user()->id;
        $customer = $customerModel::find($userId);
        DB::beginTransaction();
        try {
            $customer->first_name = $request->first_name;
            $customer->last_name  = $request->last_name;
            $customer->account    = $request->account;
            $customer->email      = $request->email;
            $customer->phone      = $request->phone;
            $customer->node       = $request->node;
            $customer->address    = $request->address;
            $customer->save();
            DB::commit();
            return redirect()->route('customer');
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    public function changePass(Request $request,  CustomerModel $customerModel){
        $this->validatePass($request);
        $userId = Auth::guard('customer')->user()->id;
        $customer = customerModel::findOrFail($userId);
        $passwordOld = $customer->password;
        if(Hash::check($request->password, $passwordOld)) {
            DB::beginTransaction();
            try {
                $customer->password = $request->newPassword;
                $customer->save();
                DB::commit();
                return redirect()->route('customer');
            } catch (Exception $e) {
                DB::rollback();
            }
        } else {
            throw ValidationException::withMessages([
                'password'  => 'Mật khẩu cũ không đúng',
            ]);
        }
        
    }

    public function validateUpdate($request) {
        return $this->validate($request, [
            'first_name'       => 'required| max: 250',
            'last_name'        => 'required| max: 250',
            'email'            => 'required| max: 250|email',
            'phone'            => 'required| max: 15',
            ], [
            'first_name.required'       => 'Họ tên không được để trống',
            'first_name.max'            => 'Họ tên dưới 250 kí tự',
            'last_name.required'        => 'Tên không được để trống',
            'last_name.max'             => 'Tên dài dưới 250 kí tự',
            'phone.required'            => 'Số điện thoại không được để trống',
            'phone.max'                 => 'Số điện thoại dài dưới 15 kí tự',
            'password.same'             => 'Mật khẩu nhật lại không chính xác',
            'email.required'            => 'Email không được để trống',
            'email.unique'              => 'Email đã tồn tại',
            'email.max'                 => 'Email dưới 250 kí tự',
            'email.email'               => 'Email không đúng định dạng'
            ]
        );
    }

    public function validatePass($request) {
        return $this->validate($request, [
            'newPasswordConfirm' => 'required',
            'password'           => 'required',
            'newPassword'        => 'required| min:8| max: 30|same:newPasswordConfirm',
            
            ], [
            'password.required'           => 'Mật khẩu không được để trống',
            'newPassword.required'        => 'Mật khẩu mới không được để trống',
            'newPassword.max'             => 'Mật khẩu dài từ 8 đến 30 kí tự',
            'newPassword.min'             => 'Mật khẩu dài từ 8 đến 30 kí tự',
            'newPasswordConfirm.required' => 'Nhập lại mật khẩu không được để trống',
            'newPassword.same'            => 'Mật khẩu nhật lại không chính xác',
            ]
        );
    }

}
