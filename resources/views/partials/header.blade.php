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
                        <li class="nav__item"><a href="{{ route('home') }}" class="nav__link">Главная</a></li>
                        <li class="nav__item nav__item--dropdown">
                            <a href="#" class="nav__link">Модели ▾</a>
                            <ul class="subnav">
                                <li class="subnav__item"><a href="{{ route('models.category', 'sedan') }}" class="subnav__link">Седаны</a></li>
                                <li class="subnav__item"><a href="{{ route('models.category', 'coupe') }}" class="subnav__link">Купе</a></li>
                                <li class="subnav__item"><a href="{{ route('models.category', 'suv') }}" class="subnav__link">Кроссоверы и внедорожники</a></li>
                                <li class="subnav__item"><a href="{{ route('models.category', 'sport') }}" class="subnav__link">Спортивные модели</a></li>
                                <li class="subnav__item"><a href="{{ route('models.category', 'electric') }}" class="subnav__link">Электромобили</a></li>
                            </ul>
                        </li>
                        <li class="nav__item"><a href="{{ route('news') }}" class="nav__link">Новости</a></li>
                        <li class="nav__item nav__item--dropdown">
                            <a href="#" class="nav__link">О нас ▾</a>
                            <ul class="subnav">
                                <li class="subnav__item"><a href="{{ route('about') }}" class="subnav__link">Об автосалоне</a></li>
                                <li class="subnav__item"><a href="{{ route('brand.history') }}" class="subnav__link">История марки Audi</a></li>
                            </ul>
                        </li>
                        <li class="nav__item"><a href="{{ route('contacts') }}" class="nav__link">Контакты</a></li>
                    </ul>
                </nav>
            </div>
            
            <!-- Правая часть: кнопка -->
            <div class="header__right">
                <a href="{{ route('testdrive.create') }}" class="nav__link nav__link--highlight">Тест-драйв</a>
            </div>
        </div>
    </div>
</header>