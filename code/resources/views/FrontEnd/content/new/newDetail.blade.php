@extends('FrontEnd.layouts.default')
@section ('title', 'Chi tiết bài viết')
@section ('myJs')

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
            <li>
                <a href="{{ url('news') }}"> {{ 'name' }} </a>
            </li>
        </ol>
        <div class="text-center pt-20">
            <h2>{{ $new->title }}</h2>
        </div>
        <div class="blog-sidebar-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-9">
                        <div class="blog-wrapper">
                            <div class="single-blog">
                                <a href="#"><img style="height: 489px; width: 870px;" src="{{ url('') }}/{!! $new->image !!}" alt=""></a>
                                <div class="blog-details-text mt-20">
                                    <h3>{{ $new->title }}</h3>
                                    <div class="post-info">
                                        <ul>
                                            <li>
                                                <i class="fa fa-user"></i>
                                                {{ $new->user->first_name." ".$new->user->last_name }}
                                            </li>
                                            <li>
                                                <i class="fa fa-calendar"></i>
                                                 {{ $new->created_at }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div>
                                        {!! $new->excerpt !!}
                                    </div>
                                    <br>
                                    <br>
                                    <div>
                                        {!! $new->content !!}
                                    </div>
                                </div>
                                <div class="news-details-bottom mtb-60">
                                    <h3 class="leave-comment-text">Bình luận</h3>
                                    <div class="blog-top">
                                        <div class="news-allreply">
                                            <a href="#"><img src="" alt=""></a>
                                        </div>
                                        <div class="blog-img-details">
                                            <div class="blog-title">
                                                <div class="blog-title-1">
                                                    <h3>kavin smith</h3>
                                                    <span>14 february, 2017 at 7 : 00 pm</span>
                                                </div>
                                            </div>
                                            <p class="p-border">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore i aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo cons. Duis aute irure dolor in reprehenderit in </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="leave-comment">
                                    <h3 class="leave-comment-text">Viết bình luận</h3>
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="leave-form">
                                                    <input placeholder="Name*" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="leave-form">
                                                    <input placeholder="Email*" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="text-leave">
                                                    <textarea placeholder="Comment*"></textarea>
                                                    <button class="submit" type="submit">Gửi bình luận</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div class="blog-sidebar mrg-for-sm-top">
                            <div class="single-sidebar">
                                <div class="single-sidebar">
                                    <h3 class="sidebar-title">Tất cả</h3>
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
                            <div class="single-sidebar">
                                <h3 class="sidebar-title">Bài viết liên quan</h3>
                                <div class="recent-all">
                                    @foreach ($news as $key => $new) 
                                        <div class="recent-img-text mb-20">
                                            <div class="recent-img">
                                                <a href="#"><img style="height: 80px; width: 80px" src="{{ url('') }}/{!! $new->image !!}" alt=""></a>
                                            </div>
                                            <div class="recent-text">
                                                <h4>
                                                    <a href="#">{!! \Illuminate\Support\Str::words($new->title, 3,'....')  !!}</a>
                                                </h4>
                                                <div class="post-info">
                                                    <ul>
                                                        <li>
                                                            <i class="fa fa-calendar"></i>
                                                            {{ \Carbon\Carbon::parse($new->created_at)->format('d/m/Y')}}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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