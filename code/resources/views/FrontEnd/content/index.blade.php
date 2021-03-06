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
                <?php $products_new  = App\Models\ProductModel::getProductNew(8);   ?>
                <div class="row">
                    <div class="product-curosel product-curosel-style owl-carousel">
                        @foreach($products_new as $product)
                            @if (count($product->details) != 0)
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="single-shop">
                                        <div class="shop-img">
                                            <a href="{{ url('product', $product->slug) }}"><img src="{{ url('images/main_prodcut') }}/{{ $product->url_image }}" alt="" /></a>
                                            <div class="price-up-down">
                                                @if ($product->cate_sale != 0) 
                                                    @if ($product->cate_sale == 1) 
                                                        <span class="sale-new" title="{{ $product->cate_sales->name }} {{ $product->sale_description }}"">
                                                        {{ $product->cate_sales->name }} - {!! \Illuminate\Support\Str::words($product->sale_description, 3,'....')  !!}
                                                    @elseif ($product->cate_sale == 2)
                                                        <span class="sale-new" title="Mới">
                                                            Tặng kèm
                                                        </span>
                                                    @endif
                                                </span>
                                                @else 
                                                    <span class="sale-new" title="Mới">
                                                        Mới
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

            <div class="product-type">
                <div class="shop-menu text-left mb-50">
                <button><h3><b>Sản phẩm giảm giá</b></h3></button>
                </div>
                <?php $products_sale = App\Models\ProductModel::getProductSale(config('fashion.promotion.sale'), 8); ?>
                <div class="row">
                    <div class="product-curosel product-curosel-style owl-carousel">
                        @foreach($products_sale as $product)
                            @if (count($product->details) != 0)

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="single-shop">
                                        <div class="shop-img">
                                            <a href="{{ url('product') }}/{{ $product->slug }}"><img src="{{ url('images/main_prodcut') }}/{{ $product->url_image }}" alt="" /></a>
                                            <div class="price-up-down">
                                               @if ($product->cate_sale != 0) 
                                                    @if ($product->cate_sale == 1) 
                                                    <span class="sale-new" title="{{ $product->cate_sales->name }} {{ $product->sale_description }}"">
                                                    {{ $product->cate_sales->name }} - {!! \Illuminate\Support\Str::words($product->sale_description, 3,'....')  !!}
                                                    @else if ($product->cate_sale == 2)
                                                        <span class="sale-new" title="Mới">
                                                            Tặng kèm
                                                        </span>
                                                    @endif
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
    
    @php
        $news = App\Models\News::news();
    @endphp
    <div class="blog-area pt-70 pb-70">
        <div class="container">
            <div class="section-title text-center mb-50">
                <h2> Tin tức thời trang <i class="fa fa-pencil"></i></h2>
            </div>
            <div class="row">
                @foreach ($news as $new)
                <div class="col-md-4 col-sm-6">
                    <div class="blog-details mb-30">
                        <div class="blog-img" style="height: 250px; overflow: hidden;">
                            <a href="{{ url('news') }}/{{ $new->slug }}">
                                <img ng-src="{{ $new->image }}" alt="{{ $new->title }}"></a>
                            <div class="blog-quick-view">
                                <a href="blog-details.html">
                                    <i class="pe-7s-link"></i>
                                </a>
                            </div>
                        </div>
                        <div class="blog-meta" style="height: 250px">
                            <h4><a href="{{ url('news') }}/@{{ new.slug }}">
                                {{ $new->title }}
                            </a></h4>
                            <ul class="meta">
                                <li>Người viết bài: <a href="#">{{ $new->user->first_name . " " . $new->user->last_name}} </a>
                                </li>
                                <li>Đăng bài ngày: {{ $new->created_at }}</li>
                            </ul>
                            <div style="height: 50px; overflow: hidden; margin-top: 20px" > 
                                <p>{{ $new->excerpt }}</p>
                            </div>
                            <a href="{{ url('news', $new->slug ) }}">Đọc thêm<i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
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
                            <h3>Đăng kí Email để nhận thông tin giảm giá mới nhất</h3>
                            <form action="#">
                                <input placeholder="Nhập email của bạn" type="email">
                                <button type="submit">Đăng kí</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection