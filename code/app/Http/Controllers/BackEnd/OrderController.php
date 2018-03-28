<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = new Order();
        $orders      = $orders->orderBy('id', "DESC");
        $orders = $orders->get();
        $orders = $orders->map(function($item){
            $user = User::find($item->user_id);
            $item->customer_email = $user->email;
            if($item->status == 0) {
                $item->status = 'Processing';
            } elseif($item->status == 1) {
                $item->status = 'Completed';
            } elseif($item->status == 2) {
                $item->status = 'Pending';
            } elseif($item->status == 3) {
                $item->status = 'Cancel';
            } elseif($item->status == 4) {
                $item->status = 'Refund';
            } else {
                $item->status = 'Pending';
            }
            return $item;
        });
        return view('BackEnd.content.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $user = User::find($order->user_id);
        $order->customer_name = $user->first_name . ' ' . $user->last_name;
        $order->customer_email = $user->email;
        $order->customer_phone = $user->phone;
        if($order->status == 0) {
            $order->status_text = 'Processing';
        } elseif($order->status == 1) {
            $order->status_text = 'Completed';
        } elseif($order->status == 2) {
            $order->status_text = 'Pending';
        } elseif($order->status == 3) {
            $order->status_text = 'Cancel';
        } elseif($order->status == 4) {
            $order->status_text = 'Refund';
        } else {
            $order->status_text = 'Pending';
        }

        $data = json_decode($order->data);
        return view('BackEnd.content.order.show', compact('order', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Odrer $order)
    {
        $order->delete();
        return redirect()->route('order.index')
            ->with('success', 'Order deleted successfully');
    }
}
