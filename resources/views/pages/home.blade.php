@extends('layouts.app')

@section('title', 'Audi Drive — официальный дилер Audi')
@section('description', 'Новые автомобили Audi, тест-драйвы, акции и специальные предложения. Официальный дилер в Москве.')

@section('content')
<section class="hero">
    <div class="container">
        <h1 class="hero__title">Audi Drive</h1>
        <p class="hero__subtitle">Официальный дилер Audi в Москве</p>
        <a href="{{ route('testdrive.create') }}" class="btn btn--primary">Записаться на тест-драйв</a>
    </div>
</section>

<section class="models-preview mb-3">
    <div class="container">
        <h2 class="section-title">Популярные модели</h2>
        <div class="models-grid">
            <div class="model-card">
                <img src="{{ asset('images/car_models/a6.jpg') }}" alt="Audi A6" class="model-card__img">
                <h3>Audi A6</h3>
                <p>Бизнес-седан премиум-класса</p>
            </div>
            <div class="model-card">
                <img src="{{ asset('images/car_models/q5.jpg') }}" alt="Audi Q5" class="model-card__img">
                <h3>Audi Q5</h3>
                <p>Популярный кроссовер</p>
            </div>
            <div class="model-card">
                <img src="{{ asset('images/car_models/e-tron.jpg') }}" alt="Audi e-tron" class="model-card__img">
                <h3>Audi e-tron</h3>
                <p>Электрический внедорожник</p>
            </div>
        </div>
    </div>
</section>

<section class="news-preview mb-3">
    <div class="container">
        <h2 class="section-title">Новости и акции</h2>
        <div class="news-grid">
            @php
                $sampleNews = [
                    ['title' => 'Специальные предложения на Audi Q5', 'date' => '15.03.2025'],
                    ['title' => 'Новый Audi A6 e-tron уже в салоне', 'date' => '10.03.2025'],
                    ['title' => 'Тест-драйв выходного дня', 'date' => '05.03.2025'],
                ];
            @endphp
            @foreach($sampleNews as $item)
            <div class="news-card">
                <span class="news-date">{{ $item['date'] }}</span>
                <h3>{{ $item['title'] }}</h3>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('news') }}" class="btn btn--secondary">Все новости →</a>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .hero {
        background: linear-gradient(135deg, var(--inkwell) 0%, var(--lunar-eclipse) 100%);
        padding: 60px 0;
        text-align: center;
        color: var(--au-lait);
        border-radius: 0 0 30px 30px;
        margin-bottom: 40px;
    }
    
    .hero__title {
        font-size: 3rem;
        margin-bottom: 20px;
    }
    
    .hero__subtitle {
        font-size: 1.2rem;
        margin-bottom: 30px;
        opacity: 0.9;
    }
    
    .btn {
        display: inline-block;
        padding: 12px 30px;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 600;
        transition: var(--transition);
        cursor: pointer;
        border: none;
    }
    
    .btn--primary {
        background-color: var(--creme-brulee);
        color: var(--inkwell);
    }
    
    .btn--primary:hover {
        background-color: var(--au-lait);
        transform: translateY(-2px);
    }
    
    .btn--secondary {
        background-color: transparent;
        color: var(--creme-brulee);
        border: 2px solid var(--creme-brulee);
    }
    
    .btn--secondary:hover {
        background-color: var(--creme-brulee);
        color: var(--inkwell);
    }
    
    .models-grid, .news-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin-top: 30px;
    }
    
    .model-card, .news-card {
        background: var(--white);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
    }
    
    .model-card:hover, .news-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
    }
    
    .model-card__img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    
    .model-card h3, .news-card h3 {
        padding: 15px 15px 5px;
        color: var(--inkwell);
    }
    
    .model-card p, .news-date {
        padding: 0 15px 15px;
        color: var(--lunar-eclipse);
    }
    
    .news-date {
        display: block;
        font-size: 0.8rem;
    }
    
    .text-center {
        text-align: center;
    }
    
    .mt-4 {
        margin-top: 30px;
    }

    .mb-3 {
        margin-bottom: 30px;
    }
</style>
@endpush