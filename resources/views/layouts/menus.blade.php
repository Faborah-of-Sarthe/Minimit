<nav class="menus">
    <ul class="menu">
        <li><a class="selections" href="{!! route('selection.index') !!}">{!! trans('global.list_menu') !!}</a></li>
        <li><a class="random" rel="nofollow" href="{{ route('poster.random') }}">{!! trans('global.random_menu') !!}</a></li>
        <li><a class="account mickey" rel="nofollow" href="{{ url('login')}}">{!! trans('global.login_menu') !!}</a></li>
    </ul>
</nav>
