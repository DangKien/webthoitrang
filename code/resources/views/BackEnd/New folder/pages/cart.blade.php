@extends('layouts.master') 
@section('content')
<div class="cart-section">
    <div class="container">
        <form action="{!! route('cart.store') !!}" method="POST" accept-charset="utf-8">
            {{ csrf_field() }}
            <input type="hidden" name="product_id" value="{!! $product->id !!}">
            <div class="cart-wrapper">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <div class="review-order col-xs-12 col-sm-7 col-md-7">
                            <h3>REVIEW YOUR ORDER</h3>
                            <h4 class="text-uppercase">{!! $product->title !!}</h4>
                            <div class="form-item">
                                <label for="price">Price</label>
                                <p id="price">${!! $product->price !!}</p>
                            </div>
                            <div class="form-item">
                                <label for="dimentions">Dimentions</label>
                                <p id="dimentions">{!! $product->demensions !!}</p>
                            </div>
                           {{--  <div class="form-item">
                                <label for="ship">Shipped</label>
                                <p id="ship">Rolled</p>
                            </div>
                            <div class="form-item">
                                <label for="delivery">Delivery</label>
                                <p id="delivery">3 - 5 business day</p>
                            </div> --}}
                            <div class="form-item">
                                <label for="original">Original</label>
                                <p id="original">{!! $product->is_original ? 'Yes':'No' !!}</p>
                            </div>
                            <div class="form-item">
                                <label for="certificate">Certificate</label>
                                <p id="certificate">{!! $product->is_copyright ? 'Yes':'No' !!}</p>
                            </div>
                            <div class="form-item">
                                <label for="style">Style</label>
                                <p id="style">{!! $product->styles->first()->name !!}</p>
                            </div>
                            <div class="form-item">
                                <label for="medium">Medium</label>
                                <p id="medium">{!! $product->mediums->first()->name !!}</p>
                            </div>
                            <div class="form-item">
                                <label for="subject">Subject</label>
                                <p id="subject">{!! $product->subjects->first()->name !!}</p>
                            </div>
                        </div>
                        <div class="image col-xs-12 col-sm-5 col-md-5">
                            {{-- <a href="" title=""><i class="fa fa-times-circle-o" aria-hidden="true"></i></a> --}}
                            <img class="img-responsive" src="{!! $product->image !!}" alt="{!! $product->title !!}">
                        </div>
                        <div class="total col-xs-12 col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="50%">
                                            <h3>CART TOTALS</h3></th>
                                        <th width="50%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Cart Subtotal</td>
                                        <td style="text-align: right">${!! $product->price !!}</td>
                                    </tr>
                                    {{-- <tr>
                                        <td>Shipping & Handling</td>
                                        <td style="text-align: right">Free shipping</td>
                                    </tr> --}}
                                    <tr>
                                        <td>Order total</td>
                                        <td style="text-align: right">${!! $product->price !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="complete col-xs-12 col-md-12">
                            <div class="title">
                                <h3>COMPLETE CHECKOUT</h3>
                            </div>
                            <div class="infomation col-xs-12 col-md-12">
                                <div class="description-info col-md-3">
                                    <h4>Shipping information</h4>
                                </div>
                                <div class="main-info col-xs-12 col-md-6">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="name" value="{{ $name or old('name') }}" placeholder="Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="phone_number" value="{{ $phone_number or old('phone_number') }}" placeholder="Phone">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" name="address" value="{{ $address or old('address') }}" placeholder="Address">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" name="postal_code" value="{{ $postal_code or old('postal_code') }}" placeholder="Postal code">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea name="note" class="form-control" rows="3" placeholder="Note">{{ $note or old('note') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="pay col-xs-12 col-md-12">
                                <div class="description-pay col-md-12">
                                    <h4>How would you like to pay ?</h4>
                                </div>
                                <div class="main-pay col-xs-12 col-md-12">
                                    <div class="item col-xs-6 col-md-3">
                                        <img src="{{ asset('assets/images/cart/paypal.png')}}" alt="">
                                        <p>Paypal</p>
                                        <input type="radio" name="pay_type" value="1" placeholder="">
                                    </div>
                                    <div class="item col-xs-6 col-md-3">
                                        <img src="{{ asset('assets/images/cart/bank.png')}}" alt="">
                                        <p>Banking transaction</p>
                                        <input type="radio" name="pay_type" value="2" placeholder="">
                                    </div>
                                    <div class="item col-xs-6 col-md-3">
                                        <img src="{{ asset('assets/images/cart/card.png')}}" alt="">
                                        <p>Debit&Credit card</p>
                                        <input type="radio" name="pay_type" value="3" placeholder="">
                                    </div>
                                    <div class="item  col-xs-6 col-md-3">
                                        <img src="{{ asset('assets/images/cart/money.png')}}" alt="">
                                        <p>Money (COD)</p>
                                        <input type="radio" name="pay_type" value="4" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="group-b col-xs-12 col-md-12">
                                {{-- <div class="form-group col-md-4">
                                    <a href="" class="service" title="">Shipment</a>
                                </div>
                                <div class="form-group col-md-4">
                                    <a href="" class="service" title="">Securities</a>
                                </div>
                                <div class="form-group col-md-4">
                                    <a href="" class="service" title="">Guiding/policy</a>
                                </div> --}}
                                <div class="form-group col-md-4 col-md-offset-4">
                                @if(Auth::check())
                                    <input type="submit" class="service check" value="Checkout">
                                @else
                                    <input class="service check form-control" type="text" value="Please login to checkout" disabled>
                                @endif
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-sm-4 cart-box">
                                    <div class="box-icon">
                                        <img src="{{ asset('assets/images/cart-icon-1.png') }}">
                                    </div>
                                    <div class="content-wrapper">
                                        <p class="box-content">
                                            Free world wide shipping and insurance
                                        </p>
                                        <p class="box-small-icon">
                                            <img class="img-responsive fedex-icon" src="{{ asset('assets/images/fedex-icon.png') }}">
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4 cart-box">
                                    <div class="box-icon">
                                        <img src="{{ asset('assets/images/cart-icon-2.png') }}">
                                    </div>
                                    <div class="content-wrapper middle">
                                        <p class="box-content">
                                            All painting are <br> Original and come with a <br> Certificate of Authenticity
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4 cart-box">
                                    <div class="box-icon">
                                        <img src="{{ asset('assets/images/cart-icon-3.png') }}">
                                    </div>
                                    <div class="content-wrapper">
                                        <p class="box-content">
                                            Secure Shopping
                                        </p>
                                        <p class="box-small-icon">
                                            <img src="{{ asset('assets/images/paypal-icon.png') }}">
                                            <img src="{{ asset('assets/images/visa-icon.png') }}">
                                            <img src="{{ asset('assets/images/master-icon.png') }}">
                                        </p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection