<header class="header" style="  background-color: #66F0A8;">
    <div class="container">
        <div class="header__inner">
            <div class="header__logo">
                <a class="sblog__logo__link" href="{{route("/")}}">
                    <img class="sblog__logo" src="{{ asset('img/logo/logo.png') }}" alt="Sblog logo">
{{--                    <span style="font-size: 24px;">Red-news</span>--}}
                </a>
            </div>
{{--            @dd(Route::currentRouteName())--}}
            @if(Route::currentRouteName() == '/' || Route::currentRouteName() == 'news')
            <div class="search_main">
                <input class="search__bar js__search__bar" type="text" placeholder="Поиск новости"/>
            </div>

            @endif
            <nav>
                @if (Route::has('login'))
                    @auth
                        <div class="hidden sm:flex sm:items-center sm:ml-6" style="background-color: #66F0A8">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        <div style="font-size: 16px; font-weight: 400;color: #000000">{{ Auth::user()->name }}</div>

                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    @if(\Auth()->user()->role_id == 1)

                                    <x-dropdown-link :href="route('news.write')">
                                        {{ __('Write') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('news.list')">
                                        {{ __('List News') }}
                                    </x-dropdown-link>

                                    @endif

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @else
{{--                        <a class="nav__link" href="">Our Story</a>--}}
{{--                        <a class="nav__link" href="">Write</a>--}}
                        <a href="{{ route('login') }}" class="nav__link">Sign in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav__link get__started">Get Started</a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>


{{--        @include('layouts.header.search')--}}

    </div>
</header>
