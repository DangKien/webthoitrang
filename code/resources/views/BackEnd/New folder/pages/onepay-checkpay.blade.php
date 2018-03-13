@extends('layouts.master')
@section('content')
<div class="checkpay-page">
    <div class="container">
        <div class="main-content clearfix">
            <h3>CHECK PAYMENT</h3>
            <ul>
                <li>
                    <div class="col-left">Cart Subtotal</div>
                    <div class="col-right">${!! $product->price !!}</div>
                </li>
                <li>
                    <div class="col-left">Order total</div>
                    <div class="col-right">${!! $product->price !!}</div>
                </li>
                <li>
                    <div class="col-left">Name</div>
                    <div class="col-right">{!! $order->name !!}</div>
                </li>
                <li>
                    <div class="col-left">Phone</div>
                    <div class="col-right">{!! $order->phone_number !!}</div>
                </li>
                <li>
                    <div class="col-left">Email</div>
                    <div class="col-right">{!! $order->email !!}</div>
                </li>
                <li>
                    <div class="col-left">Address</div>
                    <div class="col-right">{!! $order->address !!}</div>
                </li>
                <li>
                    <div class="col-left">Postal code</div>
                    <div class="col-right">{!! $order->postal_code !!}</div>
                </li>
                <li class="vc-action">
                    <a class="btn vc-btn" href="{!! $url !!}">Continue Payment</a>
                    <a class="btn vc-btn vc-cancle" href="{!! route('cart.delete', ['order' => $order->id]) !!}">Cancel Order</a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection