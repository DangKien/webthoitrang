<footer class="footer-area">
    <div class="container">
        <div class="footer-top pt-60 pb-30">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="footer-widget mb-30">
                        <div class="footer-title">
                            <h3>Thanh toán</h3>
                        </div>
                        <div class="widget-info">
                            <p>
                                <i class="pe-7s-map-marker"> </i>
                                <span>Cs 1: Cổng trường Sư phạm</span>
                                <br>
                                <br>
                                <i class="pe-7s-map-marker"> </i>
                                <span >Cs 2: Cổng trường thương mại</span>
                                
                            </p>
                            <p>
                                <i class="pe-7s-mail"></i>
                                <span>
                                    <a>Email: quanaomoi@gmail.com</a>
                                </span>
                            </p>
                            <p>
                                <i class="pe-7s-call"></i>
                                <span>092345678 </span>
                            </p>
                        </div>
                        <div class="footer-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 hidden-sm">
                    <div class="footer-widget mb-30">
                        <div class="footer-title">
                            <h3>Loại sản phẩm</h3>
                        </div>
                        <div class="widget-text">
                            <ul>
                                @php 
                                    $categories = App\Models\CategoryModel::listCategories();
                                @endphp
                                 @foreach ($categories as $key => $category) 
                                    @if ($category['parent_id'] == 0) 
                                    <li><a href="{{ $category['url_link'] }}">{{ $category['name'] }}</a></li>
                                    @endif
                                @endforeach
                                <li><a href="contact.html">Tin tức</a></li>
                                <li><a href="{{ url('/contact') }}">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-2">
                    <div class="footer-widget mb-30">
                        <div class="footer-title">
                            <h3>Dịch vụ</h3>
                        </div>
                        <div class="widget-text">
                            <ul>
                                <li>Chuyển phát nhanh Viettel</li>
                                <li>Giao hàng nhanh</li>
                                <li>Giao hàng tiết kiệm</li>
                                <li>VietNam Post</li>
                                <li>Ninja van</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="footer-widget mb-30">
                        <div class="footer-title">
                            <h3>Thanh toán</h3>
                        </div>
                        <div class="widget-text">
                            <ul>
                                <li><a href="#">The Visa </a></li>
                                <li><a href="#">JCB </a></li>
                                <li><a href="#">VP Bank </a></li>
                                <li><a href="#">TP Bank</a></li>
                                <li><a href="#">Master Card </a></li>
                                <li><a href="#">BIDV </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom ptb-20">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="copyright">
                        <p>
                            Copyright © 2018
                            <a href="#">Đặng Kiên</a>
                            . All Rights Reserved.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="payment f-right">
                        <ul>
                            <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>