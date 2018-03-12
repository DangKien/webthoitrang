@extends('layouts.master')
@section('content')
<div class="result-page">
    <div class="container">
        <div class="main-content clearfix">
            <h3>PAYMENT RESULT</h3>
            <ul>
                <li>
                    <div class="col-left">Transaction status</div>
                    <div class="col-right">{!! $status !!}</div>
                </li>
                <li>
                    <div class="col-left">Amount</div>
                    <div class="col-right">${!! $amount !!}</div>
                </li>
                <li>
                    <div class="col-left">Order id</div>
                    <div class="col-right">{!! $order_id !!}</div>
                </li>
                <li>
                    <div class="col-left">Transaction id</div>
                    <div class="col-right">{!! $transaction_no !!}</div>
                </li>
                <li class="vc-action">
                    <a class="btn vc-btn" href="{!! route('product.index') !!}">Continue shopping</a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection