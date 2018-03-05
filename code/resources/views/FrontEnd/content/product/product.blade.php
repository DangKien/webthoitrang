@extends('FrontEnd.layouts.default')
@section ('title', 'Trang chủ')
@section ('myJs')
	<script>
		var slug      = "@if (isset($slug)) {{ $slug }} @endif";
	</script>
    <script src="{{ url('js/ctrl/frontend') }}/productDetailCtrl.js"></script>
	<script src="{{ url('/js/factory/services/frontend') }}/productDetailService.js"></script>
@endsection
@section ('content')
@include('FrontEnd.layouts.partial._breadcrumb')
<div class="single-product-area ptb-100" ng-controller="productDetailCtrl">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="product-details-tab">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="product1">
                            <div class="large-img">
                                <img src="assets/img/shop/3.jpg" alt="" />
                            </div>
                        </div>
                        <div class="tab-pane" id="product2">
                            <div class="large-img">
                                <img src="assets/img/shop/4.jpg" alt="" />
                            </div>							
                        </div>
                        <div class="tab-pane" id="product3">
                            <div class="large-img">
                                <img src="assets/img/shop/5.jpg" alt="" />
                            </div>							
                        </div>
                        <div class="tab-pane" id="product4">
                            <div class="large-img">
                                <img src="assets/img/shop/6.jpg" alt="" />
                            </div>							
                        </div>
                        <div class="tab-pane" id="product5">
                            <div class="large-img">
                                <img src="assets/img/shop/3.jpg" alt="" />
                            </div>							
                        </div>
                        <div class="tab-pane" id="product6">
                            <div class="large-img">
                                <img src="assets/img/shop/4.jpg" alt="" />
                            </div>							
                        </div>
                    </div>
                    <!-- Nav tabs -->
                    <div class="details-tab owl-carousel">
                        <div class="active"><a href="#product1" data-toggle="tab"><img src="assets/img/shop/3.jpg" alt="" /></a></div>
                        <div><a href="#product2" data-toggle="tab"><img src="assets/img/shop/4.jpg" alt="" /></a></div>
                        <div><a href="#product3" data-toggle="tab"><img src="assets/img/shop/5.jpg" alt="" /></a></div>
                        <div><a href="#product4" data-toggle="tab"><img src="assets/img/shop/6.jpg" alt="" /></a></div>
                        <div><a href="#product5" data-toggle="tab"><img src="assets/img/shop/3.jpg" alt="" /></a></div>
                        <div><a href="#product6" data-toggle="tab"><img src="assets/img/shop/4.jpg" alt="" /></a></div>
                    </div>	
                </div>
            </div>
            <div class="col-md-7">
                <div class="single-product-content">
                    <div class="single-product-dec pb-30  for-pro-border">
                        <h2>@{{ data.productRecord.name  }}</h2>
                        <span class="ratting" ng-repeat="n in [0, 1, 2, 3, 4]"> 
                            <i class="fa" ng-class=" n < data.productRecord.start ? 'fa-star' : 'fa-star-o'"></i>
                        </span>
                        <h3>@{{ data.productRecord.start }}</h3>
                        <p ng-bind-html="data.productRecord.description"></p>
                    </div>
                    <div class="single-cart-color for-pro-border">
                        <p>availability : 
                            <span>
                                Còn hàng
                            </span>
                        </p>
                        <div class="pro-color pro-color-style-2">
                            <p>color :</p>
                            <ul>
                                <li ng-repeat="(key, detail) in data.productRecord.details"
                                    style="background: @{{ detail.color }}"
                                ></li>
                            </ul>
                        </div>
                        <div class="pro-color-size">
                            <p>size :</p>
                            <ul>
                                <li ng-repeat="(key, detail) in data.productRecord.details"
                                    style="background: @{{ detail.color }}"
                                ></li>
                            </ul>
                        </div>
                        <div class="pro-quality">
                            <p>Quantity:</p>
						<input value="1" type="number">
                        </div>
                        <div class="single-pro-cart">
                            <a href="#" title="Add to Cart">
                                <i class="pe-7s-cart"></i>
                                add to cart
                            </a>
                        </div>
                    </div>
                    <div class="pro-category-tag ptb-30 for-pro-border">
                        <div class="pro-category">
                            <p>Loại sản phẩm :</p>
                            <ul>
                                <li><a href="#">@{{ data.productRecord.cates.name }}</a></li>
                            </ul>
                        </div>
                        <div class="pro-tag">
                            <p>Tags :</p>
                            <ul>
                                <li>
                                    <a href="#">Clothing</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pro-shared">
                        <p>shared :</p>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection