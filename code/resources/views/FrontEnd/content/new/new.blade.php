@extends('FrontEnd.layouts.default')
@section ('title', 'Tin tức thời trang')
@section ('myJs')
    <script src="{{ url('js/ctrl/frontend') }}/newCtrl.js"></script>
    <script src="{{ url('/js/factory/services/frontend') }}/newService.js"></script>
@endsection
@section ('content')

<div class="shop-page-area ptb-10" ng-controller="newCtrl">
    <div class="container">
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home') }}">
                    <i class="fa fa-home"></i>
                 Trang chủ</a>
            </li>
            <li>
                <a href="{{ url('news') }}"> Tin tức thời trang </a>
            </li>
        </ol>
        <div class="text-center pt-20">
            <h2>Tin tức thời trang</h2>
        </div>
        <div class="row">
            <div class="blog-fullwidth-area pt-100 pb-70">
            <div class="container">
                <div class="row" infinite-scroll='data.loadMore()' infinite-scroll-distance='0'>
                    <div  ng-repeat="(key, value) in data.news">
                        <div class="col-md-4 col-sm-6" ng-repeat="(key, new) in value">
                            <div class="blog-details mb-30">
                                <div class="blog-img" style="height: 250px; overflow: hidden;">
                                    <a href="{{ url('news') }}/@{{ new.slug }}">
                                        <img ng-src="@{{ new.image }}" alt="@{{ new.title }}"></a>
                                    <div class="blog-quick-view">
                                        <a href="blog-details.html">
                                            <i class="pe-7s-link"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="blog-meta" style="height: 250px">
                                    <h4><a href="{{ url('news') }}/@{{ new.slug }}">
                                        @{{ new.title }}
                                    </a></h4>
                                    <ul class="meta">
                                        <li>Người viết bài: <a href="#">@{{ new.user.first_name + " " +  new.user.last_name}} </a>
                                        </li>
                                        <li>Đăng bài ngày: @{{ new.created_at }}</li>
                                    </ul>
                                    <div style="height: 50px; overflow: hidden; margin-top: 20px" > 
                                        <p>@{{ new.excerpt}}</p>
                                    </div>
                                    <a href="{{ url('news') }}/@{{ new.slug }}">Đọc thêm<i class="fa fa-long-arrow-right"></i></a>
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