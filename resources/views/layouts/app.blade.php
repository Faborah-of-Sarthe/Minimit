<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (View::hasSection('title'))
        <?php $separator = ' - '; ?>
    @else
        <?php $separator = ''; ?>
    @endif
    <title>@yield('title') {{ $separator }} {{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel =
        <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <header class="header">
            <div class="container">
                <div class="header-left header-part">
                    <!-- Branding Image -->
                    <a class="logo" href="{{ url('/') }}">
                        <img src="{{ URL::asset('images/logo.png') }}" alt="{{ config('app.name', 'Laravel') }}">
                    </a>
                    <ul class="language-switcher mobile-hidden">
                        <li><a class="fr" href="{{ action('LanguageController@switch', ['fr']) }}">Français</a></li>
                        <li><a class="en" href="{{ action('LanguageController@switch', ['en']) }}">English</a></li>
                    </ul>
                </div>
                <div class="header-right header-part burger-menu desktop-hidden">
                    <span class="icon"></span>
                </div>
                <div class="header-right header-part mobile-hidden">
                    <ul class="language-switcher desktop-hidden">
                        <li><a class="fr" href="{{ action('LanguageController@switch', ['fr']) }}">Français</a></li>
                        <li><a class="en" href="{{ action('LanguageController@switch', ['en']) }}">English</a></li>
                    </ul>
                    @include('layouts.menus')
                </div>
            </div>
        </header>

        @if(Session::has('error'))
            <div class="alert alert-error">
                {{ Session::get('error') }}
            </div>
        @endif
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (View::hasSection('backlink'))
            <div class="backlink">
                <a href="{{ route(View::yieldContent('backlink')) }}" rel="nofollow">{{ trans("global.backlink") }}</a>
            </div>
        @endif


        <div class="content">
            @yield('content')
        </div>


        <div class="footer">
            @yield('footer')
            <!-- Scripts -->
            <script src="{{ URL::asset('js/app.js') }}"></script>
        </div>
    </div>
</body>
</html>
