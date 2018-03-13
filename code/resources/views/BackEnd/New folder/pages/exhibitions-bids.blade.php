@extends('layouts.master')

@section('content')
<div class="page exhibitions-bids-page">
	<div class="container">
		<div class="row">
			<h1 class="page-title"><span>Exhibitions and Auctions</span></h1>
	
			<div class="main-content">
				<div class="exhibitions-bids">
					<div class="wrap">
						<div class="exhibitions-bids--thumbnail"><a href="{!! route('exhibitions.commingsoon.list') !!}"><img src="{!! asset('/assets/images/1x1.png') !!}" style="background-image: url({!! asset('/assets/images/product.jpg') !!});" alt=""></a></div>
						<h2 class="exhibitions-bids--title"><a href="{!! route('exhibitions.commingsoon.list') !!}">Comming exhibitions</a></h2>
					</div>
				</div>
				<div class="exhibitions-bids">
					<div class="wrap">
						<div class="exhibitions-bids--thumbnail"><a href="{!! route('exhibitions.goingon.list') !!}"><img src="{!! asset('/assets/images/1x1.png') !!}" style="background-image: url({!! asset('/assets/images/product.jpg') !!});" alt=""></a></div>
						<h2 class="exhibitions-bids--title"><a href="{!! route('exhibitions.goingon.list') !!}">Exhibitions</a></h2>
					</div>
				</div>
				<div class="exhibitions-bids">
					<div class="wrap">
						<div class="exhibitions-bids--thumbnail"><a href="{!! route('bid.index') !!}"><img src="{!! asset('/assets/images/1x1.png') !!}" style="background-image: url({!! asset('/assets/images/product.jpg') !!});" alt=""></a></div>
						<h2 class="exhibitions-bids--title"><a href="{!! route('bid.index') !!}">Bidding</a></h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
