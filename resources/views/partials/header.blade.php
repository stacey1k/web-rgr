<header class="header">
    <div class="container">
        <div class="header__inner">
            <!-- Левая часть: логотип -->
            <div class="header__left">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/logo.svg.png') }}" alt="Audi Drive" class="logo__img">
                        <span class="logo__text">Audi Drive</span>
                    </a>
                </div>
            </div>
            
            <!-- Центральная часть: основное меню -->
            <div class="header__center">
                <nav class="nav">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="nav__link">{{ __('messages.home') }}</a></li>
                        <li class="nav__item nav__item--dropdown">
                            <a href="#" class="nav__link">{{ __('messages.models') }} ▾</a>
                            <ul class="subnav">
                                <li class="subnav__item"><a href="{{ route('models.category', ['category' => 'sedan', 'locale' => app()->getLocale()]) }}" class="subnav__link">{{ __('messages.sedans') }}</a></li>
                                <li class="subnav__item"><a href="{{ route('models.category', ['category' => 'coupe', 'locale' => app()->getLocale()]) }}" class="subnav__link">{{ __('messages.coupe') }}</a></li>
                                <li class="subnav__item"><a href="{{ route('models.category', ['category' => 'suv', 'locale' => app()->getLocale()]) }}" class="subnav__link">{{ __('messages.suv_crossovers') }}</a></li>
                                <li class="subnav__item"><a href="{{ route('models.category', ['category' => 'sport', 'locale' => app()->getLocale()]) }}" class="subnav__link">{{ __('messages.sport_models') }}</a></li>
                                <li class="subnav__item"><a href="{{ route('models.category', ['category' => 'electric', 'locale' => app()->getLocale()]) }}" class="subnav__link">{{ __('messages.electric_models') }}</a></li>
                            </ul>
                        </li>
                        <li class="nav__item"><a href="{{ route('news', ['locale' => app()->getLocale()]) }}" class="nav__link">{{ __('messages.news') }}</a></li>
                        <li class="nav__item nav__item--dropdown">
                            <a href="#" class="nav__link">{{ __('messages.about_us') }} ▾</a>
                            <ul class="subnav">
                                <li class="subnav__item"><a href="{{ route('about', ['locale' => app()->getLocale()]) }}" class="subnav__link">{{ __('messages.about') }}</a></li>
                                <li class="subnav__item"><a href="{{ route('brand.history', ['locale' => app()->getLocale()]) }}" class="subnav__link">{{ __('messages.history') }}</a></li>
                            </ul>
                        </li>
                        <li class="nav__item"><a href="{{ route('contacts', ['locale' => app()->getLocale()]) }}" class="nav__link">{{ __('messages.contacts') }}</a></li>
                    </ul>
                </nav>
            </div>
            
            <!-- Правая часть: кнопка -->
            <div class="header__right">
                <a href="{{ route('testdrive.create', ['locale' => app()->getLocale()]) }}" class="nav__link nav__link--highlight">{{ __('messages.testdrive') }}</a>

                @php
                    $currentRoute = Route::currentRouteName();
                    $currentParams = Route::current()->parameters();
                    
                    if ($currentRoute === 'models.category') {
                        $ruUrl = route('models.category', ['category' => $currentParams['category'], 'locale' => 'ru']);
                        $enUrl = route('models.category', ['category' => $currentParams['category'], 'locale' => 'en']);
                    } else {
                        unset($currentParams['locale']);
                        $ruUrl = route($currentRoute, array_merge($currentParams, ['locale' => 'ru']));
                        $enUrl = route($currentRoute, array_merge($currentParams, ['locale' => 'en']));
                    }
                @endphp

                <div class="language-switcher">
                    <a href="{{ $ruUrl }}" class="{{ app()->getLocale() == 'ru' ? 'active' : '' }}">RU</a>
                    <span>/</span>
                    <a href="{{ $enUrl }}" class="{{ app()->getLocale() == 'en' ? 'active' : '' }}">EN</a>
                </div>

                @auth
                    <div class="user-menu">
                        <span class="user-name">{{ auth()->user()->name }}</span>
                        <form action="{{ route('logout', ['locale' => app()->getLocale()]) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="logout-btn">{{ __('messages.logout') }}</button>
                        </form>
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.dashboard', ['locale' => app()->getLocale()]) }}" class="admin-link">{{ __('messages.admin_panel') }}</a>
                        @endif
                    </div>
                @else
                    <a href="{{ route('login', ['locale' => app()->getLocale()]) }}" class="auth-link">{{ __('messages.login') }}</a>
                    <a href="{{ route('register', ['locale' => app()->getLocale()]) }}" class="auth-link">{{ __('messages.register') }}</a>
                @endauth
            </div>
        </div>
    </div>
</header>