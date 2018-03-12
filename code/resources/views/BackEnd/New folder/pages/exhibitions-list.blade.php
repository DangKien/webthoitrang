@extends('layouts.master') @section('content')
<div class="exhibitions-list-section">
  <div class="container">
    <div class="col-xs-12">
      <div class="flex-box flex-center flex-content-center" id="title-container">
        <h1 class="page-title">List of Exhibitions</h1>
        <div class="title-cross"></div>
      </div>
    </div>
  </div>

  <div class="container primary-gallery">
    @foreach($exhibitions as $exhibition)
    @if($loop->index > 1)
      @break
    @endif
    <div class="col-xs-12 col-sm-6">
      <div class="box-item large-box-item">
        <div class="item-image">
          <a href="{!! route('exhibitions.show', $exhibition->slug) !!}">
            <img class="img-responsive" src="{{ asset('assets/images/exhibitions/exhibitions-large-mask.png') }}" style="background-image: url( {!! $exhibition->image !!} );">
          </a>
        </div>
        <div class="item-description">
          <div class="description-content">
            <h3>
              <a href="{!! route('exhibitions.show', $exhibition->slug) !!}">{!! $exhibition->title !!}</a>
            </h3>
            <p>{!! $exhibition->address !!}, {!! $exhibition->time_event !!}</p>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <div class="container secondary-gallery">
    @foreach($exhibitions as $exhibition)
    @if($loop->index <= 1)
      @continue
    @endif
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="box-item small-box-item">
          <div class="item-image">
            <a href="{!! route('exhibitions.show', $exhibition->slug) !!}">
              <img class="img-responsive" src="{{ asset('assets/images/exhibitions/exhibitions-small-mask.png') }}" style="background-image: url( {!! $exhibition->image !!} );">
            </a>
          </div>
          <div class="item-description">
            <div class="description-content">
              <h3>
                <a href="{!! route('exhibitions.show', $exhibition->slug) !!}">{!! $exhibition->title !!}</a>
              </h3>
              <p>{!! $exhibition->address !!}, {!! $exhibition->time_event !!}</p>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="container">
    <div class="col-xs-12">
      <div class="pagination-wrap">
        {!! $exhibitions->links() !!}
      </div>
    </div>
  </div>
</div>
@endsection