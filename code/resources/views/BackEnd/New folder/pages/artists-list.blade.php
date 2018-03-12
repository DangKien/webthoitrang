@extends('layouts.master') @section('content')
<div class="artists-list-section">
  <div class="container">
    <div class="col-xs-12">
      <div class="flex-box flex-center flex-content-center" id="title-container">
        <h1 class="page-title">Artist</h1>
        <div class="title-cross"></div>
      </div>
    </div>
  </div>
 
  <div class="container">
    <div class="col-xs-12 col-md-4 search-tab">
      <form action="{!! route('artist.index') !!}" method="get" accept-charset="utf-8">
        <div class="input-group">
          <input type="text" name="search" class="form-control" value="{{ $search or old('search') }}">
          <span class="input-group-btn">
              <button class="btn" type="submit">Search artists</button>
          </span>
        </div>
      </form>
    </div>
  </div>

  <div class="container secondary-gallery">
    @foreach($artists as $artist)
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="box-item small-box-item">
          <div class="item-image">
            <a href="{!! route('artist.show', $artist->id) !!}">
              <img class="img-responsive" src="{{ asset('assets/images/1x1.png') }}" style="background-image: url( {!! $artist->avatar !!} );">
            </a>
          </div>
          <div class="item-description">
            <div class="description-content">
              <h3>
                <a href="{!! route('artist.show', $artist->id) !!}">{!! $artist->name !!}</a>
              </h3>
              <p>{!! $artist->product_count !!} Painting</p>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="container">
    <div class="col-xs-12">
      <div class="pagination-wrap">
        {{ $artists->links() }}
      </div>
    </div>
  </div>
</div>
@endsection