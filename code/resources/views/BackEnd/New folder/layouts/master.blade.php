<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Vietartist.com')</title>
    
    <!-- Styles -->

    @section('head')
        <link href="{{ asset('assets/dist/app.css') }}" rel="stylesheet">
    @show

</head>

<body>
    @include('partials.header')
    @if (session('flash_message') || (isset($errors) && count($errors) > 0))
    <div class="vc-alert-wrap">
        <div class="container">
            @if (session('flash_message') )
            <div class="alert alert-{{ session('flash_level') }}">
                {{ session('flash_message') }}
            </div>
            @endif

            @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
    @endif
    @yield('content')

    @include('partials.footer')

    <!-- Scripts -->
    @section('foot')
        <script src="{{ asset('assets/dist/app.js') }}"></script>
    @show
</body>

</html>