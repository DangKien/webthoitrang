@extends('FrontEnd.layouts.default')
@section ('title', 'Chi tiết sản phẩm')
@section ('myJs')
	<script>
		var slug = "@if (isset($slug)) {{ $slug }} @endif";
	</script>
    <script src="{{ url('js/ctrl/frontend') }}/productDetailCtrl.js"></script>
	<script src="{{ url('/js/factory/services/frontend') }}/productDetailService.js"></script>
@endsection
@section ('content')

<div class="single-product-area" ng-controller="productDetailCtrl">
    <div class="container">
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home') }}">
                 Trang chủ</a>
            </li>
            <li ng-repeat="(key, value) in data.categories">
                <a href="{{ url('categories') }}/@{{ value.slug }}"> @{{ value.name }} </a>
            </li>
        </ol>
        <div class="row">
            <div class="col-md-5">
                <div class="product-details-tab">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="productmain">
                            <div class="large-img">
                                <img ng-src="{{ url('images/main_prodcut') }}/@{{ data.productRecord.url_image }}" alt="" style="height: 550px;" />
                            </div>
                        </div>
                        <div ng-repeat="(key, images) in data.productRecord.images" class="tab-pane" id="product@{{ images.id }}">
                            <div class="large-img">
                                <img ng-src="{{ url('images/product_detail') }}/@{{ images.url_image }}" alt="" style="height: 550px;" />
                            </div>                          
                        </div>
                    </div>
                    <!-- Nav tabs -->
                    <div class="details-tab owl-carousel">
                        <div class="active">
                            <a href="#productmain" data-toggle="tab">
                                <img ng-src="{{ url('images/main_prodcut') }}/@{{ data.productRecord.url_image }}" alt="" style="height: 190px;"  />
                            </a>
                        </div>
                        <div owl-carousel-item ng-repeat="(key, images) in data.productRecord.images">
                            <a href="#product@{{ images.id }}" data-toggle="tab" >
                                <img ng-src="{{ url('images/product_detail') }}/@{{ images.url_image }}" alt="" style="height: 190px;" />
                            </a>
                        </div>
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
                        <h3>Giá: @{{ data.productRecord.price }}</h3>
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
                        <div class="pro-color-size mb-30">
                            <p>size :</p>
                            <ul>
                                <li ng-repeat="(key, detailSize) in data.detail[data.key].sizes"
                                > <a href="">@{{ detailSize.name }}</a> </li>
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
                                <li><a href="{{ url('categories') }}/@{{ data.productRecord.cates.slug }}">@{{ data.productRecord.cates.name }}</a></li>
                            </ul>
                        </div>
                        <div class="pro-tag">
                            <p>Tags :</p>
                            <ul>
                                <li>
                                    <a href="#">@{{ data.productRecord.tag }}</a>
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
        <div class="row mt-80">
            <div class="col-md-12">
                <div class="single-product-dec-area">
                    <div class="container">
                        <div class="single-product-dec-tab">
                            <ul role="tablist">
                                <li class="active">
                                    <a href="#description" data-toggle="tab">
                                        Mô tả sản phẩm
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="single-product-dec pb-100">
                            <div class="tab-content">
                                <div class="tab-pane active" id="description" ng-bind-html="data.productRecord.description">
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-50">
            <div class="col-md-12">
                <div class="features-tab pb-100">
                    <div class="home-2-tab">
                        <ul role="tablist">
                            <li class="active">
                                <a href="#dresses" data-toggle="tab">
                                    Sản phẩm liên quan
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="dresses">
                            <div class="row">
                                <div class="col-md-4 col-lg-3 col-sm-6" ng-repeat="(key, products) in data.productInvole">
                                    <div class="single-shop">
                                        <div class="shop-img">
                                            <a href="{{ url('product') }}/@{{ products.slug }}"><img ng-src="{{ url('images/main_prodcut') }}/@{{ products.url_image }}" alt=""/></a>
                                            <div class="price-up-down">
                                                <span class="sale-new" ng-if="products.cate_sale == 0">
                                                    New
                                                </span>

                                                <span class="sale-new" ng-if="products.cate_sale != 0">
                                                    @{{ products.sales.name }}
                                                </span>

                                            </div>
                                            <div class="button-group">
                                                <a href="#" title="Add to Cart">
                                                    <i class="pe-7s-cart"></i>
                                                        Thêm vào giỏ hàng
                                                </a>
                                            </div>
                                        </div>
                                        <div class="shop-text-all">
                                            <div class="title-color fix">
                                                <div class="shop-title f-left">
                                                    <h3><a href="{{ url('product') }}/@{{ products.slug }}" title="">
                                                        @{{ products.name }}
                                                    </a></h3>
                                                </div>
                                                <div class="pro-color f-right">
                                                    <ul>
                                                       <li ng-repeat="(key, colors) in products.details"
                                                            ng-style="{'background': colors.color}"
                                                       >b</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="price-ratting fix">
                                                <span class="price f-left">
                                                    <span class="new">@{{ products.price }} Vnđ</span>
                                                </span>
                                                <span class="ratting pull-right" ng-repeat="n in [0, 1, 2, 3, 4]"> 
                                                    <i class="fa" ng-class=" n < products.start ? 'fa-star' : 'fa-star-o'"></i>
                                                </span>
                                            </div>
                                        </div>                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection