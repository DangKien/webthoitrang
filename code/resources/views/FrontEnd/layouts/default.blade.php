<!DOCTYPE html>
<html>
    <head>
        <title> @yield('title') </title>
        <link rel="icon" href="{{ url('Frontend/img/logo_title1.png') }}" type="image/gif" sizes="32x32">
        <script>
            var SiteUrl = '{{url("/")}}';
        </script>
        @includeif ('FrontEnd.layouts.partial._angular')
        @includeif ('FrontEnd.layouts.partial._default_css')
        @includeif ('FrontEnd.layouts.partial._css')
        @yield('myCss')
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div id="container" class="effect mainnav-lg" ng-app="ngApp" ng-cloak>
            <div>
                @includeif ('FrontEnd.layouts.partial._header')
                @includeif ('FrontEnd.layouts.partial._menu')
                @yield('content')
            </div>
            @includeif ('FrontEnd.layouts.partial._footer')
            @includeif ('FrontEnd.layouts.partial._default_js')
            @includeif ('FrontEnd.layouts.partial._js')
            @yield('myJs')
        </div>
        <div class="modal" id="modalLoader">
            <div id="loader-wrapper">
                <div id="loader"></div>
            </div>
        </div>
    </body>
</html>
