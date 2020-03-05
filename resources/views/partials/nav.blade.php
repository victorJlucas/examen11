<nav class="custom-wrapper" id="menu">
    <div class="pure-menu"></div>
    <ul class="container-flex list-unstyled">
        <li><a href="{{ route('pages.home') }}" class="text-uppercase {{ setActiveRoute('pages.home') }}">{{ __('app.navbar.home') }}</a></li>
        <li><a href="{{ route('pages.about') }}" class="text-uppercase {{ setActiveRoute('pages.about') }}">{{ __('app.navbar.about') }}</a></li>
        <li><a href="{{ route('pages.archive') }}" class="text-uppercase {{ setActiveRoute('pages.archive') }}">{{ __('app.navbar.archive') }}</a></li>
        <li><a href="{{ route('pages.contact') }}" class="text-uppercase {{ setActiveRoute('pages.contact') }}">{{ __('app.navbar.contact') }}</a></li>
        <li class="nav-item">
            <a href="{{ route('set_language', ['es']) }}"
               class="dropdown-item">
                {{ strtoupper(__('menu.spain')) }}
            </a>
        </li>
        <li>
            <a href="{{ route('set_language', ['en']) }}"
               class="dropdown-item">
                {{ strtoupper(__('menu.english')) }}
            </a>
        </li>
        @auth
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="btn btn-default">{{ __('app.navbar.exit') }}</button>
            </form>
        @endauth

        @guest
            <form action="{{ route('login') }}" method="get">
                @csrf
                <button class="btn btn-default">{{ __('app.navbar.enter') }}</button>
            </form>
            <form action="{{ route('register') }}" method="get">
                @csrf
                <button class="btn btn-default">{{ __('app.navbar.register') }}</button>
            </form>
        @endguest
    </ul>
</nav>
