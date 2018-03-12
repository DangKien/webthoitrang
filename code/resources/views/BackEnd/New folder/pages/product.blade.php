@extends('layouts.master')
@section('title', $product->title)

@section('content')
<div class="page product-page">
	<div class="container">
		<div class="main-content">
			<div class="row">
				<div class="col-md-8">
					<div class="entry-thumbnail">
						<img src="{!! $product->image !!}" alt="" />
						<div class="clearfix">
							<a href="{!! $product->image !!}" data-fancybox class="vc-btn vc-btn--zoom">ZOOM</a>
						</div>
						<span class="entry-wishlist">
							@if(Auth::check() && false == $product->like)
								<a href="{!! route('product.add_wishlist', $product->id) !!}" class="entry-wishlist--icon">Wishlist</a>
							@elseif(Auth::check())
								<span class="entry-wishlist--icon active">Wishlist</span>
							@else
								<span class="entry-wishlist--icon">Wishlist</span>
							@endif							
						</span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="entry-content">
						<h1 class="entry-title">{!! $product->title !!}</h1>
						<div class="entry-author clearfix">
							<span class="entry-author__title">by Vietnamese Artist</span>
							<div class="entry-author__name"><a href="{{ $product->user->id }}">{!! $product->user->name !!}</a></div>
						</div>
						<div class="entry-excerpt clearfix">
							<div class="entry-excerpt__title">Product Description</div>
							<div class="entry-excerpt__content">
								{!! nl2br(e($product->description)) !!}
							</div>
						</div>
						<div class="entry-metadata clearfix">
							<div class="entry-dimensions">
								<span class="col-title">Demensions</span>
								<span class="col-content">{!! $product->demensions !!}</span>
							</div>
							<div class="entry-medium clearfix">
								<span class="col-title">Medium</span>
								<span class="col-content">{!! $product->mediums->first()->name !!}</span>
							</div>
							<div class="entry-status">
								@if($product->is_available)
									<span class="entry-price-text">Available</span>
								@else
									<span class="entry-price-text">Ordered</span>
								@endif
							</div>
						</div>
						@if($product->is_available)
							<div class="entry-action">
								<div class="clearfix">
									<span class="entry-action__price">${!! $product->price !!}</span>
									<a href="{!! route('cart.show', $product->slug) !!}" class="btn vc-btn">ADD TO CART</a>
								</div>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix">
			<div class="howtobuy">
				<img src="{!! asset('/assets/images/howtobuy.jpg') !!}" alt="how to buy">
			</div>
		</div>
		<div class="row">
			<div class="recently-product">
				<h3 class="recently-product__title"><span>Recently Sold Artwork</span></h3>
				@foreach($product_sold as $product)
					@include('share.product-sold', compact('product'))
				@endforeach
			</div>
		</div>
		<div class="row">
			<div class="same-product">
				<h3 class="same-product__title"><span>Arts of Same Artist</span></h3>
				@foreach($product_artist as $product)
					@switch($product->type)
						@case(\App\Entities\Product::TYPE_EXHIBITION)
							@include('share.product-exhibition', compact('product'))
							@break
						@case(\App\Entities\Product::TYPE_BID)
							@include('share.product-bid', compact('product'))
							@break
						@default
							@include('share.product', compact('product'))	
							@break
					@endswitch
				@endforeach
			</div>
		</div>
		<div class="row">
			<div class="love-product">
				<h3 class="love-product__title"><span>You May Also Love</span></h3>
				@foreach($product_cate as $product)
					@switch($product->type)
						@case(\App\Entities\Product::TYPE_EXHIBITION)
							@include('share.product-exhibition', compact('product'))
							@break
						@case(\App\Entities\Product::TYPE_BID)
							@include('share.product-bid', compact('product'))
							@break
						@default
							@include('share.product', compact('product'))	
							@break
					@endswitch
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection
