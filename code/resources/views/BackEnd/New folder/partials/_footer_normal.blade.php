<footer>
    <i class="scroll-btn fa fa-arrow-up" aria-hidden="true"></i>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-footer">
                <ul class="nav navbar-nav">
                    <li><a href="{!! route('product.index') !!}">Works</a></li>
                    @if (Auth::user() && Auth::user()->isRole('admin|artist'))
                    <li><a href="/upload/product">Post your art</a></li>
                    @endif
                    <li><a href="{!! route('exhibitionsBids.index') !!}">Exhibition & Auction</a></li>
                    <li><a href="{!! route('artblog.index') !!}">Artblog</a></li>
                    <li><a href="{!! route('artist.index') !!}">Artist</a></li>
                    <li><a href="{!! route('about.index') !!}">About us</a></li>
                    @if(Auth::check())
                    <li><a href="{!! route('wishlist.index') !!}">My space</a></li>
                    @endif
                    <li><a href="/contact">Contact us</a></li>
                </ul>
            </nav>
            <div class="hotline-email-follow-us">
                <div class="row">
                    <div class="hotline-email col-sm-2">
                        <div class="hotline">
                            Hotline: 01654868789
                        </div>
                        <div class="email">
                            Email: Artistviet@gmail.com
                        </div>
                    </div>
                    <div class="follow-us col-sm-2 col-sm-offset-1">
                        <strong>Contact us</strong>
                        <div class="icons">
                            <a href="https://www.facebook.com/artistviet/" class="icon icon-facebook">
                                    <img src="{{ asset('assets/images/facebook-icon.png') }}">
                                </a>
                            <a href="#" class="icon icon-twitter">
                                    <img src="{{ asset('assets/images/twitter-icon.png') }}">
                                </a>
                            <a href="mailto:artistviet@gmail.com" class="icon icon-houzz">
                                    <img src="{{ asset('assets/images/gmail-icon.png') }}">
                                </a>
                            <a href="#" class="icon icon-pinterest">
                                    <img src="{{ asset('assets/images/pinterest-icon.png') }}">
                                </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="trademarks-copyright">
                <div class="trademarks">
                    Logos used on the website are trademarks of the respective companies / owners.
                </div>
                <div class="copyright">
                    © ArtistViet 1999-2017 / Contact for Design and Development of this Website
                </div>
            </div>
        </div>
    </div>
</footer>