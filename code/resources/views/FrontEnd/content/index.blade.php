@extends('FrontEnd.layouts.default')
@section ('title', 'Trang chủ')
@section ('myJs')
    <script src="{{ url('')}}/js/ctrl/backend/cateCtrl.js"></script>
    <script src="{{ url('')}}/js/factory/services/backend/cateService.js"></script>
    <script src="{{ url('')}}/js/directives/modal/backend/cateModal.js"></script>
@endsection
@section ('content')
    <div class="service-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 mb-30">
                        <div class="single-service">
                            <div class="service-icon">
                                <i class="pe-7s-plane"></i>
                            </div>
                            <div class="service-text">
                                <h3>FREE SHIIPPING</h3>
                                <p>Guaranteed delivery in 4 days</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 mb-30">
                        <div class="single-service">
                            <div class="service-icon">
                                <i class="pe-7s-back"></i>
                            </div>
                            <div class="service-text">
                                <h3>100% Monye back</h3>
                                <p>Send within 30 days</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 mb-30">
                        <div class="single-service">
                            <div class="service-icon">
                                <i class="pe-7s-headphones"></i>
                            </div>
                            <div class="service-text">
                                <h3>online support</h3>
                                <p>Call us 24/7 at 070-7782-9137</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service area end -->
        <!-- banner style 2 start -->
        <div class="banner-style-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="banner-style-2-img mb-res">
                            <img src="assets/img/banner/6.jpg" alt="">
                            <div class="banner-style-2-dec">
                                <h3><span>top 10</span> looks 2017</h3>
                                <h4>awesome collection </h4>
                                <a href="#">shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="banner-style-2-img">
                            <img src="assets/img/banner/7.jpg" alt="">
                            <div class="banner-style-2-dec">
                                <h3>save up to <span> 40% off</span></h3>
                                <h4>awesome collection </h4>
                                <a href="#">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner style 2 end -->
        <!-- shop area start -->
        <div class="portfolio-area ptb-100">
            <div class="container">
                <div class="section-title text-center mb-50">
                    <h2>Featured Collections <i class="fa fa-shopping-cart"></i></h2>
                </div>
                <div class="shop-menu portfolio-left-menu text-center mb-50">
                    <button class="active" data-filter="*">ALL</button>
                    <button data-filter=".mix1">Dresses </button>
                    <button data-filter=".mix2">Bags</button>
                    <button data-filter=".mix3">Jewelry </button>
                    <button data-filter=".mix4">Shoes </button>
                </div>          
                <div class="row portfolio-style-2">
                    <div class="grid">
                        <div class="col-md-3 col-sm-6 col-xs-12 grid-item mix1 mb-50">
                            <div class="single-shop">
                                <div class="shop-img">
                                    <a href="#"><img src="assets/img/shop/equal/1.jpg" alt="" /></a>
                                    <div class="shop-quick-view">
                                        <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                            <i class="pe-7s-look"></i>
                                        </a>
                                    </div>
                                    <div class="price-up-down">
                                        <span class="sale-new">sale</span>
                                    </div>
                                    <div class="button-group">
                                        <a href="#" title="Add to Cart">
                                            <i class="pe-7s-cart"></i>
                                            add to cart
                                        </a>
                                        <a class="wishlist" href="#" title="Wishlist">
                                            <i class="pe-7s-like"></i>
                                            Wishlist
                                        </a>
                                    </div>
                                </div>
                                <div class="shop-text-all">
                                    <div class="title-color fix">
                                        <div class="shop-title f-left">
                                            <h3><a href="#">Product Title</a></h3>
                                        </div>
                                        <div class="pro-color f-right">
                                            <ul>
                                                <li class="blue">b</li>
                                                <li class="orange">o</li>
                                                <li class="purple">p</li>
                                                <li class="pink">p</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="price-ratting fix">
                                        <span class="price f-left">
                                            <span class="new">$120.00</span>
                                            <span class="old">$130.00</span>
                                        </span>
                                        <span class="ratting f-right">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                        </span>
                                    </div>
                                </div>                                  
                            </div>
                        </div>                  
                        <div class="col-md-3 col-sm-6 col-xs-12 grid-item mix2 mix3 mb-50">
                            <div class="single-shop">
                                <div class="shop-img">
                                    <a href="#"><img src="assets/img/shop/equal/2.jpg" alt="" /></a>
                                    <div class="shop-quick-view">
                                        <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                            <i class="pe-7s-look"></i>
                                        </a>
                                    </div>
                                    <div class="button-group">
                                        <a href="#" title="Add to Cart">
                                            <i class="pe-7s-cart"></i>
                                            add to cart
                                        </a>
                                        <a class="wishlist" href="#" title="Wishlist">
                                            <i class="pe-7s-like"></i>
                                            Wishlist
                                        </a>
                                    </div>
                                </div>
                                <div class="shop-text-all">
                                    <div class="title-color fix">
                                        <div class="shop-title f-left">
                                            <h3><a href="#">Product Title</a></h3>
                                        </div>
                                        <div class="pro-color f-right">
                                            <ul>
                                                <li class="blue">b</li>
                                                <li class="orange">o</li>
                                                <li class="purple">p</li>
                                                <li class="pink">p</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="price-ratting fix">
                                        <span class="price f-left">
                                            <span class="new">$150.00</span>
                                        </span>
                                        <span class="ratting f-right">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                        </span>
                                    </div>
                                </div>                                  
                            </div>                      
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 grid-item mix1 mb-50">
                            <div class="single-shop">
                                <div class="shop-img">
                                    <a href="#"><img src="assets/img/shop/equal/3.jpg" alt="" /></a>
                                    <div class="shop-quick-view">
                                        <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                            <i class="pe-7s-look"></i>
                                        </a>
                                    </div>
                                    <div class="price-up-down">
                                        <span class="sale-new">-30%</span>
                                    </div>
                                    <div class="button-group">
                                        <a href="#" title="Add to Cart">
                                            <i class="pe-7s-cart"></i>
                                            add to cart
                                        </a>
                                        <a class="wishlist" href="#" title="Wishlist">
                                            <i class="pe-7s-like"></i>
                                            Wishlist
                                        </a>
                                    </div>
                                </div>
                                <div class="shop-text-all">
                                    <div class="title-color fix">
                                        <div class="shop-title f-left">
                                            <h3><a href="#">Product Title</a></h3>
                                        </div>
                                        <div class="pro-color f-right">
                                            <ul>
                                                <li class="blue">b</li>
                                                <li class="orange">o</li>
                                                <li class="purple">p</li>
                                                <li class="pink">p</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="price-ratting fix">
                                        <span class="price f-left">
                                            <span class="new">$120.00</span>
                                            <span class="old">$170.00</span>
                                        </span>
                                        <span class="ratting f-right">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                        </span>
                                    </div>
                                </div>                                  
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 grid-item mix2 mix4 mb-50">
                            <div class="single-shop">
                                <div class="shop-img">
                                    <a href="#"><img src="assets/img/shop/equal/4.jpg" alt="" /></a>
                                    <div class="shop-quick-view">
                                        <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                            <i class="pe-7s-look"></i>
                                        </a>
                                    </div>
                                    <div class="button-group">
                                        <a href="#" title="Add to Cart">
                                            <i class="pe-7s-cart"></i>
                                            add to cart
                                        </a>
                                        <a class="wishlist" href="#" title="Wishlist">
                                            <i class="pe-7s-like"></i>
                                            Wishlist
                                        </a>
                                    </div>
                                </div>
                                <div class="shop-text-all">
                                    <div class="title-color fix">
                                        <div class="shop-title f-left">
                                            <h3><a href="#">Product Title</a></h3>
                                        </div>
                                        <div class="pro-color f-right">
                                            <ul>
                                                <li class="blue">b</li>
                                                <li class="orange">o</li>
                                                <li class="purple">p</li>
                                                <li class="pink">p</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="price-ratting fix">
                                        <span class="price f-left">
                                            <span class="new">$120.00</span>
                                        </span>
                                        <span class="ratting f-right">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                        </span>
                                    </div>
                                </div>                                  
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 grid-item mix1 mb-50">
                            <div class="single-shop">
                                <div class="shop-img">
                                    <a href="#"><img src="assets/img/shop/equal/5.jpg" alt="" /></a>
                                    <div class="shop-quick-view">
                                        <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                            <i class="pe-7s-look"></i>
                                        </a>
                                    </div>
                                    <div class="button-group">
                                        <a href="#" title="Add to Cart">
                                            <i class="pe-7s-cart"></i>
                                            add to cart
                                        </a>
                                        <a class="wishlist" href="#" title="Wishlist">
                                            <i class="pe-7s-like"></i>
                                            Wishlist
                                        </a>
                                    </div>
                                </div>
                                <div class="shop-text-all">
                                    <div class="title-color fix">
                                        <div class="shop-title f-left">
                                            <h3><a href="#">Product Title</a></h3>
                                        </div>
                                        <div class="pro-color f-right">
                                            <ul>
                                                <li class="blue">b</li>
                                                <li class="orange">o</li>
                                                <li class="purple">p</li>
                                                <li class="pink">p</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="price-ratting fix">
                                        <span class="price f-left">
                                            <span class="new">$120.00</span>
                                        </span>
                                        <span class="ratting f-right">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                        </span>
                                    </div>
                                </div>                                  
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 grid-item mix3 mb-50">
                            <div class="single-shop">
                                <div class="shop-img">
                                    <a href="#"><img src="assets/img/shop/equal/6.jpg" alt="" /></a>
                                    <div class="shop-quick-view">
                                        <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                            <i class="pe-7s-look"></i>
                                        </a>
                                    </div>
                                    <div class="price-up-down">
                                        <span class="sale-new">new</span>
                                    </div>
                                    <div class="button-group">
                                        <a href="#" title="Add to Cart">
                                            <i class="pe-7s-cart"></i>
                                            add to cart
                                        </a>
                                        <a class="wishlist" href="#" title="Wishlist">
                                            <i class="pe-7s-like"></i>
                                            Wishlist
                                        </a>
                                    </div>
                                </div>
                                <div class="shop-text-all">
                                    <div class="title-color fix">
                                        <div class="shop-title f-left">
                                            <h3><a href="#">Product Title</a></h3>
                                        </div>
                                        <div class="pro-color f-right">
                                            <ul>
                                                <li class="blue">b</li>
                                                <li class="orange">o</li>
                                                <li class="purple">p</li>
                                                <li class="pink">p</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="price-ratting fix">
                                        <span class="price f-left">
                                            <span class="new">$120.00</span>
                                            <span class="old">$130.00</span>
                                        </span>
                                        <span class="ratting f-right">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                        </span>
                                    </div>
                                </div>                                  
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 grid-item mix2 mix3 mb-50">
                            <div class="single-shop">
                                <div class="shop-img">
                                    <a href="#"><img src="assets/img/shop/equal/7.jpg" alt="" /></a>
                                    <div class="shop-quick-view">
                                        <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                            <i class="pe-7s-look"></i>
                                        </a>
                                    </div>
                                    <div class="button-group">
                                        <a href="#" title="Add to Cart">
                                            <i class="pe-7s-cart"></i>
                                            add to cart
                                        </a>
                                        <a class="wishlist" href="#" title="Wishlist">
                                            <i class="pe-7s-like"></i>
                                            Wishlist
                                        </a>
                                    </div>
                                </div>
                                <div class="shop-text-all">
                                    <div class="title-color fix">
                                        <div class="shop-title f-left">
                                            <h3><a href="#">Product Title</a></h3>
                                        </div>
                                        <div class="pro-color f-right">
                                            <ul>
                                                <li class="blue">b</li>
                                                <li class="orange">o</li>
                                                <li class="purple">p</li>
                                                <li class="pink">p</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="price-ratting fix">
                                        <span class="price f-left">
                                            <span class="new">$150.00</span>
                                        </span>
                                        <span class="ratting f-right">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                        </span>
                                    </div>
                                </div>                                  
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 grid-item mix1 mix4 mb-50">
                            <div class="single-shop">
                                <div class="shop-img">
                                    <a href="#"><img src="assets/img/shop/equal/8.jpg" alt="" /></a>
                                    <div class="shop-quick-view">
                                        <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                            <i class="pe-7s-look"></i>
                                        </a>
                                    </div>
                                    <div class="price-up-down">
                                        <span class="sale-new">-50%</span>
                                    </div>
                                    <div class="button-group">
                                        <a href="#" title="Add to Cart">
                                            <i class="pe-7s-cart"></i>
                                            add to cart
                                        </a>
                                        <a class="wishlist" href="#" title="Wishlist">
                                            <i class="pe-7s-like"></i>
                                            Wishlist
                                        </a>
                                    </div>
                                </div>
                                <div class="shop-text-all">
                                    <div class="title-color fix">
                                        <div class="shop-title f-left">
                                            <h3><a href="#">Product Title</a></h3>
                                        </div>
                                        <div class="pro-color f-right">
                                            <ul>
                                                <li class="blue">b</li>
                                                <li class="orange">o</li>
                                                <li class="purple">p</li>
                                                <li class="pink">p</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="price-ratting fix">
                                        <span class="price f-left">
                                            <span class="new">$120.00</span>
                                            <span class="old">$110.00</span>
                                        </span>
                                        <span class="ratting f-right">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                        </span>
                                    </div>
                                </div>                                  
                            </div>
                        </div>
                    </div>      
                </div>
                <div class="view-more text-center">
                    <a class="button-hover" href="shop-page.html">view more <i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <!-- shop area end -->
        <div class="special-offer gray-bg ptb-100">
            <div class="container">
                <div class="section-title text-center mb-50">
                    <h2>special offer <i class="fa fa-shopping-cart"></i></h2>
                </div>
                <div class="row">
                    <div class="special-slider-active owl-carousel">
                        <div class="single-special-slider">
                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <div class="row">
                                    <div class="single-shop">
                                        <div class="col-md-12 col-lg-6 col-xs-12">
                                            <div class="shop-list-left">
                                                <div class="shop-img">
                                                    <a href="#"><img src="assets/img/shop/equal/13.jpg" alt="" /></a>
                                                    <div class="shop-quick-view">
                                                        <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                    <div class="price-up-down">
                                                        <span class="sale-new">sale</span>
                                                    </div>
                                                    <div class="button-group">
                                                        <a href="#" title="Add to Cart">
                                                            <i class="pe-7s-cart"></i>
                                                            add to cart
                                                        </a>
                                                        <a class="wishlist" href="#" title="Wishlist">
                                                            <i class="pe-7s-like"></i>
                                                            Wishlist
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6 col-xs-12">
                                            <div class="shop-list-right">
                                                <div class="shop-list-all">
                                                    <div class="shop-list-name">
                                                        <h3><a href="#">Product Title</a></h3>
                                                    </div>
                                                    <div class="shop-list-rating">
                                                        <div class="pro-color">
                                                            <ul>
                                                                <li class="blue">b</li>
                                                                <li class="orange">o</li>
                                                                <li class="purple">p</li>
                                                                <li class="pink">p</li>
                                                            </ul>
                                                        </div>
                                                        <span class="ratting">
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                        </span>
                                                    </div>
                                                    <div class="shop-list-price">
                                                        <span class="list-price">
                                                            <span class="new">$120.00</span>
                                                            <span class="old">$150.00</span>
                                                        </span>
                                                    </div>
                                                    <div class="special-pera">
                                                        <p>Lorem ipsum dolor sit amet, adipiscing elit. Nam fringilla augue nec est auctorfringilla augue nec est auctor.</p>
                                                    </div>
                                                    <div class="timer">
                                                        <div data-countdown="2018/01/01"></div>
                                                    </div>  
                                                </div>  
                                            </div>
                                        </div>                  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-special-slider">
                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <div class="row">
                                    <div class="single-shop">
                                        <div class="col-md-12 col-lg-6 col-xs-12">
                                            <div class="shop-list-left">
                                                <div class="shop-img">
                                                    <a href="#"><img src="assets/img/shop/equal/14.jpg" alt="" /></a>
                                                    <div class="shop-quick-view">
                                                        <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                    <div class="price-up-down">
                                                        <span class="sale-new">sale</span>
                                                    </div>
                                                    <div class="button-group">
                                                        <a href="#" title="Add to Cart">
                                                            <i class="pe-7s-cart"></i>
                                                            add to cart
                                                        </a>
                                                        <a class="wishlist" href="#" title="Wishlist">
                                                            <i class="pe-7s-like"></i>
                                                            Wishlist
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6 col-xs-12">
                                            <div class="shop-list-right">
                                                <div class="shop-list-all">
                                                    <div class="shop-list-name">
                                                        <h3><a href="#">Product Title</a></h3>
                                                    </div>
                                                    <div class="shop-list-rating">
                                                        <div class="pro-color">
                                                            <ul>
                                                                <li class="blue">b</li>
                                                                <li class="orange">o</li>
                                                                <li class="purple">p</li>
                                                                <li class="pink">p</li>
                                                            </ul>
                                                        </div>
                                                        <span class="ratting">
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                        </span>
                                                    </div>
                                                    <div class="shop-list-price">
                                                        <span class="list-price">
                                                            <span class="new">$120.00</span>
                                                            <span class="old">$150.00</span>
                                                        </span>
                                                    </div>
                                                    <div class="special-pera">
                                                        <p>Lorem ipsum dolor sit amet, adipiscing elit. Nam fringilla augue nec est auctorfringilla augue nec est auctor.</p>
                                                    </div>
                                                    <div class="timer">
                                                        <div data-countdown="2018/01/01"></div>
                                                    </div>  
                                                </div>  
                                            </div>
                                        </div>                  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-special-slider">
                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <div class="row">
                                    <div class="single-shop">
                                        <div class="col-md-12 col-lg-6 col-xs-12">
                                            <div class="shop-list-left">
                                                <div class="shop-img">
                                                    <a href="#"><img src="assets/img/shop/equal/15.jpg" alt="" /></a>
                                                    <div class="shop-quick-view">
                                                        <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                    <div class="price-up-down">
                                                        <span class="sale-new">sale</span>
                                                    </div>
                                                    <div class="button-group">
                                                        <a href="#" title="Add to Cart">
                                                            <i class="pe-7s-cart"></i>
                                                            add to cart
                                                        </a>
                                                        <a class="wishlist" href="#" title="Wishlist">
                                                            <i class="pe-7s-like"></i>
                                                            Wishlist
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6 col-xs-12">
                                            <div class="shop-list-right">
                                                <div class="shop-list-all">
                                                    <div class="shop-list-name">
                                                        <h3><a href="#">Product Title</a></h3>
                                                    </div>
                                                    <div class="shop-list-rating">
                                                        <div class="pro-color">
                                                            <ul>
                                                                <li class="blue">b</li>
                                                                <li class="orange">o</li>
                                                                <li class="purple">p</li>
                                                                <li class="pink">p</li>
                                                            </ul>
                                                        </div>
                                                        <span class="ratting">
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                        </span>
                                                    </div>
                                                    <div class="shop-list-price">
                                                        <span class="list-price">
                                                            <span class="new">$120.00</span>
                                                            <span class="old">$150.00</span>
                                                        </span>
                                                    </div>
                                                    <div class="special-pera">
                                                        <p>Lorem ipsum dolor sit amet, adipiscing elit. Nam fringilla augue nec est auctorfringilla augue nec est auctor.</p>
                                                    </div>
                                                    <div class="timer">
                                                        <div data-countdown="2018/01/01"></div>
                                                    </div>  
                                                </div>  
                                            </div>
                                        </div>                  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-special-slider">
                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <div class="row">
                                    <div class="single-shop">
                                        <div class="col-md-12 col-lg-6 col-xs-12">
                                            <div class="shop-list-left">
                                                <div class="shop-img">
                                                    <a href="#"><img src="assets/img/shop/equal/16.jpg" alt="" /></a>
                                                    <div class="shop-quick-view">
                                                        <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                    <div class="price-up-down">
                                                        <span class="sale-new">sale</span>
                                                    </div>
                                                    <div class="button-group">
                                                        <a href="#" title="Add to Cart">
                                                            <i class="pe-7s-cart"></i>
                                                            add to cart
                                                        </a>
                                                        <a class="wishlist" href="#" title="Wishlist">
                                                            <i class="pe-7s-like"></i>
                                                            Wishlist
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6 col-xs-12">
                                            <div class="shop-list-right">
                                                <div class="shop-list-all">
                                                    <div class="shop-list-name">
                                                        <h3><a href="#">Product Title</a></h3>
                                                    </div>
                                                    <div class="shop-list-rating">
                                                        <div class="pro-color">
                                                            <ul>
                                                                <li class="blue">b</li>
                                                                <li class="orange">o</li>
                                                                <li class="purple">p</li>
                                                                <li class="pink">p</li>
                                                            </ul>
                                                        </div>
                                                        <span class="ratting">
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                        </span>
                                                    </div>
                                                    <div class="shop-list-price">
                                                        <span class="list-price">
                                                            <span class="new">$120.00</span>
                                                            <span class="old">$150.00</span>
                                                        </span>
                                                    </div>
                                                    <div class="special-pera">
                                                        <p>Lorem ipsum dolor sit amet, adipiscing elit. Nam fringilla augue nec est auctorfringilla augue nec est auctor.</p>
                                                    </div>
                                                    <div class="timer">
                                                        <div data-countdown="2018/01/01"></div>
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
        <!-- blog area start -->
        <div class="blog-area pt-100 pb-70">
            <div class="container">
                <div class="section-title text-center mb-50">
                    <h2>latest news <i class="fa fa-pencil"></i></h2>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="blog-details mb-30">
                            <div class="blog-img">
                                <a href="blog-details.html"><img src="assets/img/blog/1.jpg" alt=""></a>
                                <div class="blog-quick-view">
                                    <a href="blog-details.html">
                                        <i class="pe-7s-link"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-meta">
                                <h4><a href="blog-details.html">Kid’s Fashion 2017</a></h4>
                                <ul class="meta">
                                    <li>
                                        By
                                        <a href="#">admin</a>
                                    </li>
                                    <li>25 june 2017</li>
                                </ul>
                                <p>Lorem Ipsum is that it has a more-or-less normal  of letters, as opposed to using 'Content here, distribution content here..</p>
                                <a href="blog-details.html">read more <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="blog-details mb-30">
                            <div class="blog-img">
                                <a href="blog-details.html"><img src="assets/img/blog/2.jpg" alt=""></a>
                                <div class="blog-quick-view">
                                    <a href="blog-details.html">
                                        <i class="pe-7s-link"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-meta">
                                <h4><a href="blog-details.html">Women’s Fashion 2017</a></h4>
                                <ul class="meta">
                                    <li>
                                        By
                                        <a href="#">admin</a>
                                    </li>
                                    <li>25 june 2017</li>
                                </ul>
                                <p>Lorem Ipsum is that it has a more-or-less normal  of letters, as opposed to using 'Content here, distribution content here..</p>
                                <a href="blog-details.html">read more <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 hidden-sm">
                        <div class="blog-details mb-30">
                            <div class="blog-img">
                                <a href="blog-details.html"><img src="assets/img/blog/3.jpg" alt=""></a>
                                <div class="blog-quick-view">
                                    <a href="blog-details.html">
                                        <i class="pe-7s-link"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-meta">
                                <h4><a href="blog-details.html">man’s Fashion 2017</a></h4>
                                <ul class="meta">
                                    <li>
                                        By
                                        <a href="#">admin</a>
                                    </li>
                                    <li>25 june 2017</li>
                                </ul>
                                <p>Lorem Ipsum is that it has a more-or-less normal  of letters, as opposed to using 'Content here, distribution content here..</p>
                                <a href="blog-details.html">read more <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog area end -->
        <!-- subscribe area start -->
        <div class="subscribe-area gray-bg">
            <div class="container">
                <div class="subscribe-bg ptb-80">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 ">
                            <div class="subscribe-from text-center">
                                <h3>subscribe to our newsletter</h3>
                                <form action="#">
                                    <input placeholder="Enter your Email address" type="email">
                                    <button type="submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection