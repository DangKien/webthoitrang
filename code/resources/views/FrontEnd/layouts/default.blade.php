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
        <div id="container" class="effect mainnav-lg">
            <div>
                @includeif ('FrontEnd.layouts.partial._header')
                @includeif ('FrontEnd.layouts.partial._menu')
                @includeif ('FrontEnd.layouts.partial._slideshow')
                @yield('content')
            </div>
            @includeif ('FrontEnd.layouts.partial._footer')
            @includeif ('FrontEnd.layouts.partial._default_js')
            @includeif ('FrontEnd.layouts.partial._js')
            @yield('myJs')
            
        </div>
    </body>
</html>
