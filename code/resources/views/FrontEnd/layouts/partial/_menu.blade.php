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
	            <div class="col-md-3 col-sm-3 col-xs-4">
	                <div class="cart-menu">
	                    <div class="shopping-cart pull-right">
                            <a class="top-cart" href="cart.html"><i class="pe-7s-cart"></i></a>
                            <span>01</span>
                            <ul>
                                <li>
                                    <div class="cart-img-price">
                                        <div class="cart-img">
                                            <a href="#"><img src="assets/img/cart/1.jpg" alt="" /></a>
                                        </div>
                                        <div class="cart-content">
                                            <h3><a href="#">product title</a> </h3>
                                            <span class="cart-price">1 x $ 299.00</span>
                                        </div>
                                        <div class="cart-del">
                                            <i class="pe-7s-close-circle"></i>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <p class="total">
                                        Subtotal:
                                        <span>$299.00</span>
                                    </p>
                                </li>
                                <li>
                                    <p class="buttons">
                                        <a class="my-cart" href="#">View Cart</a>
                                        <a class="checkout" href="#">Checkout</a>
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