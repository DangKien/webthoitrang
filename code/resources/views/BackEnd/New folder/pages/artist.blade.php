@extends('layouts.master')

@section('content')
<div class="page artist-page">
	<div class="container">
		<div class="row">
			<h1 class="author-name"><span>{!! $artist->name !!}</span></h1>

			<ul class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active"><a href="#product" aria-controls="product" role="tab" data-toggle="tab">Catalogue</a></li>
			    <li role="presentation"><a href="#author-blog" aria-controls="author-blog" role="tab" data-toggle="tab">Biography</a></li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="product">
			    	@foreach($products as $product)
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
			    <div role="tabpanel" class="tab-pane" id="author-blog">
			    	<div class="author-blog--avater clearfix"><img src="{!! asset('/assets/images/artist-bg.png') !!}" alt="Author" style="background-image: url({!! $artist->avatar !!})"></div>
			    	<h3 class="author-blog--name">{!! $artist->name !!}</h3>
			    	<div class="author-blog-content">
			    		{!! nl2br(e($artist->description)) !!}
			    	</div>
			    	<h3 class="author-blog--exhibition">Exhibitions</h3>
			    	<div class="author-blog-content">
			    		{!! nl2br(e($artist->artist->exhibition)) !!}
			    	</div>
			    </div>
			</div>
		</div>
	</div>
</div>
@endsection
