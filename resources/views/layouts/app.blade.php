<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1024px">
    <title>@yield('title', 'Audi Drive — Автосалон')</title>
    <meta name="description" content="@yield('description', 'Официальный дилер Audi в Москве. Тест-драйвы, новинки, акции, авто в наличии.')">
    
    <link rel="preload" as="image" href="{{ asset('images/logo.svg.png') }}">
    <link rel="preload" as="image" href="{{ asset('images/slider/Audi_A6_headlight.jpg') }}">
    <link rel="preload" as="image" href="{{ asset('images/slider/Rs3_headlights_in_the_dark.jpg') }}">
    <link rel="preload" as="image" href="{{ asset('images/slider/speedometer.jpg') }}">
    <link rel="preload" as="image" href="{{ asset('images/slider/car_wheel.jpg') }}">
    <link rel="preload" as="image" href="{{ asset('images/slider/Audi_R8_red_dark.jpg') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    @stack('styles')
    @stack('scripts')
</head>
<body>
    @if(session('success'))
        <div class="alert-floating alert-success" id="flash-message">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert-floating alert-danger" id="flash-message">
            {{ session('error') }}
        </div>
    @endif
    <div class="wrapper">
        @include('partials.header')
        
        <main class="main">
            <!-- @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif -->

            @yield('content')
        </main>
        
        @include('partials.footer')
    </div>
    
    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const flashMessage = document.getElementById('flash-message');
            if (flashMessage) {
                // Автоматически скрыть через 4 секунды
                setTimeout(function() {
                    flashMessage.classList.add('fade-out');
                    // Удалить элемент из DOM после анимации
                    setTimeout(function() {
                        flashMessage.remove();
                    }, 400);
                }, 4000);

                // Скрыть при клике
                flashMessage.addEventListener('click', function() {
                    flashMessage.classList.add('fade-out');
                    setTimeout(function() {
                        flashMessage.remove();
                    }, 400);
                });
            }
        });
    </script>
</body>
</html>