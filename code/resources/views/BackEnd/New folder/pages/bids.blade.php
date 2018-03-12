@extends('layouts.master')

@section('content')
<div class="page bids-page">
	<div class="container">
		<div class="row">
			<h1 class="page-title"><span>CURRENT AUCTIONS</span></h1>

			<div class="entry-description clearfix">
				<div class="col-xs-12">
					Furious bidding, hammer striking and a win! Welcome to the online auction of beautiful original Vietnamese paintings where all you need is a sense of value for art, a mouse click and it can be yours.
				</div>
			</div>
	
			<div class="main-content">
				<div class="clearfix">
					@foreach($products as $product)
						<div class="bid">
							<div class="entry-thumbnail">
								<a href="{!! route('product.show', $product->slug) !!}" class="entry-thumbnail-link">
									<img src="{!! asset('assets/images/1x1.png') !!}" alt="Product thumbnail" style="background-image: url({!! $product->image !!})">
								</a>
							</div>
							<div class="entry-content clearfix">
								<div class="col-left">
									<h2 class="entry-title"><a href="{!! route('product.show', $product->slug) !!}">
										{!! $product->title !!}
									</a></h2>
									<p class="entry-author"><a href="{!! route('artist.show', $product->user->id) !!}">
											{!! $product->user->name !!}
										</a></p>
									<div class="entry-excerpt">
										{!! $product->mediums->first()->name !!} | {!! $product->demensions !!}
									</div>
								</div>
								<div class="col-right">
									<p class="entry-price">
										@if($product->is_available & ! $product->is_bid_expired)
											<span class="entry-price-text">Available</span>
										@else
											<span class="entry-price-text">Expired</span>
										@endif
										<span class="entry-price--price">${!! $product->bid_price !!}</span>
									</p>
									<p class="entry-time"><i class="fa fa-clock-o"></i> - {!! $product->time_left_bid !!} left</p>
								</div>
							</div>
						</div>
					@endforeach
				</div>
				<div class="pagination-wrap clearfix">
					{!! $products->links() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
