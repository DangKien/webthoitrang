@extends('layouts.master') @section('content')
<div class="artist-products-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <div class="sidebar-nav">
                    <div class="navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <span class="visible-xs navbar-brand">Sidebar menu</span>
                        </div>
                        <div class="navbar-collapse collapse sidebar-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="active">
                                    <a href="#">Profile</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-md-9">
                <div class="content content-artist-products">
                    <div class="clearfix products-wrap">
                        @for ($i = 0; $i < 11; $i++)
                            <div class="product">
                                <div class="entry-thumbnail">
                                    <a href="#" class="entry-thumbnail-link">
                                        <img src="{!! asset('assets/images/1x1.png') !!}" alt="Product thumbnail" style="background-image: url(/assets/images/demo/products/demo1.jpg)">
                                    </a>
                                </div>
                                <div class="entry-content clearfix">
                                    <div class="heart">
                                        <span><i class="fa fa-heart-o"></i></span>
                                        <span>35</span>
                                    </div>
                                    <div class="col-left-heart">
                                        <div class="col-left">
                                            <h2 class="entry-title">
                                                <a href="#">
                                                Consequatur accusantium voluptatem cumque numquam quidem sunt sit consequatur.
                                                </a>
                                            </h2>
                                            <span class="entry-author">
                                                <a href="#">Sidney White</a>
                                            </span>
                                        </div>
                                        <div class="col-right">
                                            <span class="entry-price-text">Available</span>
                                            <span class="entry-price">$2778</span>
                                        </div>
                                    </div>
                                    <div class="entry-excerpt">
                                        Oil | 1416x2171 cm
                                    </div>
                                </div>
                            </div>

                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection