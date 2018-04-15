@extends('FrontEnd.layouts.default')
@section ('title', 'Sản phẩm')
@section ('myJs')
  
@endsection
@section ('content')
@include('FrontEnd.layouts.partial._breadcrumb')
<div class="cart-area ptb-60" ng-controller="cartCtrl">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-price">Ảnh sản phẩm</th>
                                    <th class="product-name">Tên sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-subtotal">Tổng giá</th>
                                    <th class="product-name"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="(key, value) in cartItems.cartItems">
                                    <td class="product-thumbnail">
                                        <a href="{{ url('product') }}/@{{ value.options.slug }}"><img style="height: 120px; width: 120px" ng-src="{{ url('images/main_prodcut') }}/@{{ value.options.image }}" alt=""></a>
                                    </td>
                                    <td class="product-name"><a href="{{ url('product') }}/@{{ value.options.slug }}">@{{ value.name }}</a></td>
                                    <td class="product-price"><span class="amount">@{{ value.price }} vnđ</span></td>
                                    <td class="product-quantity">
                                        <input value="1" type="number">
                                    </td>
                                    <td class="product-subtotal">@{{ value.subtotal }} vnđ</td>
                                    <td class="product-remove">
                                        <a style="cursor: pointer;" ng-click="deleteCart(value.rowId)"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-md-4 col-sm-12 col-xs-12 pull-right">
                <div class="cart-total-btn">
                    <div class="cart-total-btn1 f-left">
                        <a href="#">Hoàn tất mua sắm</a>
                    </div>
                    <div class="cart-total-btn2 f-right">
                        <a href="#">Tiếp tục mua sắm</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12 pull-right">
                <div class="cart-total">
                    <ul>    
                        <li class="cart-black">Tổng tiền<span> @{{ cartItems.cartTotal }} vnđ</span></li>
                    </ul>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection