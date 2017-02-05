<div class="navbar-menu">
    <ul class="menu">
        <li><a href="#">{!! trans('global.list_menu') !!}</a></li>
        <li><a rel="nofollow" href="{{ route('poster.random') }}">{!! trans('global.random_menu') !!}</a></li>
        <li><a href="{{ url('login')}}">{!! trans('global.login_menu') !!}</a></li>
    </ul>
    <ul class="language-switcher">
        <li><a href="{{ action('LanguageController@switch', ['fr']) }}">Français</a></li>
        <li><a href="{{ action('LanguageController@switch', ['en']) }}">English</a></li>
    </ul>
</div>
