@extends('layouts.master') @section('content')
<div class="exhibitions-show-section">
  <div class="container">
    <div class="col-xs-12">
      <div class="flex-box flex-center flex-content-left" id="title-container">
        <h1 class="page-title">The Nature of Things</h1>
        <div class="title-cross"></div>
      </div>
    </div>
  </div>
  <div class="container description-section">
    <div class="col-xs-12 col-sm-8 exhibition-description">
      <p>{!! nl2br(e(str_limit($exhibition->description, 220))) !!}</p>
    </div>
    <div class="col-xs-12 col-sm-3 col-sm-offset-1 exhibition-info">
      <p>{!! $exhibition->address !!}</p>
      <p>{!! $exhibition->time_event !!}</p>
    </div>
  </div>

  <div class="container">
    <ul class="nav nav-pills">
      <li role="presentation" class="active">
        <a data-toggle="pill" href="#artists">Artist</a>
      </li>
      <li role="presentation">
        <a data-toggle="pill" href="#intro">Introduction</a>
      </li>
      <li role="presentation">
        <a data-toggle="pill" href="#time">Time/Place</a>
      </li>
      <li role="presentation">
        <a data-toggle="pill" href="#activities">Activities</a>
      </li>
    </ul>
  </div>

  <div class="tab-content">
    <div id="artists" class="container gallery tab-pane fade in active">
      @foreach($users as $user)
        <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="box-item small-box-item">
            <div class="item-image">
              <a href="{!! route('exhibitions.show.artist', [$exhibition->slug, $user->id]) !!}">
                <img class="img-responsive" src="{{ asset('assets/images/exhibitions/exhibitions-small-mask.png') }}" style="background-image: url( {!! $user->avatar !!} );">
              </a>
            </div>
            <div class="item-description">
              <div class="description-content">
                <h3>
                  <a href="{!! route('exhibitions.show.artist', [$exhibition->slug, $user->id]) !!}">{!! $user->name !!}</a>
                </h3>
                <p>{!! $user->product_count !!} Painting</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
    <div id="intro" class="container gallery tab-pane fade">
      <div class="col-sm-12">
        {!! nl2br(e($exhibition->description)) !!}
      </div>
    </div>
    <div id="intro" class="container gallery tab-pane fade">{!! nl2br(e($exhibition->description)) !!}</div>
    <div id="time" class="container gallery tab-pane fade">
      <div class="col-sm-12">
        <p>{!! $exhibition->address !!}</p>
        <p>{!! $exhibition->time_event !!}</p>
      </div>
    </div>
    <div id="activities" class="container gallery tab-pane fade">
      <div class="col-sm-12"></div>
    </div>
  </div>
</div>
@endsection