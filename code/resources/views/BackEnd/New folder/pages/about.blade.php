@extends('layouts.master') @section('content')
<div class="about-section">
	<div class="container">
		<div class="col-xs-12">
			<div class="banner-section flex-box flex-center flex-content-center" style="background-image: url( {{ asset('assets/images/home_slider_img/5.jpg') }} )">
				<h1>{{ ucwords('Build your love space with art') }}</h1>
			</div>
		</div>
	</div>

	<div class="container">
		<ul class="nav nav-pills">
			<li role="presentation" class="active">
				<a data-toggle="pill" href="#mission">Mission & Vision</a>
			</li>
			<li role="presentation">
				<a data-toggle="pill" href="#services">Why select us</a>
			</li>
			<li role="presentation">
				<a data-toggle="pill" href="#members">Term and condition</a>
			</li>
			<li role="presentation">
				<a data-toggle="pill" href="#news">Press News</a>
			</li>
			<li role="presentation">
				<a data-toggle="pill" href="#howto">How to Join</a>
			</li>
		</ul>
	</div>

	<div class="tab-content">
		<div id="mission" class="container tab-pane fade in active">
			<div class="col-xs-12">
				<div class="artblog-content">
					<div class="content-detail">
						<h3>Mission</h3>
						<p>Connecting people with art and artists they love Artistviet covers art happenings and events around Vietnam and Asia. It is is also a place to explore current and past exhibitions at museums and galleries, and cultural events. Let’s enjoy our awesome art space!</p>
						<h3>Vision</h3>
						<p>The number One Artplatform in Vietnam and Asean</p>
						<h3>Core Value</h3>
						<p id="our-core-values">Our Core values</p>
						<ul>
							<li>Delicated to customer satisfaction;</li>
							<li>Intergrity</li>
							<li>Respect individual talent</li>
							<li>Innovative and Teamwork;</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="services" class="container tab-pane fade">
			<div class="col-xs-12">
				<div class="artblog-content">
					<div class="content-detail">
						<h2 class="why-select-title">Why select Artistviet?</h2>

						<h3>1.Variety of style, medium from well-known and trending artist:</h3>
						<p>The platform is a place for thousands of artworks, including paintings, photographs, ceramics and sculptures from hundreds of artists in Vietnam and Asean.</p>

						<h3>2.Only original – affordable price</h3>
						<p>Artistviet only introduce orginal artworks which are at a wide range of prices to suit all budget.</p>

						<h3>4.Every easy and comfortable:</h3>
						<p>With One Click, the art you loved is yours. We offer a 7-day return policy allows you to buy with confidence. In case of unsatisfaction with your purchase, just return it and we’ll assist you to find your love work</p>

						<h3>5.Global shipping</h3>
						<p>We work with number of international shipping companies to handle all aspects of delivery and customs. All fees are quoted clearly.</p>
					</div>
				</div>
			</div>
		</div>
		<div id="members" class="container tab-pane fade">
			<div class="col-xs-12">
				<div class="artblog-content">
					<div class="content-detail">
						<h3>For sellers:</h3>
						<p>Artistviet performs as a free platform for uploading photo unlimitedly. We support artists in issuing authenicity certificate, packing and shipping worldwide and charge 15% service fee for on only successful  orders.</p>

						<h3>For buyers:</h3>
						<p>All priced works on the website are for sale which includes  painting, photographs, handicrafts, ceramics, sculptures and pictures at a wide range of prices. We provide art consulting service, online payment, delivery worldwide in addition to shipping insurance. If you need futher information, please contact us.</p>

						<h3>Authenic</h3>
						<p>We commit to sell only original artworks. To proof for that, all artworks on Artistviet website are delivered with Certificate of Authenticity issued and signed by the original artist.</p>

						<h3>Shipping</h3>
						<p>We work with leading carriers such as  Fedex Express, DHL, UPS, EMS for worldwide delivery of art.
						Delivery time is 1-2 days domestic in Vietnam, 2-4 Asian countries; and about 5 days to USA, Canada, Europe and the rest, according to standard shippment policy of international carriers.</p>

						<h3>Shipping cost</h3>
						<p>We fix shipping cost according to weight and volume of the works and country destination. Shipping cost for canvas painting shipped in tube is US 3$ within Vietnam and US 80$ to other countries.</p>

						<h3>Insurance</h3>
						<p>We work with our shipping partners to buy transport insurance if buyer needs. The works are separately charged 2% of the value. In case of loss or damage, the shipping company will reimburse the full amount to the buyer. Contact us if you want to buy transport insurance for your purchase.</p>

						<h3>Refund Policy</h3>
						<p>You have the right to return your purchase within 7 days of receipt of works for a full refund (minus cost of one - way shipping). Please note that return must be properly informed to us by by sending an email to Artistviet@gmail.com within 7 days of receipt of the works.
						If you want to cancel or change an order, contact us via Artistviet@gmail.com . If your order has already been shipped, you may simply return it to us.
						In the unlikely event that the artwork arrives damaged, please e-mail us immediately at Artistviet@gmail.com. We will guide you through your options. These will include replacing the damaged work by an equal valued one or a full refund.</p>

						<h3>Prices and Payment</h3>
						<p>We public the price under each artworks. If the item you have orderd is out of stock, our system will send you an email to inform you about this case.
						You have to pay the total value for the work to be shipped.
						All payments are secure. We accept major credit cards, PayPal  and wire transfer.
						For further information, contact us  via Artistviet@gmail.com or refer to FAQ indivision.</p>

						<h3>For buyers:</h3>

						<h4>1. How do I narrow my search?</h4>

						<p>Our site currently contains a variety of classification criterias such as style, subject, medium, artist’name and price. We recommend you to use earch filter to optimize your search result or contact us via artistviet@gmail.com, our art consulting service will help you find the work you love.</p>

						<h4>3. What's Artistviet's 7-Day Return Policy?</h4>

						<p>You have the right to return your purchase within 7 days of receipt of works for a full refund ( minus cost of one- way shipping ). Please note that returns must be properly insured and informed to us by sending an email to Artistviet@gmail.com within 7 days of receipt of the works.</p>


						<h4>5. What should I do if my favorite artwork is sold-out?</h4>

						<p>You are welcome to find a similar artwork available on the website or if needed, contact us then we will assist you to make an offer to the artist for the 2nd-version of that one.</p>

						<h4>6. Can I cancel an order prior to shipment? Can I return artwork if I’m not satisfied?</h4>

						<p>All buyers have the right to cancel their order any time before shipment, and are able to return art 7 days after the delivery date if unsatisfied with the work according to our return policy.</p>

						<h3>For seller:</h3>

						<h4>1. It is too complicated to ship an artword  abroad. Do you have any supportation?</h4>

						<p>We work with shipchung.vn which integrate the most reputable delivery company such as DHL, EMS,Fedex and UPS to assist you in shipping your works to anywhere all over the world at the best status.</p>

						<h4>2. Do I have to pay shipping fees?</h4>

						<p>In general, these fees are charged into buyer’s account, but you can deal with us to request for being charged these fees for prommotion purrpose.</p>
					</div>
				</div>
			</div>
		</div>
		<div id="news" class="container tab-pane fade">
		</div>
		<div id="howto" class="container tab-pane fade">
			<div id="how-to-tab" class="col-xs-12 col-sm-3">
				<ul class="nav nav-pills">
					<li role="presentation" class="active">
						<a data-toggle="pill" href="#howtobuy">How to buy?</a>
					</li>
					<li role="presentation">
						<a data-toggle="pill" href="#howtosell">How to sell?</a>
					</li>
				</ul>
			</div>
			<div class="tab-content how-to-content col-xs-12 col-sm-9">
				<div id="howtobuy" class="tab-pane fade in active">
					<div id="title-container" class="flex-box flex-center flex-content-center">
						<h1 class="page-title how-to-title">How to buy</h1>
						<div class="title-cross"></div>
					</div>
					<div class="artblog-content">
						<div class="content-detail">
							<h3 class="how-to-title">How to buy? Made it simple with ArtistViet.vn:</h3>
							<ol>
								<li>“Add to cart” the Art you love:</li>
								<li>“Checkout”: Fill out  the Shipping information and Payment.</li>
								<li>“Art is yours”: The work will be shipped to your place as soon as possible with quality guarantee</li>
							</ol>
						</div>
					</div>
				</div>
				<div id="howtosell" class="tab-pane fade">
					<div id="title-container" class="flex-box flex-center flex-content-center">
						<h1 class="page-title how-to-title">How to sell</h1>
						<div class="title-cross"></div>
					</div>
					<div class="artblog-content">
						<div class="content-detail">
						 	<h3 class="how-to-title">How to sell? Made your art to share</h3>
						 	<ol>
						 		<li>Registration as a member: Sign up or sign in as you are an artist.</li>
						 		<li>Post your art:  Artist can “Post Your  Art” by filling information about the art and uppload on the platform.</li>
						 		<li>Delivery and receive payment:  Our specialist will collect the art and provide shipment service. The payment will be tranfered to your account right after the customer’s payment.</li>
						 	</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@if (!$testimonials->isEmpty())
	<div class="container-fluid slider-container">
		<div id="bottom-slider" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				@foreach ($testimonials as $key => $testimonial)
				<div class="item <?php echo $key == 0 ? 'active' : '' ?>">
					<div class="slider-item-content flex-box flex-center flex-content-center flex-column" style="background-image: url( {{ asset('assets/images/about/slider.png') }} )">
						<h3>{{ $testimonial->name }}</h3>
						<div class="slider-content-wrapper"><p>{{ $testimonial->content }}</p></div>
					</div>
				</div>
				@endforeach
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
	@endif
</div>
@endsection