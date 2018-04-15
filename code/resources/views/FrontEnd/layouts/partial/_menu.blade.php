<header>
	<div class="header-bottom">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-9 col-sm-9 col-xs-8">
	               <div class="main-menu pull-left">
                        <nav>
                            <ul>
                                <li><a href="{{ route('home') }}"><i style="font-size: 20px;" class="fa fa-home"></i> Trang chủ</a></li>
                               <?php 
                                    $categories = App\Models\CategoryModel::listCategories();
                            		showCategories($categories);
                            	?>
	                            <li><a href="{{ url('/news') }}">Tin tức</a></li>
                                <li><a href="{{ url('/contact') }}">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
	            </div>
	            <div class="col-md-3 col-sm-3 col-xs-4"  ng-controller="cartCtrl">
	                <div class="cart-menu">
	                    <div class="shopping-cart pull-right">
                            <a class="top-cart" href="cart.html"><i class="pe-7s-cart"></i></a>
                            <span>@{{ cartItems.cartCount }} </span>
                            <ul>
                                <li ng-repeat="(key, value) in cartItems.cartItems">
                                    <div class="cart-img-price">
                                        <div class="cart-img">
                                            <a href="{{ url('product') }}/@{{ value.options.slug }}"><img style="width: 70px; height: 70px;" ng-src="{{ url('images/main_prodcut/') }}//@{{  value.options.image }}" alt="" /></a>
                                        </div>
                                        <div class="cart-content">
                                            <h3><a href="{{ url('product') }}/@{{ value.options.slug }}">@{{ value.name }}</a> </h3>
                                            <span class="cart-price">@{{ value.qty }} x @{{ value.price }} vnđ</span>
                                        </div>
                                        <div class="cart-del">
                                            <i ng-click="deleteCart(value.rowId)" class="pe-7s-close-circle"></i>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <p class="total">
                                        Total:
                                        <span>@{{ cartItems.cartTotal }} vnđ</span>
                                    </p>
                                </li>
                                <li>
                                    <p class="buttons">
                                        <a class="my-cart" href="{{ url('carts') }}">Giỏ hàng</a>
                                         <a class="checkout" href="{{ url('') }}">Thanh toán</a>
                                    </p>
                                </li>
                            </ul>							
                        </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</header>
<!-- /header -->