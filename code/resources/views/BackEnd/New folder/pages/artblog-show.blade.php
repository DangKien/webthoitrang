@extends('layouts.master')
@section('title', $post->title)

@section('content')

<div class="artblog-show-section">
  <div class="container">
    <div class="col-xs-12">
      <div class="flex-box flex-center flex-content-center" id="title-container">
        <h1 class="page-title">Artblog</h1>
        <div class="title-cross"></div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="col-xs-12">
      <div class="artblog-content">
        <h1>{!! $post->title !!}</h1>
        <div class="content-info">
          <p>{!! $post->categories->first()->name !!}</p>
          <p>{!! date('M d', strtotime($post->updated_at)) !!}</p>
        </div>
        <div class="content-detail">
          {!! nl2br(e($post->content)) !!}
        </div>
      </div>
    </div>
  </div>

  <div class="container" >
    <div class="col-xs-12">
      <div class="flex-box flex-center flex-content-left" id="title-container">
        <h1 class="page-title related-articles-title">Related articles</h1>
        <div class="title-cross"></div>
      </div>
    </div>
  </div>

  <div class="container related-articles">
    @foreach($post_relateds as $post)
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="box-item small-box-item">
          <div class="item-image">
            <a href="{!! route('artblog.show', $post->slug) !!}">
              <img class="img-responsive" src="{{ asset('assets/images/artblog/artblog-item-mask.png') }}" style="background-image: url( {!! $post->image !!} );">
            </a>
          </div>
          <div class="item-description">
            <div class="description-content">
              <div class="content-fix-height">
                <h3>
                  <a href="{!! route('artblog.show', $post->slug) !!}">{!! $post->title !!}</a>
                </h3>
                <p class="main-description">{!! nl2br(e(str_limit($post->content, 200))) !!}</p>
              </div>
              <p>{!! $post->categories->first()->name !!}</p>
              <p>{!! date('M d', strtotime($post->updated_at)) !!}</p>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection