@extends('layouts.master') 

@section('content')
<div class="artblog-section">
  <div class="container">
    <div class="col-xs-12">
      <div class="flex-box flex-center flex-content-center" id="title-container">
        <h1 class="page-title">Artblog</h1>
        <div class="title-cross"></div>
      </div>
    </div>
  </div>

  <div class="container primary-gallery">
    @foreach($posts as $post)
      @if($loop->first)
      <div class="box-item large-box-item">
        <div class="col-xs-12 col-md-8 img-wrapper">
          <div class="item-image">
            <a href="{!! route('artblog.show', $post->slug) !!}">
              <img class="img-responsive" src="{{ asset('assets/images/artblog/artblog-primary-mask.png') }}" style="background-image: url( {{ $post->image }} );">
            </a>
          </div>
        </div>
        <div class="col-xs-12 col-md-4 description-wrapper">
          <div class="item-description">
            <div class="description-content">
              <h3>
                <a href="{!! route('artblog.show', $post->slug) !!}">{!! $post->title !!}</a>
              </h3>
              <p class="main-description">{!! nl2br(e(str_limit($post->content, 200))) !!}</p>
              <p>{!! $post->categories->first()->name !!}</p>
              <p>{!! date('M d', strtotime($post->updated_at)) !!}</p>
            </div>
          </div>
        </div>
      </div>
      @endif
    @endforeach

  </div>

  <div class="container secondary-gallery">
    @foreach($posts as $post)
      @if(!$loop->first)
    <div class="col-xs-12 col-sm-6 col-md-4">
      <div class="box-item small-box-item">
        <div class="item-image">
          <a href="{!! route('artblog.show', $post->slug) !!}">
            <img class="img-responsive" src="{{ asset('assets/images/artblog/artblog-item-mask.png') }}" style="background-image: url( {{ $post->image }} );">
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
      @endif
    @endforeach
  </div>

  <div class="container">
    <div class="col-xs-12">
      <div class="pagination-wrap">
        {!! $posts->links() !!}
      </div>
    </div>
  </div>
</div>
@endsection