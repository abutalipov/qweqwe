<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ config('app.name', Lang::get('titles.app')) }}</title>
        <meta name="description" content="">
        <meta name="author" content="Jeremy Kenedy">
        <link rel="shortcut icon" href="/favicon.ico">        
        <link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-icon-120x120.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/favicons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">        
        <link rel="manifest" href="/favicons/manifest.json">        
        <meta name="theme-color" content="#ffffff">


        {{-- Fonts --}}
        @yield('template_linked_fonts')

        {{-- Styles --}}

        @yield('template_linked_css')

        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                    'csrfToken' => csrf_token(),
            ]) !!}
            ;
        </script>

        @yield('head')

        <link rel="icon" href="/z/img/favicon.png">
        <meta property="og:image" content="/z/img/@1x/preview.jpg">
        <link rel="stylesheet" href="/z/css/styles.min.css">
    </head>
    <body>
        @include('partials.ztopnav')
        <div class="container" id="app">
            @yield('content')
        </div>

        {{-- Scripts --}}
        <script src="{{ mix('/js/app.js') }}"></script>
        @yield('footer_scripts')




        <script src="/z/js/scripts.min.js"></script>
    </body>
</html>