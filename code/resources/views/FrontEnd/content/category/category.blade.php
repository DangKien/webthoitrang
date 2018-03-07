@extends('FrontEnd.layouts.default')
@section ('title', 'Sản phẩm')
@section ('myJs')
    
@endsection
@section ('content')
@include('FrontEnd.layouts.partial._breadcrumb')
<div class="text-center pt-20">
    <h2>{{ 'name' }}</h2>
</div>
<div class="shop-page-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="blog-sidebar">
                    <div class="single-sidebar">
                        <h3 class="sidebar-title">All</h3>
                        <?php 
                            $categories = App\Models\CategoryModel::listCategories();
                            showCategoriesLeft($categories);
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="blog-wrapper shop-page-mrg">
                    <div class="tab-menu-product">
                        <div class="tab-menu-sort">
                            <div class="tab-sort">
                                <label>Sort By : </label>
                                <select>
                                    <option value="">Position</option>
                                    <option value="">Popularity</option>
                                    <option value="">Price</option>
                                    <option value="">Average rating</option>
                                </select>
                            </div>
                        </div>
                        <div class="tab-product">
                            <div class="tab-content">
                                <div class="tab-pane active" id="grid"> 
                                    <div class="row">
                                        <?php 
                                            $productModel = new App\Models\ProductModel();
                                            $products     = $productModel->getProductCategory(3, 8);
                                        ?>
                                        @foreach ($products as $product)
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
                                        @endforeach
                                    </div>
                                </div>
                                <div class="page-pagination text-center">
                                    <ul>
                                        <li><a class="active" href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#"><i class="fa fa-angle-double-right"></i>
                                        </a></li>
                                    </ul>
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