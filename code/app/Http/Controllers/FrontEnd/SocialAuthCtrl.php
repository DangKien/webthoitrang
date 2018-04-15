<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomerModel;
use Socialite, Auth;


class SocialAuthCtrl extends Controller
{
   public function redirectFb(CustomerModel $customerModel) {
        return Socialite::driver('facebook')->redirect();
   }

   public function callbackFb(CustomerModel $customerModel) {
        $customer = Socialite::driver('facebook')->user();
        $a = $customer->id;
        $b = $customer->name;
        $bb =   $customerModel::where('provider_id', $a)
                ->where('provider','facebook')
                ->first();
        if ($bb){
            Auth::guard('customer')->login($bb);
            return redirect()->route('home');
        }
        else {
            $customerModel->first_name  = $customer->name;
            $customerModel->email       = $customer->email;
            $customerModel->provider    ="facebook";
            $customerModel->provider_id = $customer->id;
            $customerModel->save();

            $dd = $customerModel::where('provider_id', $a)
                ->where('provider','facebook')
                ->first();

            Auth::guard('customer')->login($dd);
            return redirect()->route('home');
        }

   }


   public function redirectGG(CustomerModel $customerModel) {
        return Socialite::driver('google')->redirect();
   }

   public function callbackGG(CustomerModel $customerModel) {
        $customer = Socialite::driver('google')->user();
        $a = $customer->id;
        $b = $customer->name;
        $bb =   $customerModel::where('provider_id', $a)
                ->where('provider','google')
                ->first();
        if ($bb){
            Auth::guard('customer')->login($bb);
            return redirect()->route('home');
        }
        else {
            $customerModel->first_name  = $customer->name;
            $customerModel->email       = $customer->email;
            $customerModel->provider    ="google";
            $customerModel->provider_id = $customer->id;
            $customerModel->save();

            $dd = $customerModel::where('provider_id', $a)
                ->where('provider','google')
                ->first();

            Auth::guard('customer')->login($dd);
            return redirect()->route('home');
        }

   }
}
