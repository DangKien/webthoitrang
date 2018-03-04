@extends('FrontEnd.layouts.default')
@section ('title', 'Trang chủ')
@section ('myJs')
    
@endsection
@section ('content')
@includeif ('FrontEnd.layouts.partial._slideshow')
    <!-- shop area start -->
    <div class="home-product-area ptb-100">
        <div class="container">

            <div class="product-type">
                <div class="shop-menu text-left mb-50">
                <button><h3><b>Sản phẩm mới</b></h3></button>
                </div>
                <?php 
                    $productModel = new App\Models\ProductModel();
                    $products     = $productModel->getProductCategory(3, 8);
                ?>
                <div class="row">
                    <div class="product-curosel product-curosel-style owl-carousel">
                        @foreach($products as $product)
                            @if (count($product->details) != 0)
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="single-shop">
                                        <div class="shop-img">
                                            <a href="#"><img src="{{ url('../storage/app') }}/{{ $product->url_image }}" alt="" /></a>
                                            <div class="price-up-down">
                                                <span class="sale-new">
                                                    New
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
                                                    <h3><a href="#" title="{{ $product->name }}">
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
                                                    <span class="new">{{ $product->details[0]->price }} Vnđ</span>
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

            <div class="product-type">
                <div class="shop-menu text-left mb-50">
                <button><h3><b>Sản phẩm giảm giá</b></h3></button>
                </div>
                <?php 
                    $productModel = new App\Models\ProductModel();
                    $products     = $productModel->getProductCategory(3, 8);
                ?>
                <div class="row">
                    <div class="product-curosel product-curosel-style owl-carousel">
                        @foreach($products as $product)
                            @if (count($product->details) != 0)
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="single-shop">
                                        <div class="shop-img">
                                            <a href="#"><img src="{{ url('../storage/app') }}/{{ $product->url_image }}" alt="" /></a>
                                            <div class="price-up-down">
                                                <span class="sale-new">
                                                    New
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
                                                    <h3><a href="#" title="{{ $product->name }}">
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
                                                    <span class="new">{{ $product->details[0]->price }} Vnđ</span>
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

            <div class="product-type">
                <div class="shop-menu text-left mb-50">
                <button><h3><b>Sản phẩm nổi bật</b></h3></button>
                </div>
                <?php 
                    $productModel = new App\Models\ProductModel();
                    $products     = $productModel->getProductCategory(3, 8);
                ?>
                <div class="row">
                    <div class="product-curosel product-curosel-style owl-carousel">
                        @foreach($products as $product)
                            @if (count($product->details) != 0)
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="single-shop">
                                        <div class="shop-img">
                                            <a href="#"><img src="{{ url('../storage/app') }}/{{ $product->url_image }}" alt="" /></a>
                                            <div class="price-up-down">
                                                <span class="sale-new">
                                                    New
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
                                                    <h3><a href="#" title="{{ $product->name }}">
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
                                                    <span class="new">{{ $product->details[0]->price }} Vnđ</span>
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

    <div class="service-area pt-100 pb-70 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 mb-30">
                        <div class="single-service">
                            <div class="service-icon">
                                <i class="pe-7s-plane"></i>
                            </div>
                            <div class="service-text">
                                <h3>Miễn phí vận chuyển</h3>
                                <p>Giao hàng trong 3 ngày</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 mb-30">
                        <div class="single-service">
                            <div class="service-icon">
                                <i class="pe-7s-back"></i>
                            </div>
                            <div class="service-text">
                                <h3>Hoàn 100% tiền</h3>
                                <p>Đổi trả hàng trong vòng 30 ngày</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 mb-30">
                        <div class="single-service">
                            <div class="service-icon">
                                <i class="pe-7s-headphones"></i>
                            </div>
                            <div class="service-text">
                                <h3>Hỗ trợ trực tuyến</h3>
                                <p>Hỗ trợ 24/7: 01659901941</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- service area end -->
    <!-- blog area end -->
    <!-- subscribe area start -->
    <div class="subscribe-area gray-bg clearfix">
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