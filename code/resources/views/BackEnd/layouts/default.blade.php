<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <!-- Chrome, Firefox OS and Opera -->
        <meta name="theme-color" content="#75C7C3">
        <!-- Windows Phone -->
        <meta name="msapplication-navbutton-color" content="#75C7C3">
        <!-- iOS Safari -->
        <meta name="apple-mobile-web-app-status-bar-style" content="#75C7C3">
        <title> @yield('title') </title>
        <link rel="icon" href="{{ url('Frontend/img/logo_title1.png') }}" type="image/gif" sizes="32x32">
        <script>
            var SiteUrl = '{{url("/")}}';
        </script>
        @includeif ('BackEnd.layouts.partial._angular')
        @includeif ('BackEnd.layouts.partial._default_css')
        @includeif ('BackEnd.layouts.partial._css')
        @yield('myCss')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
    </head>
    <body ng-app="ngApp" ng-cloak class="nifty-ready pace-done">
        <div id="container" class="effect mainnav-lg">
            <div class="boxed">
                @includeif ('BackEnd.layouts.partial._header')
                @yield('content')
                @includeif ('BackEnd.layouts.partial._menu')
             </div>
            @includeif ('BackEnd.layouts.partial._default_js')
            @includeif ('BackEnd.layouts.partial._js')
            @yield('myJs')
            @includeif ('BackEnd.layouts.partial._footer')
        </div>
        <div class="modal" id="modalLoader">
            <div id="loader-wrapper">
                <div id="loader"></div>
            </div>
        </div>
    </body>
</html>
