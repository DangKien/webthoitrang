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
                                        <input type="text" ng-model="value.qty" ng-change="updateCart(value.rowId, value.qty)">
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
                        <a href="{{ url('checkout') }}">Hoàn tất mua sắm</a>
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
        <div class="row mt-100">
            <div class="product-type">
                <div class="shop-menu text-left mb-50">
                <button><h3><b>Sản phẩm nổi bật</b></h3></button>
                </div>
                <?php $products_hightlight = App\Models\ProductModel::getProductHightlight(8); ?>
                <div class="row">
                    <div class="product-curosel product-curosel-style owl-carousel">
                        @foreach($products_hightlight as $product)
                            @if (count($product->details) != 0)
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="single-shop">
                                        <div class="shop-img">
                                            <a href="{{ url('product') }}/{{ $product->slug }}"><img src="{{ url('images/main_prodcut') }}/{{ $product->url_image }}" alt="" /></a>
                                            <div class="price-up-down">
                                                @if ($product->cate_sale != 0) 
                                                    <span class="sale-new" title="{{ $product->cate_sales->name }} {{ $product->sale_description }}">
                                                       {{ $product->cate_sales->name }} - {!! \Illuminate\Support\Str::words($product->sale_description, 3,'....')  !!}
                                                    </span>
                                                @endif
                                            </div>
                                           
                                        </div>
                                        <div class="shop-text-all">
                                            <div class="title-color fix">
                                                <div class="shop-title f-left">
                                                    <h3><a href="{{ url('product') }}/{{ $product->slug }}" title="{{ $product->name }}">
                                                        {!! \Illuminate\Support\Str::words($product->name, 5,'....')  !!}
                                                    </a></h3>
                                                </div>
                                                <div class="pro-color f-right">
                                                    <ul>
                                                        @foreach ($product->details as $detail)
                                                            <li style="background: {{ $detail->color }}">b</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="price-ratting fix">
                                                <span class="price f-left">
                                                    <span class="new">{{ $product->price }} Vnđ</span>
                                                </span>
                                                <span class="ratting f-right">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        @if ( $i < $product->start)  
                                                            <i class="fa fa-star active"></i>
                                                        @else
                                                            <i class="fa fa-star-o"></i>
                                                        @endif    
                                                    @endfor
                                                </span>
                                            </div>
                                        </div>                                  
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection