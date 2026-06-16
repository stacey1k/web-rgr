@extends('layouts.app')

@section('title', 'Audi Drive — официальный дилер Audi')
@section('description', 'Новые автомобили Audi, тест-драйвы, акции и специальные предложения. Официальный дилер в Москве.')

@section('content')
<section class="hero">
    <div class="hero-slider" id="heroSlider">
        <div class="hero-slider__track">
            <img class="hero-slider__img active" src="{{ asset('images/slider/Audi_A6_headlight.jpg') }}" alt="Audi A6 headlight">
            <img class="hero-slider__img" src="{{ asset('images/slider/Rs3_headlights_in_the_dark.jpg') }}" alt="Audi RS3 headlights">
            <img class="hero-slider__img" src="{{ asset('images/slider/speedometer.jpg') }}" alt="Audi speedometer">
            <img class="hero-slider__img" src="{{ asset('images/slider/car_wheel.jpg') }}" alt="Audi wheel">
            <img class="hero-slider__img" src="{{ asset('images/slider/Audi_R8_red_dark.jpg') }}" alt="Audi R8 red">
        </div>
    </div>

    <div class="container">
        <div class="hero__content">
            <h1 class="hero__title">{{ __('messages.hero_title') }}</h1>
            <p class="hero__subtitle">{{ __('messages.hero_subtitle') }}</p>
            <a href="{{ route('testdrive.create') }}" class="btn btn--primary">{{ __('messages.testdrive_signUp') }}</a>
        </div>
    </div>
</section>

<section class="slogan-section">
    <div class="slogan-decoration slogan-decoration--top"></div>
    <div class="container">
        <div class="slogan">
            <div class="slogan__inner">
                <h2 class="slogan__main">Vorsprung durch Technik</h2>
                <p class="slogan__sub">Advancement through Technology</p>
                <div class="slogan__divider">
                    <span class="slogan__divider-line"></span>
                    <span class="slogan__divider-brand">Audi Drive</span>
                    <span class="slogan__divider-line"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="slogan-decoration slogan-decoration--bottom"></div>
</section>

<!-- <section class="models-section">
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
</section> -->

<section class="models-section">
    <div class="container">
        <h2 class="section-title">{{ __('messages.popular_models') }}</h2>
    </div>
    
    <div class="models-carousel-wrapper">
        <button class="carousel-arrow carousel-arrow--prev" id="modelsPrevBtn">‹</button>
        
        <div class="models-carousel" id="modelsCarousel">
            <div class="models-carousel__track" id="modelsTrack">
                @foreach($popularCars as $car)
                <div class="model-card">
                    <img src="{{ asset('images/car_models/' . $car->main_image) }}" alt="Audi {{ $car->model }}">
                    <div class="model-card__overlay">
                        <h3>Audi {{ $car->model }}</h3>
                        <p>{{ $car->short_description }}</p>
                        <p class="model-card__price">{{ $car->formatted_price }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <button class="carousel-arrow carousel-arrow--next" id="modelsNextBtn">›</button>
    </div>
</section>

<section class="news-section">
    <div class="container">
        <h2 class="section-title">{{ __('messages.news_and_promotions') }}</h2>
        <!-- <div class="news-grid">
            @php
                $sampleNews = [
                    ['title' => __('messages.special_offers_q5'), 'date' => '15.03.2025'],
                    ['title' => __('messages.new_a6_etron'), 'date' => '10.03.2025'],
                    ['title' => __('messages.testdrive_weekend'), 'date' => '05.03.2025'],
                ];
            @endphp
            @foreach($sampleNews as $item)
            <div class="news-card">
                <span class="news-date">{{ $item['date'] }}</span>
                <h3>{{ $item['title'] }}</h3>
            </div>
            @endforeach
        </div>
        <div style="text-align: center; margin-top: 30px;">
            <a href="{{ route('news') }}" class="btn btn--secondary">{{ __('messages.all_news') }} →</a>
        </div>
    </div> -->

        <div class="news-grid">
            @foreach($latestNews as $item)
            <div class="news-card">
                @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                @endif
                <span class="news-date">{{ $item->published_at->format('d.m.Y') }}</span>
                <h3>{{ $item->title }}</h3>
                <p>{{ Str::limit($item->content, 100) }}</p>
                <a href="{{ route('news.show', ['locale' => app()->getLocale(), 'slug' => $item->slug]) }}" class="btn btn--secondary">{{ __('messages.read_more') }} →</a>
            </div>
            @endforeach
        </div>
        <div style="text-align: center; margin-top: 30px;">
            <a href="{{ route('news', ['locale' => app()->getLocale()]) }}" class="btn btn--secondary">{{ __('messages.all_news') }} →</a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.hero-slider__img');
        let currentIndex = 0;
        const totalSlides = slides.length;

        if (totalSlides === 0) return;

        // Предзагружаем все изображения
        function preloadImages() {
            slides.forEach(slide => {
                const img = new Image();
                img.src = slide.src;
            });
        }
        preloadImages();

        // Показываем hero после загрузки первого изображения
        const hero = document.querySelector('.hero');
        const firstImg = slides[0];
        
        if (firstImg.complete) {
            hero.classList.add('loaded');
        } else {
            firstImg.onload = () => hero.classList.add('loaded');
        }

        // Переключение слайдов
        function nextSlide() {
            slides[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % totalSlides;
            slides[currentIndex].classList.add('active');
        }

        setInterval(nextSlide, 3500); // Смена картинки каждые 3,5 секунды


        // ========== КАРУСЕЛЬ МОДЕЛЕЙ ==========
        const track = document.getElementById('modelsTrack');
        const prevBtn = document.getElementById('modelsPrevBtn');
        const nextBtn = document.getElementById('modelsNextBtn');
        
        if (track && prevBtn && nextBtn) {
            const CARD_WIDTH = 390;
            
            function scrollOneCard(direction) {
                const currentScroll = track.scrollLeft;
                let newScroll;
                
                if (direction === 'next') {
                    newScroll = currentScroll + CARD_WIDTH;
                    if (newScroll + track.clientWidth > track.scrollWidth) {
                        newScroll = track.scrollWidth - track.clientWidth;
                    }
                } else {
                    newScroll = currentScroll - CARD_WIDTH;
                    if (newScroll < 0) {
                        newScroll = 0;
                    }
                }
                
                track.scrollTo({ left: newScroll, behavior: 'smooth' });
            }
            
            prevBtn.addEventListener('click', () => scrollOneCard('prev'));
            nextBtn.addEventListener('click', () => scrollOneCard('next'));
        }
    });
</script>
@endpush