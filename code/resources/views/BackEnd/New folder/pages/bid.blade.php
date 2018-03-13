@extends('layouts.master')
@section('title', $product->title)

@section('content')
<div class="page bid-page">
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
						<div class="entry-author">
							<span class="entry-author__title">by Vietnamese Artist</span>
							<div class="entry-author__name"><a href="">{!! $product->user->name !!}</a></div>
						</div>
						<div class="entry-excerpt">
							<div class="entry-excerpt__title">Product Description</div>
							<div class="entry-excerpt__content">
								{!! nl2br(e($product->description)) !!}
							</div>
						</div>
						<div class="entry-metadata">
							<div class="entry-dimensions">
								<span class="col-title">Demensions</span>
								<span class="col-content">{!! $product->demensions !!}</span>
							</div>
							<div class="entry-medium">
								<span class="col-title">Medium</span>
								<span class="col-content">{!! $product->mediums->first()->name !!}</span>
							</div>
							<div class="entry-status">
								@if($product->is_available)
									Available
								@else
									Ordered
								@endif
							</div>
						</div>
						@if($product->is_available)
						<div class="entry-action clearfix">
							<form action="{!! route('bid.store') !!}" method="POST" accept-charset="utf-8">
								{{ csrf_field() }}
								<div class="entry-action--current">
									<span class="col-title">Current Bidding</span>
									<span class="col-content">${!! $product->bid_price !!}</span>
								</div>
								<div class="entry-action--bid">
									<span class="col-title">Your Bidding</span>
									<span class="col-content">
										<input type="hidden" name="product_id" value="{!! $product->id !!}">
										<input type="text" name="bid_price" value="{!! $product->bid_price !!}">
									</span>
									@if ($errors->has('bid_price'))
                                        <span class="text-warning text-right">
                                           {{ $errors->first('bid_price') }}
                                        </span>
                                    @endif
								</div>
								<div class="entry-action--time">
									<span class="col-title">Time remaining</span>
									<span class="col-content"><p class="entry-time"><i class="fa fa-clock-o"></i> - {!! $product->time_left_bid !!} left</p></span>
								</div>
								@if(Auth::check())
								<button type="button" class="btn vc-btn" data-toggle="modal" data-target="#entry-action--btn">Bid now</button>
								<div class="modal fade" id="entry-action--btn" role="dialog">
								    <div class="modal-dialog">
								        <!-- Modal content-->
								        <div class="modal-content clearfix">
							            	<button type="button" class="close" data-dismiss="modal"><img src="{!! asset('assets/images/close.png') !!}" alt=""></button>
							                <h3 class="modal-title">Bidding Rules</h3>
							                <p>
							                	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
							                </p>
							                <p id="vc-agree" class="modal-agree"><i class="fa fa-square-o"></i>Agree to the bidding rules</p>
							                <input disabled="true" type="submit" id="vc-btn--submit" class="btn vc-btn vc-btn--submit" value="OK">
								        </div>
								    </div>
								</div>
								@else
									<input class="btn vc-btn" type="text" value="Please login to bid" disabled>
								@endif
							</form>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="love-product">
				<h3 class="love-product__title"><span>You may also love</span></h3>
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
