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

						<li class="{{ request()->is('/*/product') || request()->is('*/product') ? 'active active-link' : '' }}">
							<a href="{{ route('product') }}">
								<i class="fa fa-user-circle"></i>
								<span class="menu-title">Sản phẩm </span>
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