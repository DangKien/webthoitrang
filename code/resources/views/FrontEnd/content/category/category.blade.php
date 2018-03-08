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
            <h2>@if (isset($slug)) {{ $slug }} @endif</h2>
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
            <div class="col-md-9">
                <div class="blog-wrapper shop-page-mrg">
                    <div class="tab-menu-product">
                        <div class="tab-menu-sort">
                            <div class="tab-sort">
                                <label>Sắp xếp : </label>
                                <select>
                                    <option value="">Giá sản phẩm(Tăng dần)</option>
                                    <option value="">Giá sản phẩm(Giảm dần)<i class="fas fa-sort-amount-up"></i></option>
                                </select>
                            </div>
                        </div>
                        <div class="tab-product">
                            <div class="tab-content">
                                <div class="tab-pane active" id="grid"> 
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                            <div class="single-shop">
                                                <div class="shop-img">
                                                    <a href="#"><img src="{{ url('../storage/app') }}/images/main_prodcut/8FopHqduvY509gj3eV338mBbozvkg7XUgBpMyurS.jpeg" alt=""/></a>
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
                                                            <h3><a href="#" title="">
                                                            </a></h3>
                                                        </div>
                                                        <div class="pro-color f-right">
                                                            <ul>
                                                               <li style="">b</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="price-ratting fix">
                                                        <span class="price f-left">
                                                            <span class="new"> Vnđ</span>
                                                        </span>
                                                        <span class="ratting f-right">
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </span>
                                                    </div>
                                                </div>                                  
                                            </div>
                                        </div>
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