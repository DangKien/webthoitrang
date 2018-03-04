@extends('FrontEnd.layouts.default')
@section ('title', 'Trang chủ')
@section ('myJs')
    
@endsection
@section ('content')
@include('FrontEnd.layouts.partial._breadcrumb')
<div class="text-center pt-20">
    <h2>{{ 'name' }}</h2>
</div>

<div class="single-product-area ptb-100">
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
                        <h2>Product Title</h2>
                        <span class="ratting">
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                        </span>
                        <h3>$200</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes Cum sociis natoque penatibus et magnis dis parturient montes consectetuer adipiscing.</p>
                    </div>
                    <div class="single-cart-color for-pro-border">
                        <p>availability : <span>in stock</span></p>
                        <div class="pro-color pro-color-style-2">
                            <p>color :</p>
                            <ul>
                                <li class="blue">b</li>
                                <li class="orange">o</li>
                                <li class="purple">p</li>
                                <li class="pink">p</li>
                            </ul>
                        </div>
                        <div class="pro-color-size">
                            <p>size :</p>
                            <ul>
                                <li><a href="#">xs</a></li>
                                <li><a href="#">s</a></li>
                                <li><a href="#">m</a></li>
                                <li><a href="#">l</a></li>
                                <li><a href="#">xl</a></li>
                            </ul>
                        </div>
                        <div class="model">
                            <p>model : <span>nms005</span></p>
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
                            <a href="#" title="wishlist">
                                <i class="pe-7s-like"></i>
                                wishlist
                            </a>
                        </div>
                    </div>
                    <div class="pro-category-tag ptb-30 for-pro-border">
                        <div class="pro-category">
                            <p>categories :</p>
                            <ul>
                                <li><a href="#">fashion</a></li>
                                <li><a href="#">kid</a></li>
                                <li><a href="#">men</a></li>
                                <li><a href="#">women</a></li>
                                <li><a href="#">Watche</a></li>
                            </ul>
                        </div>
                        <div class="pro-tag">
                            <p>tags :</p>
                            <ul>
                                <li>
                                    <a href="#">Clothing</a>
                                </li>
                                <li>
                                    <a href="#">accessories</a>
                                </li>
                                <li>
                                    <a href="#">fashion</a>
                                </li>
                                <li>
                                    <a href="#">footwear</a>
                                </li>
                                <li>
                                    <a href="#">kid</a>
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