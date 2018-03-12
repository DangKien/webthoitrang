@extends('layouts.master')

@section('content')
<div class="page exhibitions-artist-page">
	<div class="container">
		<div class="row">
			<h1 class="page-title"><span>The Nature of Things</span></h1>

			<div class="entry-description clearfix">
				<div class="col-sm-7 col-md-5 vc-col-left">
					{!! nl2br(e(str_limit($exhibition->description, 220))) !!}
				</div>
				<div class="col-sm-5 col-md-7 vc-col-right">
					<span class="clearfix">{!! $exhibition->address !!}</span>
      				<span class="clearfix">{!! $exhibition->time_event !!}</span>
				</div>
			</div>
	
			<div class="main-content">
				<div class="clearfix">
					@foreach($products as $product)
						@include('share.product-exhibition', compact('product'))
					@endforeach
				</div>
				<div class="col-xs-12 text-right clearfix">
					{{ $products->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
