@extends('layouts.master')

@section('content')
<div class="page products-page">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-md-3">
				<form action="{!! route('product.index') !!}" class="search-form" method="get" accept-charset="utf-8">
					<h1 class="search-form__title">Collect Art &amp; Design Or</h1>
					<div class="search-form__range clearfix border-top">
						<div class="clearfix search-form__range-text">
							<span>Price:</span>
							<span class="amount"></span>
							<span><input type="text" class="amount_min" name="price_min" hidden></span>
							<span><input type="text" class="amount_max" name="price_max" hidden></span>
						</div>
						<p class="slider-range" data-min="{!! $price_min !!}" data-max="{!! $price_max !!}" data-value-min="{!! $price_value_min !!}" data-value-max="{!! $price_value_max !!}" data-before="$ " data-after="+"></p>
					</div>
					<div class="form-group clearfix border-top">
						<input type="text" class="form-control" name="year" value="{!! $year !!}" placeholder="Year">
					</div>
					<div class="clearfix border-top">
						<p class="search-form__type">
							<select name="type" class="form-control">
								<option value="">Type</option>
								@foreach($types as $key => $item)
									<option value="{!! $key !!}" {!! $key == $type_value ? 'selected' : '' !!}>{!! $item !!}</option>
								@endforeach
							</select>
						</p>
						<p class="search-form__medium">
							<select name="cat" class="form-control">
								<option value="">Style</option>
								@foreach($cats as $item)
									<option value="{!! $item->id !!}" {!! $item->id == $cat_value ? 'selected' : '' !!}>{!! $item->name !!}</option>
								@endforeach
							</select>
						</p>
					</div>
					<div class="search-form__range clearfix border-top">
						<div class="clearfix search-form__range-text">
							<span>Width:</span>
							<span class="amount"></span>
							<span><input type="text" class="amount_min" name="width_min" hidden></span>
							<span><input type="text" class="amount_max" name="width_max" hidden></span>
						</div>
						<p class="slider-range" data-min="{!! $width_min !!}" data-max="{!! $width_max !!}" data-value-min="{!! $width_value_min !!}" data-value-max="{!! $width_value_max !!}" data-after=" + cm"></p>
					</div>
					<div class="search-form__range">
						<div class="clearfix search-form__range-text">
							<span>Height:</span>
							<span class="amount"></span>
							<span><input type="text" class="amount_min" name="height_min" hidden></span>
							<span><input type="text" class="amount_max" name="height_max" hidden></span>
						</div>
						<p class="slider-range" data-min="{!! $height_min !!}" data-max="{!! $height_max !!}" data-value-min="{!! $height_value_min !!}" data-value-max="{!! $height_value_max !!}" data-after=" + cm"></p>
					</div>
					<button type="submit" class="btn search-form--btn">Search</button>
				</form>
			</div>
			<div class="col-sm-8 col-md-9">
				<div class="clearfix products-wrap">
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
				<div class="pagination-wrap clearfix">
					{{ $products->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
