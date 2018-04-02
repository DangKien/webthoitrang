@extends('FrontEnd.layouts.default')
@section ('title', 'Tìm kiếm sản phẩm')
@section ('myJs')
    <script>
        var freeText = '@if (isset($freeText)) {{ $freeText }} @endif';
    </script>

    <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
    <script src="{{ url('js/ctrl/frontend') }}/searchCtrl.js"></script>
    <script src="{{ url('/js/factory/services/frontend') }}/searchService.js"></script>
@endsection
@section ('content')
@include('FrontEnd.layouts.partial._breadcrumb')
<div class="shop-page-area ptb-10" ng-controller="searchCtrl">
    <div class="container">
        <div class="text-center pt-20">
            <h2>Tìm kiếm sản phẩm</h2>
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
            <div class="col-md-9" infinite-scroll='data.loadMore()' infinite-scroll-distance='2'>
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
                                        Giá sản phẩm(Tăng dần)
                                    </option>
                                    <option value="priceDown">
                                        Giá sản phẩm(Giảm dần)
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="tab-product">
                            <div class="tab-content">
                                <div class="tab-pane active" id="grid">
                                    <form class="form-horizontal">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Tên sản phẩm</label>
                                                <div class="col-sm-8">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="Tên sản phẩm">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-4 control-label">Giá sản phẩm</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Giá sản phẩm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Tên sản phẩm</label>
                                                <div class="col-sm-8">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="Tên sản phẩm">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-4 control-label">Giá sản phẩm</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Giá sản phẩm">
                                                </div>
                                            </div>
                                        </div>
                                    </form> 
                                    <div class="row">
                                        <div ng-repeat="(key, value) in data.categories">
                                            <div class="col-md-6 col-lg-4 col-sm-6"  ng-repeat="(key, products) in value | orderObjectBy: 'propertyName':reverse">
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
                            <div class="clearfix"></div>
                            <!-- <div class="row text-center page-pagination mt-50">
                               <div class="">
                                   <div paging
                                       page          ="data.pageCategory.current_page"
                                       page-size     ="data.pageCategory.per_page"
                                       total         ="data.pageCategory.total"
                                       paging-action ="data.changePage(page)">
                                   </div>
                               </div>
                            </div>  --> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection