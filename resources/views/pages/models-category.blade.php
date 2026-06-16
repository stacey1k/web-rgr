@extends('layouts.app')

@section('title', $title ?? 'Модельный ряд')

@section('content')
<div class="container">
    <h1 class="section-title">{{ $categoryModel->name }}</h1>
    
    @if($categoryModel->description)
        <div class="category-description">
            <p>{{ $categoryModel->description }}</p>
        </div>
    @endif
    
    <div class="models-grid">
        @foreach($cars as $car)
        <div class="model-card">
            <img src="{{ asset('images/car_models/' . $car->main_image) }}" alt="Audi {{ $car->model }}">
            <div class="model-card__content">
                <h3>Audi {{ $car->model }}</h3>
                <p>{{ $car->short_description }}</p>
                <p class="model-card__price">{{ $car->formatted_price }}</p>
                <a href="{{ route('car.show', ['car' => $car, 'locale' => app()->getLocale()]) }}" class="btn btn--small">{{ __('messages.more_details') }}</a>
            </div>
        </div>
        @endforeach
    </div>
    
    @if($cars->isEmpty())
        <p class="text-center">В этой категории пока нет автомобилей.</p>
    @endif
</div>
@endsection