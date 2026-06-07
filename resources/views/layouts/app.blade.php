<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1024px">
    <title>@yield('title', 'Audi Drive — Автосалон')</title>
    <meta name="description" content="@yield('description', 'Официальный дилер Audi в Москве. Тест-драйвы, новинки, акции, авто в наличии.')">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- @stack('styles') -->
    <!-- <style>
        .model-card { background: #1A1A1A !important; border: 2px solid red !important; }
        .news-card { background: #2D1A1A !important; border: 2px solid orange !important; }
        body { color: #F5F5F5 !important; }
    </style> -->
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