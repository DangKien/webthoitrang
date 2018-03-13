<header>
    <div class="container header-container">
        <div class="col-xs-12 col-sm-2 logo">
            <a href="/"><img class="img-responsive" src="{{ asset('assets/images/logo.png') }}" alt="Logo"></a>
        </div>
        <div class="col-xs-12 col-sm-10 header-right">
            <nav class="navbar navbar-default">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
                <div class="clearfix"></div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="{!! route('product.index') !!}">Artworks</a></li>
                        <li class="{!! in_array($current_route, ['exhibitions.index', 'exhibitions.show', 'exhibitions.commingsoon.list', 'exhibitions.commingsoon.show', 'exhibitions.goingon.list']) ? 'active':'' !!}"><a href="{!! route('exhibitionsBids.index') !!}">Exhibitions & Auctions</a></li>
                        <li class="{!! in_array($current_route, ['artblog.show', 'artblog.index']) ? 'active':'' !!}"><a href="{!! route('artblog.index') !!}">Artblog</a></li>
                        <li class="{!! in_array($current_route, ['artist.show', 'artist.index']) ? 'active':'' !!}"><a href="{!! route('artist.index') !!}">Artist</a></li>
                        @if(Auth::check())
                        <li><a href="{!! route('wishlist.index') !!}">My space</a></li>
                        @endif
                        <li><a href="{!! route('about.index') !!}">About us</a></li>
                        <li><a href="/contact">Contact us</a></li>
                        @if (Auth::user() && Auth::user()->isRole('admin|artist'))
                        <li><a class="post-your-arts-menu" href="/upload/product">Post your art</a></li>
                        @endif
                        @if (!Auth::user())
                        <li class="signin-signup">
                            <a id="signin" href="/login">Sign in</a>
                            <span class="divider"> / </span>
                            <a id="signup" href="/register">Sign up</a>
                        </li>
                        @else
                        <li class="dropdown auth-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                                </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li>
                                    <a href="/profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout
                                        </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>