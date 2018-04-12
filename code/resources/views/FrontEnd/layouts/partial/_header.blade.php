<header class="header-area">
	<div class="header-top black-bg ptb-10">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-7 col-sm-6 hidden-xs">
				    <div class="header-to-info">
				        <ul>
				            <li class="for-none"><i class="fa fa-envelope"></i> Mail: <span><a href="#">demoiaan@gmail.com {{ Auth::guard('customer')->check() }}</a></span></li>
				            <li><i class="fa fa-phone"></i> Liên hệ: <span>0123 456 789</span></li>
				        </ul>
				    </div>
				</div>
				<div class="col-lg-6 col-md-5 col-sm-6 col-xs-12">
				    <div class="user-search">
				        <div class="user f-right">
				            <a href="#">
                                	@if (!Auth::guard('customer')->check() )
                                		<i class="pe-7s-add-user">
                                	@else 
                                		<span style="color:#fff; font-size: 17px;">{{ Auth::guard('customer')->user()->first_name." ".Auth::guard('customer')->user()->last_name }} </span>
                                		
                                	@endif
                                </i>
                            </a>
                            <div class="currence-user-page">
                                <div class="user-page">
                                    <ul>
                                    	@if (!Auth::guard('customer')->check() ) 
                                        <li><a href="{{ url('login') }}"><i class="pe-7s-next-2"></i> Đăng nhập</a></li>
                                        <li><a href="{{ url('register') }}"><i class="pe-7s-add-user"></i> Đăng kí</a></li>
                                        @else 
                                        	<li><a href="{{ route('customer') }}">
                                        		<i class="fa fa-user"></i> Thông tin tài khoản</a></li>
                                        	<li><i class="fa fa-shopping-cart"></i> Sản phẩm đã đặt</li>
                                        	<li><a href="{{ route('logout.frontend') }}"><i class="pe-7s-add-user"></i> Đăng xuất</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
				        </div>
				        <div class="header-search f-right">
				            <form action="{{ url('search') }}" method="GET">
				                <div class="search-input-button">
				                    <input name="freeText" placeholder="Tìm kiếm" type="search">
				                    <button class="search-button" type="submit">
                                        <i class="pe-7s-search"></i>
                                    </button>
				                </div>
				            </form>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
</header>