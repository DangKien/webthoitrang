<nav id="mainnav-container">
	<div id="mainnav">
		<!--Shortcut buttons-->
		<!--================================-->
		<div id="mainnav-shortcut">
			
		</div>
		<!--================================-->
		<!--End shortcut buttons-->


		<!--Menu-->
		<!--================================-->
		<div id="mainnav-menu-wrap">
			<div class="nano">
				<div class="nano-content">
					<ul id="mainnav-menu" class="list-group">
						<!--Menu list item-->
						<li>
							<a>
								<span class="menu-title"></span>
							</a>
						</li>

						<li class="{{ request()->is('/*/category') || request()->is('*/category') ? 'active active-link' : '' }}">
							<a href="{{ route('category') }}">
								<i class="fa fa-user-circle"></i>
								<span class="menu-title">Loại sản phẩm </span>
							</a>
						</li>
						<li class="{{ request()->is('/*/customer') || request()->is('*/customer') ? 'active active-link' : '' }}">
							<a href="{{ route('customer.backend') }}">
								<i class="fa fa-user-circle"></i>
								<span class="menu-title">Khách hàng </span>
							</a>
						</li>

						<li class="{{ request()->is('/*/product') || request()->is('*/product') ? 'active active-link' : '' }}">
							<a href="{{ route('product') }}">
								<i class="fa fa-user-circle"></i>
								<span class="menu-title">Sản phẩm </span>
							</a>
						</li>
						<li class="{{ request()->is('/*/slider') || request()->is('*/slider') ? 'active active-link' : '' }}">
							<a href="{{ route('slider') }}">
								<i class="fa fa-user-circle"></i>
								<span class="menu-title">Slide Show</span>
							</a>
						</li>

						<li class="{{ request()->is('/*/contact') || request()->is('*/contact') ? 'active active-link' : '' }}">
							<a href="{{ route('contact') }}">
								<i class="fa fa-user-circle"></i>
								<span class="menu-title">Liên hệ</span>
							</a>
						</li>

						<li class="{{ request()->is('/*/user') || request()->is('*/user') ? 'active active-link' : '' }}">
							<a href="{{ route('users.index') }}">
								<i class="fa fa-user-circle"></i>
								<span class="menu-title">Người dùng</span>
							</a>
						</li>
						<li class="{{ request()->is('/*/news') || request()->is('*/news') ? 'active active-link' : '' }}">
							<a href="{{ route('news.index') }}">
								<i class="fa fa-user-circle"></i>
								<span class="menu-title">Tin tức</span>
							</a>
						</li>
						<li class="{{ request()->is('/*/orders') || request()->is('*/orders') ? 'active active-link' : '' }}">
							<a href="{{ route('orders.index') }}">
								<i class="fa fa-user-circle"></i>
								<span class="menu-title">Đơn hàng</span>
							</a>
						</li>
						<li class="{{ request()->is('/*/statistic') || request()->is('*/statistic') ? 'active active-link' : '' }}">
							<a href="{{ route('statistic.index') }}">
								<i class="fa fa-user-circle"></i>
								<span class="menu-title">Thống kê</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--================================-->
		<!--End menu-->

	</div>
</nav>