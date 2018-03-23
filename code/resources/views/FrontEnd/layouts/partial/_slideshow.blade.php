<section class="slider-area">
	<div class="bend niceties preview-2">
		<div id="ensign-nivoslider" class="slides nivoSlider" style="height: 747px;">	
			@if (isset($slides) )
				@foreach ($slides as $key => $slide)
					<img src="{{ url('images/slides', $slide->url_image) }}" alt="" title="#slider-direction-1"  />
				@endforeach
			@endif
		</div>
	</div>
</section>