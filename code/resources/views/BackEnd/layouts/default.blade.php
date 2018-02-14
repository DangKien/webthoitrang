<!DOCTYPE html>
<html>
    <head>
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
    </body>
</html>
