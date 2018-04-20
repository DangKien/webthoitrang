@extends('FrontEnd.layouts.default')
@section ('title', 'Sản phẩm')
@section ('myJs')
    <script>
        var slug = '@if (isset($slug)) {{ $slug }} @endif';
    </script>
    <script src="{{ url('js/ctrl/frontend') }}/categoryCtrl.js"></script>
    <script src="{{ url('/js/factory/services/frontend') }}/categoryService.js"></script>
@endsection
@section ('content')
@include('FrontEnd.layouts.partial._breadcrumb')
<div class="shop-page-area ptb-10" ng-controller="categoryCtrl">
    <div class="container">
        <div class="text-center pt-20">
            <h2>@if (isset($slug)) {{ $name->name }} @endif</h2>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="blog-sidebar">
                    <div class="single-sidebar">
                        <h3 class="sidebar-title">All</h3>
                        <?php 
                            $slug_c = '';
                            if (isset($slug)) {
                                $slug_c = $slug;
                            }
                            $categories = App\Models\CategoryModel::listCategories();
                            showCategoriesLeft($categories, $slug_c);
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-9" infinite-scroll='data.loadMore()' infinite-scroll-distance='0'>
                <div class="blog-wrapper shop-page-mrg">
                    <div class="tab-menu-product">
                        <div class="tab-menu-sort">
                            <div class="tab-sort">
                                <label>Sắp xếp : </label>
                                <select ng-change="actions.productSort(data.sortBy)"
                                    ng-model="data.sortBy"
                                >
                                    <option value="">
                                        Sắp xếp theo
                                    </option>
                                    <option value="priceUp">
                                        Giá sản phẩm(Giảm dần)
                                    </option>
                                    <option value="priceDown">
                                        Giá sản phẩm(Tăng dần)
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="tab-product">
                            <div class="tab-content">
                                <div class="tab-pane active" id="grid"> 
                                    <div class="row">
                                        <div ng-repeat="(key, value) in data.categories">
                                            <div style="margin-top: 15px;" class="col-md-6 col-lg-4 col-sm-6"  ng-repeat="(key, products) in  value| orderObjectBy: 'propertyName':reverse">
                                            <div class="single-shop">
                                                <div class="shop-img">
                                                    <a href="{{ url('product') }}/@{{ products.slug }}"><img ng-src="{{ url('images/main_prodcut') }}/@{{ products.url_image }}" alt=""/></a>
                                                    <div class="price-up-down">
                                                        <span class="sale-new" ng-if="products.cate_sale != 0">
                                                         @{{ products.cate_sales.name }} - @{{ products.sale_description }}
                                                        </span>

                                                        <span class="sale-new" ng-if="products.cate_sale == 0">
                                                            Mới
                                                        </span>
                                                    </div>
                                                    <div style="cursor: pointer;" class="button-group" ng-click="actions.addCart(products.id)">
                                                        <a  title="Add to Cart">
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
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection