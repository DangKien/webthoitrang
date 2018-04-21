<header id="navbar">
			
			<div id="navbar-container" class="boxed">

				<!--Brand logo & name-->
				<!--================================-->
				<div class="navbar-header">
					<a class="navbar-brand">
						<img src="{{ url('') }}/Nifty/img/logo.png" alt="Nifty Logo" class="brand-icon">
						<div class="brand-title">
							<span class="brand-text">ROYAL</span>
						</div>
					</a>
				</div>
				<!--================================-->
				<!--End brand logo & name-->


				<!--Navbar Dropdown-->
				<!--================================-->
				<div class="navbar-content clearfix">
					<ul class="nav navbar-top-links pull-left">

						<!--Navigation toogle button-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li class="tgl-menu-btn">
							<a class="mainnav-toggle" href="#">
								<i class="fa fa-navicon fa-lg"></i>
							</a>
						</li>
						<li class="dropdown" ng-controller="cartCtrl">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">
								<i class="fa fa-bell fa-lg"></i>
								<span class="badge badge-header badge-danger">@{{ countOrder }}</span>
							</a>

							<!--Notification dropdown menu-->
							<div class="dropdown-menu dropdown-menu-md with-arrow">
								<div class="pad-all bord-btm">
									<p class="text-lg text-muted text-thin mar-no">Bạn có @{{ countOrder }} đơn hàng mới.</p>
								</div>
								<div class="nano scrollable has-scrollbar" style="height: 0px;">
									<div class="nano-content" tabindex="0" style="right: -17px;">
										<ul class="head-list">
											<!-- Dropdown list-->
											<li ng-repeat="(key, order) in dataOrder">
												<a href="#" class="media">
													<div class="media-body">
														<div class="text-nowrap">@{{ order.user.first_name + " " + order.user.last_name  }} - Đã đặt một đơn hàng</div>
														<small class="text-muted">@{{ order.total }} - VNĐ</small>
													</div>
												</a>
											</li>
										</ul>
									</div>
								<div class="nano-pane" style="display: none;"><div class="nano-slider" style="height: 20px; transform: translate(0px, 0px);"></div></div></div>

								<!--Dropdown footer-->
								<div class="pad-all bord-top">
									<a href="#" class="btn-link text-dark box-block">
										<i class="fa fa-angle-right fa-lg pull-right"></i>Show All Notifications
									</a>
								</div>
							</div>
						</li>

					</ul>
					<ul class="nav navbar-top-links pull-right">

						<!--User dropdown-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li id="dropdown-user" class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
								<span class="pull-right">
									<img class="img-circle img-user media-object" src="{{ url('') }}/Nifty/img/av1.png" alt="Profile Picture">
								</span>
								<div class="username hidden-xs">
									@if (Auth::check()) {{ Auth::user()->first_name." ".Auth::user()->last_name }} @endif</div>
							</a>


							<div class="dropdown-menu dropdown-menu-md dropdown-menu-right with-arrow panel-default">

								<!-- User dropdown menu -->
								<ul class="head-list">
								<!-- Dropdown footer -->
								<div class="pad-all text-right">
									<a href=" {{ url('logout') }}" class="btn btn-primary">
										<i class="fa fa-sign-out fa-fw"></i> Đăng Xuất
									</a>
								</div>
							</div>
						</li>
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End user dropdown-->
					</ul>
					
				</div>
				<!--================================-->
				<!--End Navbar Dropdown-->

			</div>
</header>