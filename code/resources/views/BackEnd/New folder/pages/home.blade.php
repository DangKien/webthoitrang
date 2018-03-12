@extends('layouts.master')

@section('content')
<div class="page home-page">
	<div class="container-fluid slider-container">
		<div class="row">
			<div id="bottom-slider" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<div class="item active">
						<div class="home-page--header" style="background-image: url( {{ asset('assets/images/home_slider_img/4.jpg') }} )">
							<h1>{!! ucwords('Live with art <br/> is good for you') !!}</h1>
						</div>
					</div>
					<div class="item">
						<div class="home-page--header" style="background-image: url( {{ asset('assets/images/home_slider_img/5.jpg') }} )">
							<h1>{!! ucwords('Art that fits <br/> my style and my space') !!}</h1>
						</div>
					</div>
					<div class="item">
						<div class="home-page--header" style="background-image: url( {{ asset('assets/images/home_slider_img/20.jpg') }} )">
							<h1>{!! ucwords('Original works, <br/> priced for every space') !!}</h1>
						</div>
					</div>
					<div class="item">
						<div class="home-page--header" style="background-image: url( {{ asset('assets/images/home_slider_img/sen.jpg') }} )">
							<h1>{!! ucwords('Build your love space <br/> with art') !!}</h1>
						</div>
					</div>
					<div class="submit-btn">
						<a href="{{ route('product.index') }}" class="vc-btn vc-btn--zoom">Shop now</a>
					</div>
				</div>

				<a class="left carousel-control" href="#bottom-slider" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#bottom-slider" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row home-page--product">
			<h3 class="page-title"><span>Original Works</span></h1>
			<div class="clearfix">
				@foreach($products as $product)
					@include('share.product', compact('product'))
				@endforeach
			</div>
		</div>

		<div class="row home-page--artist">
			<h3 class="page-title"><span>Favorite Artists</span></h1>
			<div class="clearfix">

				@foreach($artists as $artist)
				<div class="artist">
					<div class="wrap">
						<div class="entry-thumbnail">
							<a href="{!! route('artist.show', $artist->id) !!}" class="entry-thumbnail-link">
								<img src="{!! asset('assets/images/1x1.png') !!}" alt="Product thumbnail" style="background-image: url({!! asset('assets/images/product.jpg') !!})">
							</a>
						</div>
						<div class="entry-content clearfix">
							<h2 class="entry-name"><a href="{!! route('artist.show', $artist->id) !!}">{!! $artist->name !!}</a></h2>
							<p class="entry-count">{!! $artist->products->count() !!} Painting</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		<div class="row home-page--exau">
			<h3 class="page-title"><span>Exhibitions and Auctions</span></h1>
			<div class="clearfix">
				@foreach($exhibitions as $exhibition)
				<div class="exau">
					<div class="wrap">
						<div class="entry-thumbnail">
							<a href="{!! route('exhibitions.show', $exhibition->slug) !!}" class="entry-thumbnail-link">
								<img src="{!! asset('assets/images/1x1.png') !!}" alt="Product thumbnail" style="background-image: url({!! $exhibition->image !!})">
							</a>
						</div>
						<div class="entry-content clearfix">
							<h2 class="entry-title"><a href="{!! route('exhibitions.show', $exhibition->slug) !!}">{!! $exhibition->title !!}</a></h2>
							<p class="entry-date">{!! $exhibition->time_event !!}</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		<div class="row home-page--blog">
			<h3 class="page-title"><span>Art Blog</span></h1>
			<div class="clearfix">
				@foreach($posts as $post)
				<div class="blog">
					<div class="wrap clearfix">
						<div class="entry-thumbnail">
							<a href="{!! route('artblog.show', $post->slug) !!}" class="entry-thumbnail-link">
								<img src="{!! asset('assets/images/270x200.png') !!}" alt="Product thumbnail" style="background-image: url({!! $post->image !!})">
							</a>
						</div>
						<div class="entry-content clearfix">
							<h2 class="entry-title"><a href="{!! route('artblog.show', $post->slug) !!}">{!! $post->title !!}</a></h2>
							<p class="entry-author">by {!! $post->user->last_name !!} {!! $post->user->first_name !!}</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		<div class="row home-page--sold">
			<h3 class="page-title"><span>Recently Sold Artworks</span></h1>
			@foreach($product_solds as $product)
				<div class="product">
					<div class="entry-thumbnail">
						<a href="{!! route('product.show', $product->slug) !!}" class="entry-thumbnail-link">
							<img src="{!! asset('assets/images/1x1.png') !!}" alt="Product thumbnail" style="background-image: url({!! $product->image !!})">
						</a>
					</div>
					<div class="entry-content clearfix">

						<div class="col-left-heart">
							<div class="col-left">
								<h2 class="entry-title"><a href="{!! route('product.show', $product->slug) !!}">
									{!! $product->title !!}
								</a></h2>
								<span class="entry-author"><a href="{!! route('artist.show', $product->user->id) !!}">
									{!! $product->title !!}
								</a></span>
							</div>
							<div class="col-right">
								<span class="entry-price-text">Sold</span>
								<span class="entry-price">${!! $product->price !!}</span>
							</div>
						</div>
						<div class="entry-excerpt">
							{!! $product->mediums->first()->name !!} | {!! $product->demensions !!}
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<div class="row home-page--service">
			<h3 class="page-title"><span>Our Services</span></h1>
			<div class="clearfix">
				@for ($i = 1; $i < 3; $i++)
				<a data-fancybox href="https://www.youtube.com/watch?v=kJQP7kiw5Fk" class="entry-thumbnail-link">
					<div class="service">
						<div class="wrap">
							<div class="entry-thumbnail">
								<img src="{!! asset('assets/images/2x1.png') !!}" alt="Product thumbnail" style="background-image: url({!! asset('assets/images/product.jpg') !!})">
								<span class="vc-play"><i class="fa fa-play"></i></span>
							</div>
							<div class="entry-content clearfix">
								<h2 class="entry-title">How to buy</h2>
							</div>
						</div>
					</div>
				</a>
				@endfor
			</div>
		</div>
	</div>
</div>
@endsection