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
    <div class="wrapper">
        @include('partials.header')
        
        <main class="main">
            @yield('content')
        </main>
        
        @include('partials.footer')
    </div>
    
    @stack('scripts')
</body>
</html>