<?php

namespace App\Http\Controllers\FrontEnd\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Auth, Cart, DB;
use App\Libs\EventSocket;

class CartCtrl extends Controller
{
    public function index() {
    	return view('FrontEnd.content.cart.cart');
    }

    public function checkout(Order $order, EventSocket $redis) {
    	if (Auth::guard('customer')->check()) {
    		if (Cart::count() != 0){
                if (!empty(Auth::guard('customer')->user()->address)
                && !empty(Auth::guard('customer')->user()->phone)) {
                    DB::beginTransaction();
                    try {
                        $order->user_id     = Auth::guard('customer')->user()->id;
                        $data = array();
                        foreach (Cart::content() as $key => $value) {
                            $product_order = 
                                [
                                'product'  => [
                                    'id'        => $value->id,
                                    'name'      => $value->name,
                                    'url_image' => $value->options->image,
                                    'price'     => $value->price,
                                ],
                                'quantity' => $value->qty ];
                            array_push($data, $product_order);
                        }
                        $order->data        = json_encode($data);
                        $order->total       = Cart::subtotal();
                        $order->total_order = Cart::subtotal();
                        $order->status      = 0;
                        $order->address     = Auth::guard('customer')->user()->address;
                        $order->save();

                        $redis->socketIO('order', $order);
                        DB::commit();
                        Cart::destroy();
                        return redirect()->route('home');
                    } catch (Exception $e) {
                        DB::rollback();
                    }
                } else {
                    return redirect()->route('login.frontend');
                }
            }
        } else {
            return redirect()->route('login.frontend');
        }
    }
   
}
