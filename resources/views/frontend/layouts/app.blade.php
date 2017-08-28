<!doctype html>
<html lang="{{ config('app.locale') }}" itemscope itemtype="https://schema.org/WebSite">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="robots" content="index, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="author" content="{{ url(env('GOOGLEPLUS_SOCIAL_LINK') . '/posts') }}" />

        {!! SEO::generate() !!}

        @yield('meta')

        <!-- Styles -->
        @yield('before-styles')

        <link href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" />
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href=""/>
        <link rel="publisher" href="{{ url(env('GOOGLEPLUS_PUBLISHER_LINK')) }}" />
        <link rel="sitemap" type="application/xml" href="" />
        <link rel="alternate" type="application/rss+xml" href="" />

        <link href="{{ asset('css/frontend/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/frontend/style.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/frontend/colors.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/frontend/swiper.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/frontend/dark.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/frontend/font-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/frontend/animate.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/frontend/magnific-popup.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/frontend/responsive.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/frontend/custom.css') }}" rel="stylesheet" />

        @yield('after-styles')

        <!-- Scripts -->
        <script>window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?></script>
    </head>
    <body class="stretched">
        <div id="wrapper" class="clearfix">
            @include('includes.partials.logged-in-as')
            @include('frontend.includes.nav')

                @include('includes.partials.messages')
                @yield('content')

            @include('frontend.includes.footer')
        </div><!--#wrapper-->

        <div id="gotoTop" class="icon-angle-up"></div>

        <!-- Scripts -->
        <script src="{{ asset('js/frontend/jquery.js') }}"></script>
        <script src="{{ asset('js/frontend/plugins.js') }}"></script>
        <script src="{{ asset('js/frontend/functions.js') }}"></script>

        @include('includes.partials.ga')

        @yield('after-scripts')
    </body>
</html>
